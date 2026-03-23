<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\IOFactory;

class ImportController extends Controller
{
	public function index(): View
	{
		return view('import');
	}

	public function store(Request $request): RedirectResponse
	{
		$validated = $request->validate([
			'excel' => ['required', 'file', 'mimes:xlsx,xls'],
			'images' => ['nullable', 'array'],
			'images.*' => ['file', 'image', 'max:10240'],
		]);

		$imagePool = $this->buildImagePool($validated['images'] ?? []);
		$spreadsheet = IOFactory::load($validated['excel']->getRealPath());
		$sheet = $spreadsheet->getActiveSheet();
		$highestRow = $sheet->getHighestDataRow();

		$report = [
			'processed' => 0,
			'created' => 0,
			'updated' => 0,
			'skipped' => 0,
			'images' => 0,
			'errors' => [],
		];

		DB::beginTransaction();

		try {
			for ($row = 8; $row <= $highestRow; $row++) {
				$name = trim((string) $sheet->getCell("C{$row}")->getValue());
				$sku = $this->formatSku((string) $sheet->getCell("D{$row}")->getValue());
				$product = $sku !== '' ? Product::query()->where('sku', $sku)->first() : null;

				if ($name === '' && $sku === '') {
					continue;
				}

				if ($sku === '' || $name === '') {
					$report['skipped']++;
					$report['errors'][] = "Строка {$row}: пустое имя или SKU";
					continue;
				}

				$report['processed']++;

				$dimensions = $this->parseDimensions((string) $sheet->getCell("I{$row}")->getValue());
				$voltageRaw = $sheet->getCell("K{$row}")->getValue();
				if ($voltageRaw === null || $voltageRaw === '') {
					$voltageRaw = $sheet->getCell("J{$row}")->getValue();
				}

				$data = [
					'show' => true,
					'name' => $name,
					'sku' => $sku,
					'slug' => Str::slug($name),
					'brand' => trim((string) $sheet->getCell("F{$row}")->getValue()),
					'series' => trim((string) $sheet->getCell("F{$row}")->getValue()),
					'price' => 0,
					'amperage' => $this->parseInt($sheet->getCell("G{$row}")->getValue()),
					'height' => $dimensions['height'],
					'width' => $dimensions['width'],
					'length' => $dimensions['length'],
					'volume' => $this->parseFloat($sheet->getCell("J{$row}")->getValue()),
					'clem_location' => $this->parseClemLocation((string) $sheet->getCell("E{$row}")->getValue()),
					'voltage' => $this->parseInt($voltageRaw),
					'type' => $this->mapType((string) $sheet->getCell("M{$row}")->getValue()),
				];

				if ($product === null) {
					$product = new Product();
					$product->fill($data);
					$product->popular = false;
					$product->save();
					$report['created']++;
				} else {
					$product->fill($data);
					$product->save();
					$report['updated']++;
				}

				$uploaded = $this->attachImages($product, $imagePool[$this->normalizeKey($sku)] ?? []);
				$report['images'] += $uploaded;
			}

			DB::commit();
		} catch (\Throwable $e) {
			DB::rollBack();

			return back()->withInput()->with('import_report', [
				'processed' => $report['processed'],
				'created' => $report['created'],
				'updated' => $report['updated'],
				'skipped' => $report['skipped'],
				'images' => $report['images'],
				'errors' => array_merge($report['errors'], [$e->getMessage()]),
			]);
		}

		return redirect()
			->route('import')
			->with('import_report', $report);
	}

	private function buildImagePool(array $images): array
	{
		$pool = [];

		foreach ($images as $image) {
			$original = (string) $image->getClientOriginalName();
			$basename = pathinfo($original, PATHINFO_FILENAME);
			$key = $this->normalizeKey($basename);

			if ($key === '') {
				continue;
			}

			$pool[$key][] = $image;
		}

		return $pool;
	}

	private function attachImages(Product $product, array $images): int
	{
		if ($images === []) {
			return 0;
		}

		$gallery = is_array($product->galery) ? $product->galery : [];
		$uploaded = 0;

		foreach ($images as $index => $image) {
			$extension = strtolower((string) $image->getClientOriginalExtension());
			if ($extension === '') {
				$extension = 'jpg';
			}

			$imgUrl = 'products/' . Str::slug($product->name) . '_' . ($index + 1) . '.' . $extension;
			Storage::disk('public')->put($imgUrl, file_get_contents($image->getRealPath()), 'public');

			if ($index === 0) {
				$product->img = $imgUrl;
			}

			$gallery[] = [
				'title' => $product->name,
				'img' => $imgUrl,
			];

			$uploaded++;
		}

		$product->galery = $gallery;
		$product->save();

		return $uploaded;
	}

	private function parseDimensions(string $raw): array
	{
		$parts = explode('/', str_replace(' ', '', $raw));

		return [
			'height' => $this->parseFloat($parts[2] ?? null),
			'width' => $this->parseFloat($parts[1] ?? null),
			'length' => $this->parseFloat($parts[0] ?? null),
		];
	}

	private function parseClemLocation(string $value): ?int
	{
		$value = mb_strtolower(trim($value));

		return match ($value) {
			'обратная' => 0,
			'прямая' => 1,
			default => null,
		};
	}

	private function mapType(string $value): ?string
	{
		$normalized = mb_strtolower(trim($value));

		return match ($normalized) {
			'аккумулятор' => 'Аккумуляторы для легковых автомобилей',
			default => trim($value) !== '' ? trim($value) : null,
		};
	}

	private function parseFloat(mixed $value): ?float
	{
		$string = trim((string) $value);
		if ($string === '') {
			return null;
		}

		$string = str_replace(',', '.', preg_replace('/[^0-9,\.\-]/', '', $string));

		return is_numeric($string) ? (float) $string : null;
	}

	private function parseInt(mixed $value): ?int
	{
		$float = $this->parseFloat($value);

		return $float === null ? null : (int) round($float);
	}

	private function normalizeKey(string $value): string
	{
		$formattedSku = $this->formatSku($value);

		if ($formattedSku !== '') {
			return $formattedSku;
		}

		return mb_strtolower(trim($value));
	}

	private function formatSku(string $value): string
	{
		$value = trim($value);

		if ($value === '') {
			return '';
		}

		$digits = preg_replace('/\D+/', '', $value);

		if ($digits === null || $digits === '') {
			return str_pad($value, 11, '0', STR_PAD_LEFT);
		}

		return str_pad($digits, 11, '0', STR_PAD_LEFT);
	}
}
