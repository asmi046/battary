<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Blog;
use MoonShine\Fields\ID;

use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Image;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Blog>
 */
class BlogResource extends ModelResource
{
    protected string $model = Blog::class;

    protected string $title = 'Статьи';

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
     * @return list<Field>
     */
    public function indexFields(): array
    {
        return [
            ID::make()->sortable(),
            Image::make('Изображения', 'img')->dir('blog'),
            Text::make('Название', 'title'),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'title')->required(),
            Slug::make('Ссылка', 'slug')->from('title'),
            Image::make('Изображения', 'img')->dir('blog'),
            TinyMce::make('Описание', 'description'),
        ];
    }

    /**
     * @return list<Field>
     */
    public function detailFields(): array
    {
        return [
            ID::make()->sortable(),
            Text::make('Название', 'title')->required(),
            Slug::make('Ссылка', 'slug')->from('title'),
            Image::make('Изображения', 'img')->dir('blog'),
            TinyMce::make('Описание', 'description'),
        ];
    }

    /**
     * @param Blog $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
