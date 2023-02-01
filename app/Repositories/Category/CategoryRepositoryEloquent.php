<?php

namespace App\Repositories\Category;

use App\Models\Category;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class CategroyRepositoryEloquent.
 *
 * @package namespace App\Repositories\Category;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategroyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getCategoryPaginate(array $data)
    {
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);

        return $this->scopeQuery(function ($query) {
            return $query->orderBy('created_at', 'desc');
        })->with([ 'updateBy', 'createBy'])->paginate($limit);
    }

}
