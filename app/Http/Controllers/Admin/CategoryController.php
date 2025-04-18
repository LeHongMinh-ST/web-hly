<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Models\Category;
use App\Enums\Language;
use App\Repositories\Category\CategoryRepository;
use App\Services\LanguageMeta\LanguageMetaService;
use App\Services\Helper\SlugService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function __construct(
        private CategoryRepository  $categoryRepository,
        private LanguageMetaService $languageMetaService,
        private SlugService         $slugService
    )
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): Factory|View|Application
    {
        $data = $request->only(['q', 'limit', 'locale', 'type']);

        $categories = $this->categoryRepository->getCategoryPaginate($data);

        return view('admin.pages.category.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Factory|View|Application
     */
    public function create(Request $request): Factory|View|Application
    {
        $category = null;
        $refLanguage = Language::Vietnamese;

        if ($request->has('ref_language') && $request->has('from_id')) {
            $category = $this->categoryRepository->find($request->get('from_id'));
            $refLanguage = $request->get('ref_language');
        }

        return view('admin.pages.category.create')->with([
            'category' => $category,
            'refLanguage' => $refLanguage
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @return RedirectResponse
     */
    public function store(StoreCategoryRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $category = $this->categoryRepository->create(array_merge($data, [
                'create_by' => auth()->id(),
                'update_by' => auth()->id(),
                'views' => 0
            ]));

            $category?->slug()->create(['content' => $this->slugService->generateSlug(Category::class, $category->name)]);

            $refLanguage = $data['ref_language'] ?? Language::Vietnamese;

            $this->languageMetaService->createPost($category->id, Category::class, $refLanguage, @$data['from_id']);

            DB::commit();
            $request->session()->flash('success', 'Tạo mới danh mục thành công');
            return redirect()->route('admin.categories.index', ['locale' => $refLanguage]);

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error store category', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới danh mục']])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Factory|View|Application
     */
    public function edit(int $id): Factory|View|Application
    {
        $category = $this->categoryRepository->find($id);
        $category->load('language');
        $category->locales = $this->languageMetaService->getArrayLocale($category->id, Category::class);
        $category->localeIds = $this->languageMetaService->getArrayLocaleId($category->id, Category::class);

        return view('admin.pages.category.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreCategoryRequest $request
     * @param int | string $id
     * @return RedirectResponse
     */
    public function update(StoreCategoryRequest $request, int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $category = $this->categoryRepository->find($id);

            $category?->fill(array_merge($data, [
                'update_by' => auth()->id(),
            ]));

            $category?->save();

            $category?->slug()->create(['content' => $this->slugService->generateSlug(Category::class, $category->name, $id)]);

            DB::commit();

            $request->session()->flash('success', 'Cập nhật danh mục thành công');

            return redirect()->route('admin.categories.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update category', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật danh mục']])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int|string $id
     * @return RedirectResponse
     */
    public function destroy(int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->categoryRepository->delete($id);

            DB::commit();

            session()->flash('success', 'Xóa danh mục thành công');

            return redirect()->route('admin.categories.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error delete category', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa danh mục']])
                ->withInput();
        }
    }
}
