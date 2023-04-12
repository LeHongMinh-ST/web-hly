<?php

namespace App\Http\Controllers\CMS;

use App\Enums\CacheEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Supplier;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Contact\ContactRepository;
use App\Repositories\LanguageMeta\LanguageMetaRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\Slug\SlugRepository;
use App\Services\Blog\BlogService;
use Illuminate\Http\RedirectResponse;
use App\Repositories\Supplier\SupplierRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Termwind\ValueObjects\isEmpty;

class HomeController extends Controller
{
    const TIME_CACHE = 60 * 60 * 24;

    public function __construct(
        private PostRepository     $postRepository,
        private SupplierRepository  $supplierRepository,
        private SlugRepository $slugRepository,
        private ContactRepository  $contactRepository,
        private CategoryRepository $categoryRepository,

    )
    {
    }

    public function index()
    {

        $posts = Cache::remember(CacheEnum::PostNewHome, self::TIME_CACHE, function () {
            return $this->postRepository->getPostNew(config('constants.limit_post_new_home'));
        });

        $featuredPosts = Cache::remember(CacheEnum::PostFeatured, self::TIME_CACHE, function () {
            return $this->postRepository->getFeaturedPosts(config('constants.limit_post_feature'));
        });

        return view('cms.page.index')->with([
            'posts' => $posts,
            'featuredPosts' => $featuredPosts ?? []
        ]);
    }

    public function investors()
    {
        $posts = $this->postRepository->with('categories')->all();
        $suppliers = $this->supplierRepository->scopeQuery(function ($query) {
            return $query->whereHas('language', function ($language) {
                return $language->where('language_code', app()->getLocale());
            });
        })->with('slug')->findByField('status','1');

        $supplierTops = $this->supplierRepository->scopeQuery(function ($query) {
            return $query->whereHas('language', function ($language) {
                return $language->where('language_code', app()->getLocale());
            });
        })->with('slug')->findWhere([
            'status' => 1,
            'is_top' => 1
        ]);

        return view('cms.page.investor')->with([
            'posts' => $posts,
            'suppliers' => $suppliers,
            'supplierTops' => $supplierTops
        ]);
    }

    public function detailinvestor($slug)
    {

        $slugObj = $this->slugRepository->findWhere([
            'content' => $slug,
            'slugable_type' => Supplier::class,
        ])->first();

        $condition = [
            'id' => $slugObj->slugable_id,
            'status' => 1,
        ];

        $supplier = app(SupplierRepository::class)->scopeQuery(function ($query) use ($condition) {
            return $query->where($condition);
        })->first();

        if (empty($supplier)) {
            abort(404);
        }

        $languageMeta = app(LanguageMetaRepository::class)->findWhere(['reference_id' => $supplier->id, 'reference_type' => Post::class])->first();

        $currentLanguage = app(LanguageMetaRepository::class)->findWhere(['language_meta_origin' => $languageMeta->language_meta_origin, 'language_code' => app()->getLocale()])->first();
        if ($currentLanguage) {
            $condition['id'] = $currentLanguage->reference_id;

            $supplierLocale = app(SupplierRepository::class)->scopeQuery(function ($query) use ($condition) {
                return $query->where($condition);
            })->first();
            if ($supplierLocale) {
                $supplier = $supplierLocale;
            }
        }
        return view('cms.page.info.forCustomers')->with([
            'supplier' => $supplier,
        ]);;
    }

    public function postPage(Request $request, BlogService $blogService)
    {
        if (!empty($request->input('danh-muc'))) {

            $slug = $this->slugRepository->findWhere([
                'content' => $request->input('danh-muc'),
                'slugable_type' => Category::class,
            ])->first();

            $data = $blogService->handleFrontRoutes($slug);

            $posts = Post::whereHas('categories', function ($query) use ($data) {
                $query->where('category_id', $data['data']['category']->id);
            })->with(['categories'])->paginate(5);

        } else {
            $posts = $this->postRepository->with(['categories', 'slug'])->paginate(7);
        }

        $categories = $this->categoryRepository->getCategoryHome();

        return view('cms.page.news')->with([
            'posts' => $posts,
            'categories' => $categories,
        ]);
    }

    public function createContact(StoreContactRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $this->contactRepository->create($data);

            DB::commit();
            $request->session()->flash('success', 'Gửi yêu cầu thành công');
            return redirect()->route('cms.contact');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error store contact', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể Gửi yêu cầu']])->withInput();
        }
    }
}
