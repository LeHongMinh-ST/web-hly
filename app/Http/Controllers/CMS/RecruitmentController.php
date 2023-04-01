<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Repositories\Recruitment\RecruitmentRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class RecruitmentController extends Controller
{
    public function __construct(private RecruitmentRepository $recruitmentRepository)
    {
    }

    public function index(): Factory|View|Application
    {
        $recruitmentPosts = $this->recruitmentRepository->all();
//        dd($recruitmentPosts);
        return view('cms.page.recruitment')->with(compact('recruitmentPosts'));
    }
}
