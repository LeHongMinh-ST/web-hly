<?php

namespace App\Repositories\User;

use App\Entities\User\User;
use App\Validators\User\UserValidator;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class UserRepositoryEloquent.
 *
 * @package namespace App\Repositories\User;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getUsersPaginate(Request $request)
    {
        return $this->scopeQuery(function ($query) {
            return $query->orderBy('created_at', 'desc');
        })->paginate();
    }
}
