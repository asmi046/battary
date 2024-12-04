<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        return view('wiki.index');
    }

    public function wiki_cat() {
        return view('wiki.cat');
    }

    public function wiki_page() {
        return view('wiki.page');
    }
}
