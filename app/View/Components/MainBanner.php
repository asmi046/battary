<?php

namespace App\View\Components;

use Closure;
use App\Models\Banner;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class MainBanner extends Component
{

    public $all_banners;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->all_banners = Banner::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.main-banner');
    }
}
