<?php

namespace App\Listeners;

use App\Events\ViewPage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Session\Store;

class ViewPageHandler
{
    public function __construct(private Store $session)
    {
    }

    public function handle(ViewPage $event): void
    {
        $page = $event->page;
        if (!$this->isPostViewed($page))
        {
            $page->increment('view_count');
            $this->storePost($page);
        }
    }

    private function isPostViewed($page): bool
    {
        $viewed = $this->session->get('viewed_pages', []);

        return array_key_exists($page->id, $viewed);
    }

    private function storePost($page): void
    {
        $key = 'viewed_pages.' . $page->id;

        $this->session->put($key, time());
    }
}
