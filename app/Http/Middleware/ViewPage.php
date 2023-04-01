<?php

namespace App\Http\Middleware;

use App\Models\ReportViewPage;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\Event;

class ViewPage
{
    public function __construct( private Store $session)
    {
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $pages = $this->getViewedPosts();

        if (!is_null($pages))
        {
            $pages = $this->cleanExpiredViews($pages);
            $this->storePosts($pages);
        }

        $date = Carbon::now()->startOfDay()->timestamp;

        $page = ReportViewPage::firstOrCreate(['date' => $date]);

        Event::dispatch(new \App\Events\ViewPage($page));

        return $next($request);
    }

    private function getViewedPosts()
    {
        return $this->session->get('viewed_pages', null);
    }

    private function cleanExpiredViews($pages): array
    {
        $time = time();

        // Let the views expire after one hour.
        $throttleTime = 3600;

        return array_filter($pages, function ($timestamp) use ($time, $throttleTime)
        {
            return ($timestamp + $throttleTime) > $time;
        });
    }

    private function storePosts($pages): void
    {
        $this->session->put('viewed_pages', $pages);
    }
}
