<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use MoonShine\Fields\ID;
use MoonShine\Fields\Slug;

use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use App\Models\BlogCategory;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<BlogCategory>
 */
class BlogCategoryResource extends ModelResource
{
    protected string $model = BlogCategory::class;

    protected string $title = 'Категории';

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
            Text::make('Название', 'title'),
            Slug::make('Ссылка', 'slug')->from('title'),
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
            TinyMce::make('Описание', 'description')->hideOnIndex(),
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
            TinyMce::make('Описание', 'description')->hideOnIndex(),
        ];
    }

    /**
     * @param BlogCategory $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
