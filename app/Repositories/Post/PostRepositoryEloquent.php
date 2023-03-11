<?php

namespace App\Repositories\Post;

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

        return $this->scopeQuery(function ($query) {
            return $query->orderBy('created_at', 'desc');
        })->with(['categories', 'updateBy', 'createBy'])->paginate($limit);
    }

    public function getFeaturedPosts(int $limit)
    {
        return $this->scopeQuery(function ($query) use($limit) {
            return $query->where('is_featured', true)->limit($limit);
        })->get();
    }
}
