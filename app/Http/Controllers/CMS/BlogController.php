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
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Event;

class BlogController extends Controller
{
    public function __construct(
        private SlugRepository $slugRepository,
        private PostRepository $postRepository)
    {
    }

    public function getPost($slug, BlogService $blogService): Factory|View|Application|RedirectResponse
    {
        $slug = $this->slugRepository->findWhere([
            'content' => $slug,
            'slugable_type' => Post::class,
        ])->first();

        if (!$slug) {
            abort(404);
        }

        $posts = $this->postRepository->scopeQuery(function ($query) {
            return $query->whereHas('language', function ($language) {
                return $language->where('language_code', app()->getLocale());
            });
        })->with(['categories', 'slug'])->limit(4);

        $data = $blogService->handleFrontRoutes($slug);

        if ($slug->id != @$data['slug']->id) {
            return redirect(localized_route('cms.news.post', @$data['slug']->content));
        }

        Event::dispatch(new ViewPost($data['data']['post']));

        return view('cms.page.post', [
            'post' => $data['data']['post'],
            'posts' => $posts
        ]);
    }
}
