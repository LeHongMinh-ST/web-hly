<?php

namespace App\Services\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\Post\PostRepository;

class BlogService
{
    public function handleFrontRoutes($slug)
    {
        $condition = [
            'id' => $slug->slugable_id,
            'status' => 1,
        ];

        switch ($slug->slugable_type) {
            case Post::class:
                $post = app(PostRepository::class)->scopeQuery(function ($query) use ($condition) {
                    return $query->where($condition);
                })->with(['categories', 'tags', 'categories.slug'])->first();

                if (empty($post)) {
                    abort(404);
                }

                $post->slug = $slug;


                return [
                    'view' => 'cms.page.post',
                    'data' => compact('post'),
                    'slug' => $post->slug,
                ];
            case Category::class:
                return 0;
            case Tag::class:
                return 1;

        }

        return $slug;
    }
}
