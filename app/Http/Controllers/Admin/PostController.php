<?php

namespace App\Http\Controllers\Admin;

use App\Enums\Language;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Repositories\Post\PostRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct(
        private PostRepository $postRepository,
        private LanguageMetaService $languageMetaService
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

        return view('admin.pages.post.index');
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

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function store(Request $request): Factory|View|Application
    {
        $data = $request->all();

        $post = $this->postRepository->create(array_merge($data, [
            'create_by' => auth()->id(),
            'update_by' => auth()->id()
        ]));

        $post?->categories()->attach(@$data['category_ids'] ?? []);

        $post?->tags()->attach(@$data['tags'] ?? []);

        $post?->slug()->create(['content' => Str::slug($post?->title)]);

        $refLanguage = $data['ref_language'] ?? Language::Vietnamese;

        $this->languageMetaService->createPost($post->id, Post::class, $refLanguage, $data['from_id']);

        return redirect()->route('admin.posts.index');
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
