<?php

namespace App\View\Components\Menues;

use Closure;
use App\Models\Menu\Menu;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Puncts extends Component
{
    public $puncts;
    public $wrap_class;
    /**
     * Create a new component instance.
     */
    public function __construct(string $name = "Главное меню", string $wrap = "top_menu")
    {
        $this->wrap_class = $wrap;
        try {
            $this->puncts = Menu::where('menu', $name)->orderBy('order')->get();
        } catch (\Throwable $e) {
            $this->puncts = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menues.puncts');
    }
}
