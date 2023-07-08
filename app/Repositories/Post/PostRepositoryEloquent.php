<?php

namespace App\Repositories\Post;

use App\Enums\CacheEnum;
use App\Enums\Language;
use App\Enums\PostType;
use App\Models\Post;
use Illuminate\Support\Facades\Cache;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class PostRepositoryEloquent.
 *
 * @package namespace App\Repositories\Post;
 */
class PostRepositoryEloquent extends BaseRepository implements PostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Post::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getPostPaginate(array $data)
    {
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);
        $q = $data['q'] ?? '';
        $locale = $data['locale'] ?? Language::Vietnamese;
        return $this->scopeQuery(function ($query) use ($q, $locale) {

            if ($q) {
                $query->where('title', 'like', "%$q%");
            }

            $query->where('type', PostType::News)->whereHas('language', function ($language) use ($locale) {
                return $language->where('language_code', $locale);
            });

            return $query->orderBy('created_at', 'desc');
        })->with(['categories', 'createBy', 'language'])->paginate($limit);
    }

    public function getInvestmentArticlePaginate(array $data)
    {
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);
        $q = $data['q'] ?? '';
        $locale = $data['locale'] ?? Language::Vietnamese;
        return $this->scopeQuery(function ($query) use ($q, $locale) {

            if ($q) {
                $query = $query->where('title', 'like', "%$q%");
            }

            $query = $query->where('type', PostType::Investment)->whereHas('language', function ($language) use ($locale) {
                return $language->where('language_code', $locale);
            });

            return $query->orderBy('created_at', 'desc');
        })->with(['categories', 'createBy', 'language'])->paginate($limit);
    }

    public function getFeaturedPosts(int $limit)
    {
        $posts = $this->scopeQuery(function ($query) use ($limit) {
            return $query->where('is_featured', true)
                ->whereHas('language', function ($language) {
                    return $language->where('language_code', app()->getLocale());
                })->limit($limit);
        })->get();

        if (count($posts) < $limit) {
            $idPosts = $posts->pluck('id')->toArray();
            $postNews = $this->scopeQuery(function ($query) use ($idPosts, $limit) {
                return $query->whereNotIn('id', $idPosts)
                    ->whereHas('language', function ($language) {
                        return $language->where('language_code', app()->getLocale());
                    })
                    ->orderBy('created_at')
                    ->limit($limit - count($idPosts));
            })->get();
            $posts = $posts->merge($postNews)->values();
        }

        $posts->load('language');


        return $posts;
    }

    public function getPostNew($limit)
    {
        return $this->scopeQuery(function ($query) use ($limit) {
            return $query->whereHas('language', function ($language) {
                return $language->where('language_code', app()->getLocale());
            })->orderBy('created_at')->limit($limit);
        })->with('categories')->get();
    }

    public function getAllPostPaginate(array $data) {
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);
        $q = $data['q'] ?? '';
        $locale = $data['locale'] ?? Language::Vietnamese;
        return $this->scopeQuery(function ($query) use ($q, $locale) {
            if ($q) {
                $query->where('title', 'like', "%$q%");
            }

            $query->whereHas('language', function ($language) use ($locale) {
                return $language->where('language_code', $locale);
            });

            return $query->orderBy('created_at', 'desc');
        })->with(['categories', 'createBy', 'language'])->paginate($limit);
    }
}
