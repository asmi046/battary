<?php

namespace App\View\Components;

use Closure;
use App\Models\Product;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class PopularInMain extends Component
{
    public $popular = [];
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->popular = Product::where('popular', true)->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.popular-in-main');
    }
}
