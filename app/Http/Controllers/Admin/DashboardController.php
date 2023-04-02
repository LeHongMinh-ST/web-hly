<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\Post\PostRepository;
use App\Repositories\Recruitment\RecruitmentRepository;
use App\Repositories\ReportViewPage\ReportViewPageRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function __construct(
        private PostRepository           $postRepository,
        private CategoryRepository       $categoryRepository,
        private RecruitmentRepository    $recruitmentRepository,
        private ReportViewPageRepository $reportViewPageRepository
    )
    {
    }

    public function index(Request $request): Factory|View|Application
    {
        $posts = $this->postRepository->get()->count();
        $categories = $this->categoryRepository->get()->count();
        $recruitments = $this->recruitmentRepository->get()->count();
        $viewPageModel = $this->reportViewPageRepository->getModel();
        $viewPage = $viewPageModel->sum('view_count');

        $postViewCount = $this->postRepository->orderBy('view_count', 'desc')->paginate(5);


        return view('admin.pages.dashboard')->with([
            'posts' => $posts,
            'categories' => $categories,
            'recruitments' => $recruitments,
            'viewPage' => $viewPage,
            'postViewCount' => $postViewCount
        ]);
    }

    public function getViewPage()
    {
        $now = Carbon::now()->startOfDay();
        $dates = [];
        $dateTime = [];
        for ($i = 0; $i < 15; $i++) {
            $datetime = $now->timestamp;
            $dates[] = [
                'timestamp' => $datetime,
                'text' => $now->format('d/m')
            ];
            $dateTime[] = $datetime;
            $now->subDay();
        }
        $reports = $this->reportViewPageRepository->findWhereIn('date', $dateTime);
        foreach ($dates as $key=> $date) {
            $report = $reports->where('date', (string)$date['timestamp'])->first();
            $count = 0;
            if ($report) {
                $count = $report->view_count;
            }
            $dates[$key]['value'] = $count;
        }

        $dates = array_reverse($dates);

        $value = collect($dates)->map(function ($date) {
           return $date['value'];
        });

        $dates = collect($dates)->map(function ($date) {
            return $date['text'];
        });

        return response()->json([
            'value' => $value,
            'date' => $dates
        ]);
    }
}
