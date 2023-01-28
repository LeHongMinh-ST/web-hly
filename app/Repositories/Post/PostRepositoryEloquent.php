<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

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
        })->with(['role', 'createBy'])->paginate($limit);
    }

}
