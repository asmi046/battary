<?php

namespace App\View\Components\Contacts;

use Closure;
use App\Models\Contact;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class FooterList extends Component
{
    public $all_contacts;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {

        $this->all_contacts = \Cache::rememberForever('all_contacts', function () {
            $all_options = Contact::all();
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
        return view('components.contacts.footer-list');
    }
}
