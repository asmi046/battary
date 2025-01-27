<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;
use App\Models\Page\Page;

use MoonShine\Fields\Json;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Position;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Page>
 */
class PageResource extends ModelResource
{
    protected string $model = Page::class;
    protected string $title = 'Страницы';
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
                Text::make('Название', 'title')->required(),
                Slug::make('Окончание сылки', 'slug')->from('title'),
                Image::make('Основное изображение', 'img')->dir('pages')->hideOnIndex(),
                TinyMce::make('Описание', 'description')->hideOnIndex(),

                Json::make('Галерея', 'galery')
                    ->fields([
                        Position::make(),
                        Image::make('Изображение', 'img')->dir('pages'),
                        Text::make('Заголовок', 'title'),
                    ])->hideOnIndex(),

                Json::make('Параметры', 'params')
                    ->fields([
                        Position::make(),
                        Text::make('Категория', 'cat'),
                        Text::make('Заголовок', 'title'),
                        Text::make('Значение', 'value'),
                    ])->hideOnIndex(),

                // Text::make('SEO заголовок', 'seo_title')->hideOnIndex(),
                // Textarea::make('SEO описание', 'seo_description')->hideOnIndex()
            ]),
        ];
    }

    /**
     * @param Page $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
