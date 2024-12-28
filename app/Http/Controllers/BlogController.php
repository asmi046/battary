<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {

        $all_posts = Blog::select()->paginate(12);
        $all_post_cat = BlogCategory::all();

        return view('wiki.index', [
            'posts' => $all_posts,
            'cats' => $all_post_cat,
        ]);
    }

    public function wiki_cat($slug) {

        $curent_cat = BlogCategory::with('posts')->where('slug', $slug)->first();
        $all_post_cat = BlogCategory::all();
        // dd($curent_cat);
        if(!$curent_cat) abort('404');

        return view('wiki.cat', [
            'curent' => $curent_cat,
            'cats' => $all_post_cat,
        ]);
    }

    public function wiki_page($slug) {
        $post = Blog::where('slug', $slug)->first();


        if(!$post) abort('404');

        return view('wiki.page', [
            'post' => $post,

        ]);
    }
}
