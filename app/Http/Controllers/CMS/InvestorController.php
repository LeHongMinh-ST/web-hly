<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\Slug\SlugRepository;
use App\Services\Blog\BlogService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;


class InvestorController extends Controller
{
    public function __construct(
        private SlugRepository $slugRepository,
        private PostRepository     $postRepository,
        private CategoryRepository $categoryRepository)
    {
    }

    public function getPost( BlogService $blogService): Factory|View|Application
    {
        $posts = $this->postRepository->getPostByNewInversion(4);
        return view('cms.page.investor', [
            'posts' => $posts
        ]);
    }

    public function getListPostAndCatgory(Request $request)
    {
        if (!empty($request->input('category_id'))) {
            $posts = Post::whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->input('category_id'));
            })->with(['categories'])->paginate(5);
        } else {
            $posts = $this->postRepository->getNewsInversion(7);
        }
        $categories = $this->categoryRepository->findWhere([
            'status' => 1,
            'type' => 'investment-news'
        ]);

        return view('cms.page.investorNews')->with([
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }
}
