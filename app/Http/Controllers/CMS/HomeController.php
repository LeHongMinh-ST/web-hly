<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use function Termwind\ValueObjects\isEmpty;

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

    public function postPage(Request $request){
        if (!empty($request->input('category_id'))){
            $posts = Post::whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->input('category_id'));
            })->with(['categories'])->paginate(5);
        }else{
            $posts = Post::with(['categories'])->paginate(5);
        }
//        dd($posts);
        $categories = Category::where('status', 1)->orderBy('order')->get();
        return view('cms.page.news')->with([
            'posts'=>$posts,
            'categories'=>$categories,
        ]);
    }
}
