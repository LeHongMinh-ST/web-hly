<?php

namespace App\Listeners;

use App\Events\ViewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Session\Store;

class ViewPostHandler
{
    public function __construct(private Store $session)
    {
    }

    public function handle(ViewPost $event): void
    {
        $post = $event->post;
        if (!$this->isPostViewed($post))
        {
            $post->increment('view_count');
            $this->storePost($post);
        }
    }

    private function isPostViewed($post): bool
    {
        $viewed = $this->session->get('viewed_posts', []);

        return array_key_exists($post->id, $viewed);
    }

    private function storePost($post): void
    {
        $key = 'viewed_posts.' . $post->id;

        $this->session->put($key, time());
    }
}
