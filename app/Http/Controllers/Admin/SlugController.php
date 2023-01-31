<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Slug\SlugRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SlugController extends Controller
{

    public function __construct(private SlugRepository $slugRepository)
    {
    }

    public function generate(Request $request): string
    {
        $data = $request->all();
        $slugs = $this->slugRepository->all($columns = ['content'])->toArray();
        $arraySlug = array_map(function ($slug) {
            return $slug['content'];
        }, $slugs);
        if(@$data['random'] || false) $slug = Str::slug($data['name'])."-".rand(1, 100);
        else  $slug = Str::slug($data['name']);
        while(in_array($slug, $arraySlug)) {
            $slug = Str::slug($data['name'])."-".rand(1, 100);
        }
        return $slug;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
