<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\Post\PostRepository;
use App\Repositories\Recruitment\RecruitmentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SearchController extends Controller
{
    public function __construct(
        private PostRepository        $postRepository,
        private RecruitmentRepository $recruitmentRepository
    )
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $data = $request->only(['q', 'limit', 'locale']);

        if (!isset($data['q'])) {
            $result = new LengthAwarePaginator([], 0, 1);
        } else {
            $posts = $this->postRepository->getAllPostPaginate($data);
            $recruitments = $this->recruitmentRepository->getRecruitmentPaginate($data);

            $result = new LengthAwarePaginator(
                array_merge($posts->items(), $recruitments->items()),
                $posts->total() + $recruitments->total(),
                $posts->perPage() + $recruitments->perPage(),
                null,
                [
                    'path' => 'tim-kiem'
                ]
            );
        }

        return view('cms.page.search')->with(compact('result'));
    }
}
