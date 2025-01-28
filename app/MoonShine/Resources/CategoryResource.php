<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Category;
use MoonShine\Fields\ID;

use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Number;
use MoonShine\Fields\TinyMce;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Category>
 */
class CategoryResource extends ModelResource
{
    protected string $model = Category::class;

    protected string $title = 'Категории';

    protected string $column = 'name';

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
            Text::make('Название', 'name')->required(),
            Slug::make('Ссылка', 'slug')->from('name'),
            BelongsTo::make('Родительская категория', 'parent_category', 'name', resource: $this)->nullable(),
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
            Number::make('Порядок', 'order')->default(0)->required(),
            Text::make('Название', 'name')->required(),
            Slug::make('Ссылка', 'slug')->from('name'),
            BelongsTo::make('Родительская категория', 'parent_category', 'name', resource: $this)->nullable(),
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
            ID::make()->sortable(),
            Number::make('Порядок', 'order')->default(0)->required(),
            Text::make('Название', 'name')->required(),
            Slug::make('Ссылка', 'slug')->from('name'),
            TinyMce::make('Описание', 'description'),
            BelongsTo::make('Родительская категория', 'parent_category', 'name', resource: $this),
        ];
    }

    /**
     * @param Category $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
