<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Banner;
use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Banner>
 */
class BannerResource extends ModelResource
{
    protected string $model = Banner::class;

    protected string $title = 'Баннеры';
    protected string $column = 'title';


    public function import(): ?ImportHandler
    {
        return null;
    }

    public function export(): ?ExportHandler
    {
        return null;
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function fields(): array
    {
        return [
            Block::make([
                ID::make()->sortable(),
                Number::make('Порядок', 'order')->default(0),
                Image::make('Изображение', 'img')->required()->dir('banners'),
                Text::make('Заголовок', 'title')->required(),
                Text::make('Подзаголовок', 'sub_title'),
                Text::make('Ссылка', 'lnk')->hideOnIndex(),
                Text::make('Текст кнопки', 'lnk_text')->hideOnIndex(),

            ]),
        ];
    }

    /**
     * @param Banner $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
