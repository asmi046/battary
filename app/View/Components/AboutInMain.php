<?php

namespace App\View\Components;

use Cache;
use Closure;
use App\Models\Page\Page;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;


class AboutInMain extends Component
{
    public $content = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->content = Cache::rememberForever('content', function () {

            $about_content = Page::where('title', "О нас")->first();
            $description = ($about_content->description)?$about_content->description:"Сеть специализированных магазинов Батарейка";
            $title = ($about_content->title)?$about_content->title:"О нас";
            return [
                "title" => "Сеть магазинов «Батарейка»",
                "description" => $description,
            ];
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-in-main');
    }
}
