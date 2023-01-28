<?php

namespace App\Repositories\User;

use Illuminate\Http\Request;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface UserRepository.
 *
 * @package namespace App\Repositories\User;
 */
interface UserRepository extends RepositoryInterface
{
    public function getUsersPaginate(Request $request);
}
