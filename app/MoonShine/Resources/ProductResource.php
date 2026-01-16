<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use MoonShine\ActionButtons\ActionButton;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Field;
use MoonShine\Fields\ID;
use MoonShine\Fields\Image;
use MoonShine\Fields\Json;
use MoonShine\Fields\Number;
use MoonShine\Fields\Position;
use MoonShine\Fields\Relationships\BelongsToMany;
use MoonShine\Fields\Select;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Text;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Товары';

    protected string $column = 'title';

    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }

    public function filters(): array
    {
        return [
            Text::make('Название', 'name'),
            Text::make('Артикул', 'sku'),
            Text::make('Бренд', 'brand'),
            Text::make('Описание SEO', 'seo_description'),
            Select::make('Тип', 'type')
                ->options([
                    'Аккумуляторы для грузовых автомобилей' => 'Аккумуляторы для грузовых автомобилей',
                    'Аккумуляторы для легковых автомобилей' => 'Аккумуляторы для легковых автомобилей',
                    'Аккумуляторы для мототехники' => 'Аккумуляторы для мототехники',
                    'Аккумуляторы для спецтехники' => 'Аккумуляторы для спецтехники',
                    'Тяговые аккумуляторы' => 'Тяговые аккумуляторы',
                ])->nullable(),
        ];
    }

    /**
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Switcher::make('Показывать товар', 'show'),
            Image::make('Изображения', 'img')->dir('products'),
            Text::make('Название', 'name'),
            Text::make('Артикул', 'sku'),
            Text::make('Цена', 'price'),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [

            Tabs::make([
                Tab::make('Товар', [
                    ID::make()->sortable(),
                    Switcher::make('Показывать товар', 'show'),
                    Text::make('Название', 'name')->required()->unescape(),
                    Slug::make('Ссылка', 'slug')->from('name'),
                    Text::make('Артикул', 'sku')->required(),
                    Text::make('Бренд', 'brand'),
                    Text::make('Серия', 'series'),
                    Image::make('Изображения', 'img')->dir('products'),
                    Text::make('Цена', 'price')->required(),
                    Text::make('Старая цена', 'old_price'),

                ]),
                Tab::make('Параметры товара', [
                    Number::make('Ток (EN)', 'amperage'),
                    Text::make('Высота', 'height'),
                    Text::make('Ширина', 'width'),
                    Text::make('Длинна', 'length'),
                    Select::make('Расположение клемм', 'clem_location')
                        ->options([
                            1 => 'Прямая',
                            0 => 'Обратная',
                        ])->nullable(),

                    Text::make('Вольтаж', 'voltage'),
                    Switcher::make('Популярный товар', 'popular'),
                    Select::make('Тип', 'type')
                        ->options([
                            'Аккумуляторы для грузовых автомобилей' => 'Аккумуляторы для грузовых автомобилей',
                            'Аккумуляторы для легковых автомобилей' => 'Аккумуляторы для легковых автомобилей',
                            'Аккумуляторы для мототехники' => 'Аккумуляторы для мототехники',
                            'Аккумуляторы для спецтехники' => 'Аккумуляторы для спецтехники',
                            'Тяговые аккумуляторы' => 'Тяговые аккумуляторы',
                        ])->nullable(),
                ]),
                Tab::make('Галерея товара', [
                    Json::make('Галерея изображений', 'galery')
                        ->removable()
                        ->fields([
                            Position::make(),
                            Text::make('Заголовок', 'title'),
                            Image::make('Изображения', 'img')->dir('products'),
                        ]),
                ]),
                Tab::make('Категории товара', [
                    BelongsToMany::make('Категории товара', 'category_tovars', resource: new CategoryResource),
                ]),
            ]),

            ActionButton::make(
                label: 'Просмотр страницы товара',
                url: route('product_page', $this->getItem()['slug']),
            )
                ->blank()
                ->success(),

        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
        ];
    }

    /**
     * @param  Product  $item
     * @return array<string, string[]|string>
     *
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
