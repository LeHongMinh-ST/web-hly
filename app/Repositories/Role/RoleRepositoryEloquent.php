<?php

namespace App\Repositories\Role;

use App\Models\Role;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class RoleRepositoryEloquent.
 *
 * @package namespace App\Repositories\Role;
 */
class RoleRepositoryEloquent extends BaseRepository implements RoleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return Role::class;
    }



    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getRolesPaginate($data)
    {
        $limit = $data['limit'] ?? config('constants.limit_pagination', 20);

        $q = $data['q'] ?? '';

        return $this->scopeQuery(function ($query) use ($q) {

            if ($q) {
                $query->where('title', 'like',"%$q%");
            }
            return $query->orderBy('created_at', 'desc');
        })->with(['createBy'])->paginate($limit);
    }
}
