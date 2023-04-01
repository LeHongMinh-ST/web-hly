<?php

namespace App\Http\Controllers\CMS;

use App\Events\ViewPost;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Post\PostRepository;
use App\Repositories\Slug\SlugRepository;
use App\Services\Blog\BlogService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Event;

class BlogController extends Controller
{
    public function __construct(
        private SlugRepository $slugRepository,
        private PostRepository     $postRepository)
    {
    }

    public function getPost($slug, BlogService $blogService): Factory|View|Application
    {
        $slug = $this->slugRepository->findWhere([
            'content' => $slug,
            'slugable_type' => Post::class,
        ])->first();

        if (!$slug) {
            abort(404);
        }

        $posts = $this->postRepository->with(['categories', 'slug'])->limit(4);

        $data = $blogService->handleFrontRoutes($slug);
        Event::dispatch(new ViewPost($data['data']['post']));
        return view('cms.page.post', [
            'post' => $data['data']['post'],
            'posts' => $posts
        ]);
    }
}
