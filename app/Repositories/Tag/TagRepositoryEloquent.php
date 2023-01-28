<?php

namespace App\Repositories\Tag;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Tag\TagRepository;
use App\Entities\Tag\Tag;
use App\Validators\Tag\TagValidator;

/**
 * Class TagRepositoryEloquent.
 *
 * @package namespace App\Repositories\Tag;
 */
class TagRepositoryEloquent extends BaseRepository implements TagRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Tag::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
