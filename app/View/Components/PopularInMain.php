<?php

namespace App\View\Components;

use Closure;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class PopularInMain extends Component
{
    public $popular = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        // $this->popular = Product::where('popular', true)->get();
        $this->popular = Product::where('popular', true)->whereHas('category_tovars', function (Builder $query) {
            $query->where('name', 'Аккумуляторные батареи');
        })->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popular-in-main');
    }
}
