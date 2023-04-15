<?php

namespace App\Http\Controllers\Admin;

use App\Enums\CacheEnum;
use App\Enums\CategoryType;
use App\Enums\Language;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;
use App\Models\Post;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Post\PostRepository;
use App\Services\Helper\SlugService;
use App\Services\LanguageMeta\LanguageMetaService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function __construct(
        private PostRepository      $postRepository,
        private CategoryRepository  $categoryRepository,
        private LanguageMetaService $languageMetaService,
        private SlugService         $slugService
    )
    {
    }

    /**
     * Display a listing of the resource.
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request): Factory|View|Application
    {
        $data = $request->only(['q', 'limit', 'locale']);

        $posts = $this->postRepository->getPostPaginate($data);

        return view('admin.pages.post.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function create(Request $request): Factory|View|Application
    {
        $post = null;

        $refLanguage = $request->get('ref_language', Language::Vietnamese);

        $categories = $this->categoryRepository->getCategory([
            'locale' => app()->getLocale(),
            'type' => CategoryType::News
        ]);;

        return view('admin.pages.post.create')->with(compact('categories', 'post', 'refLanguage'));
    }


    /**
     * Store the specified resource from storage.
     *
     * @param StorePostRequest $request
     * @return RedirectResponse
     */
    public function store(StorePostRequest $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $post = $this->postRepository->create(array_merge($data, [
                'create_by' => auth()->id(),
                'update_by' => auth()->id(),
                'views' => 0,
                'is_featured' => array_key_exists('is_featured', $data)
            ]));

            $post?->tags()->attach(@$data['tags'] ?? []);

            $post?->slug()->create(['content' => $this->slugService->generateSlug(Post::class, $post->title)]);

            $refLanguage = $data['ref_language'] ?? Language::Vietnamese;

            $this->languageMetaService->createPost($post->id, Post::class, $refLanguage, @$data['from_id']);

            DB::commit();
            removeCaches([CacheEnum::PostFeatured, CacheEnum::PostNewHome]);
            $request->session()->flash('success', 'Tạo mới bài viết thành công');
            return redirect()->route('admin.posts.index', ['locale' => $refLanguage]);

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error store post', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể tạo mới bài viết']])
                ->withInput();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int|string $id
     * @return Application|Factory|View
     */
    public function edit(int|string $id): Factory|View|Application
    {
        $post = $this->postRepository->find($id);
        $this->authorize('edit', $post);

        $post->load('language');

        $post->locales = $this->languageMetaService->getArrayLocale($post->id, Post::class);
        $post->localeIds = $this->languageMetaService->getArrayLocaleId($post->id, Post::class);
        $categories = $this->categoryRepository->getCategory([
            'locale' => $post->language()->first()->language_code,
            'type' => CategoryType::News
        ]);
        return view('admin.pages.post.edit')->with(compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePostRequest $request
     * @param int|string $id
     * @return RedirectResponse
     */
    public function update(StorePostRequest $request, int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $post = $this->postRepository->find($id);
            $this->authorize('update', $post);

            $post?->fill(array_merge($data, [
                'update_by' => auth()->id(),
                'is_featured' => array_key_exists('is_featured', $data)
            ]));

            $post?->save();
            $post?->tags()->sync(@$data['tags'] ?? []);
            $post?->slug()->delete();
            $post?->slug()->create(['content' => $this->slugService->generateSlug(Post::class, $post->title, $id)]);

            DB::commit();

            removeCaches([CacheEnum::PostFeatured, CacheEnum::PostNewHome]);

            $request->session()->flash('success', 'Cập nhật bài viết thành công');

            return redirect()->route('admin.posts.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error update post', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể cập nhật bài viết']])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int | string $id
     * @return RedirectResponse
     */
    public function destroy(int|string $id): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $post = $this->postRepository->find($id);
            $this->authorize('update', $post);

            $this->postRepository->delete($id);

            DB::commit();

            removeCaches([CacheEnum::PostFeatured, CacheEnum::PostNewHome]);

            session()->flash('success', 'Xóa bài viết thành công');

            return redirect()->route('admin.posts.index');

        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Error delete post', [
                'method' => __METHOD__,
                'message' => $exception->getMessage()
            ]);

            return redirect()->back()
                ->withErrors(['error' => ['Không thể xóa bài viết']])
                ->withInput();
        }
    }
}
