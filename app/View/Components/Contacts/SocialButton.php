<?php

namespace App\View\Components\Contacts;

use Closure;
use App\Models\Contact;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SocialButton extends Component
{
    public $social_button;

    /**
     * Create a new component instance.
     */
    public function __construct(public string $pros = "0")
    {
        $this->pros = $pros;
        $this->social_button = \Cache::rememberForever('social_button', function () {
            $all_options = Contact::whereIn('key',['tg', 'ws', 'vk'])->get();
            $opt = [];

            foreach ($all_options as $otion) {
                $opt[$otion['key']] = $otion['value'];
            }
            return $opt;
        });
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.contacts.social-button');
    }
}
