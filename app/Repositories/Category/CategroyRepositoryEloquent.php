<?php

namespace App\Repositories\Category;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Category\CategroyRepository;
use App\Entities\Category\Categroy;
use App\Validators\Category\CategroyValidator;

/**
 * Class CategroyRepositoryEloquent.
 *
 * @package namespace App\Repositories\Category;
 */
class CategroyRepositoryEloquent extends BaseRepository implements CategroyRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Categroy::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
