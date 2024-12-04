<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
        return view('wiki.index');
    }

    public function product_cat() {
        return view('product.cat');
    }

    public function product_page() {
        return view('product.page');
    }
}
