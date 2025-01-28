<?php

declare(strict_types=1);

namespace App\Providers;

use Closure;
use App\Models\Blog;
use MoonShine\MoonShine;
use MoonShine\Pages\Page;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use MoonShine\Menu\MenuElement;
use App\MoonShine\Resources\BlogResource;
use App\MoonShine\Resources\MenuResource;
use App\MoonShine\Resources\PageResource;
use App\MoonShine\Resources\ShopResource;
use App\MoonShine\Resources\BannerResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\SeoDataResource;
use App\MoonShine\Resources\CategoryResource;
use MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\BlogCategoryResource;
use MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Contracts\Resources\ResourceContract;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
    /**
     * @return list<ResourceContract>
     */
    protected function resources(): array
    {
        return [];
    }

    /**
     * @return list<Page>
     */
    protected function pages(): array
    {
        return [];
    }

    /**
     * @return Closure|list<MenuElement>
     */
    protected function menu(): array
    {
        return [

            MenuItem::make(
                static fn() => __('Мню'),
                new MenuResource()
            )->icon('heroicons.bars-3') ,

            MenuItem::make(
                static fn() => __('Сеть магазинов'),
                new ShopResource()
            )->icon('heroicons.outline.building-storefront'),

            MenuGroup::make(static fn() => __('Товары'), [
                MenuItem::make(
                    static fn() => __('Все товары'),
                    new ProductResource()
                ),
                MenuItem::make(
                    static fn() => __('Категории'),
                    new CategoryResource()
                )
            ])->icon('heroicons.battery-100'),

            MenuGroup::make(static fn() => __('База знаний'), [
                MenuItem::make(
                    static fn() => __('Статьи'),
                    new BlogResource()
                ),

                MenuItem::make(
                    static fn() => __('Категории'),
                    new BlogCategoryResource()
                )
            ])->icon('heroicons.outline.clipboard-document'),


            MenuItem::make(
                static fn() => __('Страницы'),
                new PageResource()
            )->icon('heroicons.outline.clipboard-document'),

            MenuItem::make(
                static fn() => __('Баннеры'),
                new BannerResource()
            )->icon('heroicons.outline.eye'),

            MenuItem::make(
                static fn() => __('SEO'),
                new SeoDataResource()
            )->icon('heroicons.outline.chart-bar-square'),

            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.admins_title'),
                    new MoonShineUserResource()
                ),
                MenuItem::make(
                    static fn() => __('moonshine::ui.resource.role_title'),
                    new MoonShineUserRoleResource()
                ),
            ]),


        ];
    }

    /**
     * @return Closure|array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
