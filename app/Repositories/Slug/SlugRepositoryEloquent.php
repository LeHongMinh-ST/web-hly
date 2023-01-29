<?php

namespace App\Repositories\Slug;

use App\Models\Slug;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class TagRepositoryEloquent.
 *
 * @package namespace App\Repositories\Tag;
 */
class SlugRepositoryEloquent extends BaseRepository implements SlugRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Slug::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
