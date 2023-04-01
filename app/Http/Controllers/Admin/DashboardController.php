<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\Recruitment\RecruitmentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct(
        private PostRepository $postRepository,
        private CategoryRepository $categoryRepository,
        private RecruitmentRepository $recruitmentRepository
    )
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $posts = $this->postRepository->get()->count();
        $categories = $this->categoryRepository->get()->count();
        $recruitments = $this->recruitmentRepository->get()->count();

        return view('admin.pages.dashboard')->with(compact('posts', 'categories', 'recruitments'));
    }
}
