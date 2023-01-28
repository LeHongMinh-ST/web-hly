<?php

namespace App\Repositories\MemberBrand;

use App\Models\MemberBrand;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class MemberBrandRepositoryEloquent.
 *
 * @package namespace App\Repositories\MemberBrand;
 */
class MemberBrandRepositoryEloquent extends BaseRepository implements MemberBrandRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return MemberBrand::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

}
