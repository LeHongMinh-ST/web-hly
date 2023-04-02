<?php

namespace App\Repositories\Role;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface RoleRepository.
 *
 * @package namespace App\Repositories\Role;
 */
interface RoleRepository extends RepositoryInterface
{
    public function getRolesPaginate(array $data);
}
