<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $posts = Post::all();
        return view('cms.page.index')->with([
            'posts'=>$posts
        ]);
    }

    public function postPage(){
        $posts = Post::paginate(5);
//        dd($posts);
        return view('cms.page.news')->with([
            'posts'=>$posts
        ]);
    }
}
