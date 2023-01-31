<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Language;
use App\Http\Controllers\Controller;
use App\Models\Post;
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
        private PostRepository $postRepository,
        private LanguageMetaService $languageMetaService,
        private SlugService $slugService
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
        return view('admin.pages.post.create');
    }


    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
