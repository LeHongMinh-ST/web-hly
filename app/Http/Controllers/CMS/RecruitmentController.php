<?php

namespace App\Http\Controllers\CMS;

use App\Enums\CategoryType;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Recruitment;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\Recruitment\RecruitmentRepository;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    public function __construct(
        private RecruitmentRepository $recruitmentRepository,
        private CategoryRepository $categoryRepository,
        private SlugRepository $slugRepository,
    )
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $slug = $request->input('danh_muc');
        if (!empty($slug) && $slug!='tat-ca') {
            $slugObj = $this->slugRepository->findWhere([
                'content' => $slug,
                'slugable_type' => Category::class,
            ])->first();
            if (empty($slugObj)) {
                abort(404);
            }
            $category = app(CategoryRepository::class)->scopeQuery(function ($query) use ($slugObj) {
                return $query->where(
                    [
                        'id' => $slugObj->slugable_id,
                        'status' => 1,
                    ]
                );
            })->with(['slug'])->first();
            if (empty($category)) {
                abort(404);
            }
            $recruitmentPosts = $this->recruitmentRepository->scopeQuery(function ($query) use ($category) {
                return $query->where('category_id',$category->id)->whereHas('language', function ($language) {
                    return $language->where('language_code', app()->getLocale());
                })->orderBy('created_at', 'desc');
            })->get();
        } else {
            $recruitmentPosts = $this->recruitmentRepository->scopeQuery(function ($query) {
                return $query->whereHas('language', function ($language) {
                    return $language->where('language_code', app()->getLocale());
                });
            })->findByField('status','1');
        }
        $language = app()->getLocale();
        $categorySlug = @$slugObj->content ?? "tat-ca";
        $categories = $this->categoryRepository->with('slug')->getByType(CategoryType::Recruitment);
        return view('cms.page.recruitment')
            ->with(compact('recruitmentPosts', 'categories', 'categorySlug', 'language'));
    }
}
