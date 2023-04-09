<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CategoryType;
use App\Enums\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\Recruitment\StoreRecruitmentRequest;
use App\Models\Post;
use App\Models\Recruitment;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Recruitment\RecruitmentRepository;
use App\Services\Helper\SlugService;
use App\Services\LanguageMeta\LanguageMetaService;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RecruitmentController extends Controller
{
    public function __construct(
        private RecruitmentRepository $recruitmentRepository,
        private LanguageMetaService   $languageMetaService,
        private SlugService           $slugService,
        private CategoryRepository    $categoryRepository)
    {

    }

    public function index(Request $request): Factory|View|Application
    {
        $data = $request->only(['q', 'limit', 'locale', 'category_id']);

        $recruitments = $this->recruitmentRepository->getRecruitmentPaginate($data);
        $categories = $this->categoryRepository->getByType(CategoryType::Recruitment);

        return view('admin.pages.recruitment.index')->with(compact('recruitments', 'categories'));
    }

    public function create(Request $request): Factory|View|Application
    {
        $categories = $this->categoryRepository->getByType(CategoryType::Recruitment);
        $refLanguage = $request->get('ref_language', Language::Vietnamese);
        $category_id = $request->get('category_id', 0);
        return view('admin.pages.recruitment.create')->with(compact('categories', 'refLanguage', 'category_id'));
    }

    public function store(StoreRecruitmentRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

            $recruitment = $this->recruitmentRepository->create(array_merge($data, [
                'create_by' => auth()->id(),
                'update_by' => auth()->id(),
                'views' => 0,
            ]));

            $recruitment
                ?->slug()
                ->create(['content' => $this->slugService->generateSlug(Recruitment::class, $recruitment->title)]);

            $refLanguage = $data['ref_language'] ?? Language::Vietnamese;
            $this->languageMetaService
                ->createPost($recruitment->id, Recruitment::class, $refLanguage, @$data['from_id']);

            DB::commit();
            $request->session()->flash('success', 'Tạo mới bài tuyển dụng thành công');
            return redirect()->route('admin.recruitments.index', ['locale' => $refLanguage]);

        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Error store recruitment', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới bài tuyển dụng']])
                ->withInput();
        }
    }

    public function edit(int|string $id): Factory|View|Application
    {
        $recruitment = $this->recruitmentRepository->find($id);
//        $this->authorize('edit', $recruitment);
        $recruitment->load('language');
        $recruitment->locales = $this->languageMetaService->getArrayLocale($recruitment->id, Recruitment::class);
        $recruitment->localeIds = $this->languageMetaService->getArrayLocaleId($recruitment->id, Recruitment::class);
        $categories = $this->categoryRepository->getByType(CategoryType::Recruitment);
        return view('admin.pages.recruitment.edit')->with(compact('recruitment', 'categories'));
    }

    public function update(StoreRecruitmentRequest $request, int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $recruitment = $this->recruitmentRepository->find($id);

            $recruitment?->fill(array_merge($data, [
                'update_by' => auth()->id(),
            ]));

            $recruitment?->save();

            $recruitment
                ?->slug()
                ->create([
                    'content' => $this->slugService->generateSlug(Recruitment::class, $recruitment->title, $id)]);

            DB::commit();

            $request->session()->flash('success', 'Cập nhật bài tuyển dụng thành công');

            return redirect()->route('admin.recruitments.index');

        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Error update recruitment', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật bài viết']])
                ->withInput();
        }
    }

    public function destroy(int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $this->recruitmentRepository->delete($id);

            DB::commit();

            session()->flash('success', 'Xóa bài tuyển dụng công');

            return redirect()->route('admin.recruitments.index');

        } catch (Exception $exception) {
            DB::rollBack();
            Log::error('Error delete recruitment', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa bài tuyển dụng']])
                ->withInput();
        }
    }
}
