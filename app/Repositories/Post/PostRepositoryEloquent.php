<?php

namespace App\Repositories\Post;

use App\Enums\Language;
use App\Models\Post;
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
                $query->where('title', 'like',"%$q%");
            }

            $query->whereHas('language', function ($language) use ($locale){
                return $language->where('language_code', $locale);
            });

            return $query->orderBy('created_at', 'desc');
        })->with(['categories', 'createBy', 'language'])->paginate($limit);
    }

    public function getFeaturedPosts(int $limit)
    {
        return $this->scopeQuery(function ($query) use($limit) {
            return $query->where('is_featured', true)->limit($limit);
        })->get();
    }
}
