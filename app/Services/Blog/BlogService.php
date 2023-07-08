<?php

namespace App\Services\Blog;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Repositories\Category\CategoryRepository;
use App\Repositories\LanguageMeta\LanguageMetaRepository;
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

                $languageMeta = app(LanguageMetaRepository::class)->findWhere(['reference_id' => $post->id, 'reference_type' => Post::class])->first();

                $currentLanguage = app(LanguageMetaRepository::class)->findWhere(['language_meta_origin' => $languageMeta->language_meta_origin, 'language_code' => app()->getLocale()])->first();

                if ($currentLanguage) {
                    $condition['id'] = $currentLanguage->reference_id;

                    $postLocale = app(PostRepository::class)->scopeQuery(function ($query) use ($condition) {
                        return $query->where($condition);
                    })->with(['categories', 'tags', 'categories.slug', 'slug'])->first();

                    if ($postLocale) {
                        $post = $postLocale;
                    }
                }

                return [
                    'view' => 'cms.page.post',
                    'data' => compact('post'),
                    'slug' => $post->slug,
                    'locale' => $currentLanguage ? $currentLanguage->language_code : $languageMeta->language_code
                ];
            case Category::class:
                $category = app(CategoryRepository::class)->scopeQuery(function ($query) use ($condition) {
                    return $query->where($condition);
                })->with(['slug'])->first();

                if (empty($category)) {
                    abort(404);
                }

                $languageMeta = app(LanguageMetaRepository::class)->findWhere(['reference_id' => $category->id, 'reference_type' => Category::class])->first();

                $currentLanguage = app(LanguageMetaRepository::class)->findWhere(['language_meta_origin' => $languageMeta->language_meta_origin, 'language_code' => app()->getLocale()])->first();

                if ($currentLanguage) {
                    $condition['id'] = $currentLanguage->reference_id;

                    $categoryLocale = app(CategoryRepository::class)->scopeQuery(function ($query) use ($condition) {
                        return $query->where($condition);
                    })->with(['slug'])->first();

                    if ($categoryLocale) {
                        $category = $categoryLocale;
                    }
                }

                return [
                    'view' => 'cms.page.news',
                    'data' => compact('category'),
                    'slug' => $category->slug,
                    'locale' => $currentLanguage ? $currentLanguage->language_code : $languageMeta->language_code
                ];

            case Tag::class:
                return 1;

        }

        return $slug;
    }
}
