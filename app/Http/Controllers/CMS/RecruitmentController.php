<?php

namespace App\Http\Controllers\CMS;

use App\Enums\CategoryType;
use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Recruitment\RecruitmentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function __construct(
        private RecruitmentRepository $recruitmentRepository,
        private CategoryRepository $categoryRepository)
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $categoryId = $request->input('category_id');
        if (!empty($categoryId)) {
            $recruitmentPosts = $this->recruitmentRepository->getByCategoryId($categoryId);
        } else {
            $recruitmentPosts = $this->recruitmentRepository->all();
        }

        $categories = $this->categoryRepository->getByType(CategoryType::Recruitment);
        return view('cms.page.recruitment')
            ->with(compact('recruitmentPosts', 'categories', 'categoryId'));
    }
}
