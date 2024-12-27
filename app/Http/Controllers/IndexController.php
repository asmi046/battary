<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        return view('index');
    }

    public function about() {
        return view('about');
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
