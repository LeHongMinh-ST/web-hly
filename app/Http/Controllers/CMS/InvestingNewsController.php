<?php

namespace App\Http\Controllers\CMS;

use App\Enums\CategoryType;
use App\Events\ViewPost;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\Slug\SlugRepository;
use App\Services\Blog\BlogService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;

class InvestingNewsController extends Controller
{
    public function __construct(
        private PostRepository     $postRepository,
        private CategoryRepository $categoryRepository,
        private SlugRepository     $slugRepository,
        private BlogService        $blogService
    )
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        if (!empty($request->input('danh-muc'))) {

            $slug = $this->slugRepository->findWhere([
                'content' => $request->input('danh-muc'),
                'slugable_type' => Category::class,
            ])->first();

            $data = $this->blogService->handleFrontRoutes($slug);

            if ($slug->id != @$data['slug']->id) {
                return redirect(localized_route('cms.news', ['danh-muc'=>@$data['slug']->content]));
            }

            $posts = $this->postRepository->scopeQuery(function ($query) use ($data) {
                return $query->where('category_id', $data['data']['category']->id);
            })->with(['categories'])->paginate(7);

        } else {
            $posts = $this->postRepository
                ->whereHas('categories', fn($category) => $category->where('type', CategoryType::Investment))
                ->whereHas('language', fn($language) => $language->where('language_code', app()->getLocale()))
                ->with(['categories', 'slug'])
                ->paginate(7);
        }

        $categories = $this->categoryRepository->getCategory([
            'type' => CategoryType::Investment,
            'locale' => app()->getLocale()
        ]);

        return view('cms.page.investingNews')->with([
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function getPost($slug) {
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

        $data = $this->blogService->handleFrontRoutes($slug);

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
