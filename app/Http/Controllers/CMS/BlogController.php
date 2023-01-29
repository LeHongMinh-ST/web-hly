<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Slug\SlugRepository;
use App\Services\Blog\BlogService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class BlogController extends Controller
{
    public function __construct(private SlugRepository $slugRepository)
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

        $data = $blogService->handleFrontRoutes($slug);

        return view($data['view'])->with($data['data']);
    }
}
