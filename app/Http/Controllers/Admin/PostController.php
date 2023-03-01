<?php

namespace App\Http\Controllers\Admin;

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
        $data = $request->only(['q', 'limit']);

        $posts = $this->postRepository->getPostPaginate($data);

        return view('admin.pages.post.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        $categories = $this->categoryRepository->getCategory();

        return view('admin.pages.post.create')->with(compact('categories'));
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
            dd($data);

            $post = $this->postRepository->create(array_merge($data, [
                'create_by' => auth()->id(),
                'update_by' => auth()->id(),
                'views' => 0
            ]));

            $post?->categories()->attach(@$data['category_ids'] ?? []);

            $post?->tags()->attach(@$data['tags'] ?? []);

            $post?->slug()->create(['content' => $this->slugService->generateSlug(Post::class, $post->title)]);

            $refLanguage = $data['ref_language'] ?? Language::Vietnamese;

            $this->languageMetaService->createPost($post->id, Post::class, $refLanguage, @$data['from_id']);

            DB::commit();
            $request->session()->flash('success', 'Tạo mới bài viết thành công');
            return redirect()->route('admin.posts.index');

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
        $categories = $this->categoryRepository->getCategory();
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

            $post?->fill(array_merge($data, [
                'update_by' => auth()->id(),
            ]));

            $post?->save();

            $post?->categories()->sync(@$data['category_ids'] ?? []);

            $post?->tags()->sync(@$data['tags'] ?? []);

            $post?->slug()->create(['content' => $this->slugService->generateSlug(Post::class, $post->title, $id)]);

            DB::commit();

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
            $this->postRepository->delete($id);

            DB::commit();

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
