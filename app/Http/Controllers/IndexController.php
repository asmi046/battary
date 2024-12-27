<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Page\Page;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        $page_about = Page::where('title', "О нас")->first();

        if(!$page_about) abort('404');

        return view('about', [
            'page_about' => $page_about
        ]);
    }

    public function contacts() {
        $all_options = Contact::all();
        $all_contacts = [];

        foreach ($all_options as $otion) {
            $all_contacts[$otion['key']] = $otion;
        }

        return view('contacts', [
            "all_contacts" => $all_contacts
        ]);
    }
}
