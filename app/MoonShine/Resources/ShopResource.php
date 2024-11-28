<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Shop;
use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Fields\Field;
use MoonShine\Fields\Number;
use MoonShine\Fields\Switcher;
use MoonShine\Handlers\ExportHandler;
use MoonShine\Handlers\ImportHandler;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Components\MoonShineComponent;

/**
 * @extends ModelResource<Shop>
 */
class ShopResource extends ModelResource
{
    protected string $model = Shop::class;

    protected string $title = 'Сеть магазинов';

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
            Number::make('Порядок вывода', 'order')->sortable(),
            Text::make('Название', 'name'),
            Text::make('Город', 'city'),
            Text::make('Адрес', 'adress'),
            Text::make('Адрес', 'adress'),
            Switcher::make('Проверенный', 'aproved')
        ];
    }

    /**
     * @return list<MoonShineComponent|Field>
     */
    public function formFields(): array
    {
        return [
            ID::make()->sortable(),
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
     * @param Shop $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    public function rules(Model $item): array
    {
        return [];
    }
}
