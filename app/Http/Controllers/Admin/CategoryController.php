<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Repositories\Category\CategroyRepository;
use App\Services\LanguageMeta\LanguageMetaService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    public function __construct(private CategroyRepository $categoryRepository)
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
        return view('admin.pages.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): Factory|View|Application
    {
        return view('admin.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            dd($data);

            $category = $this->categoryRepository->create(array_merge($data, [
                'create_by' => auth()->id(),
                'update_by' => auth()->id(),
                'views' => 0
            ]));

            $category?->slug()->create(['content' => Str::slug($category?->name)]);

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
     * @param  \Illuminate\Http\Request  $request
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
