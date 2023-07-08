<?php

namespace App\Repositories\Supplier;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface SupplierRepository.
 *
 * @package namespace App\Repositories\Post;
 */
interface SupplierRepository extends RepositoryInterface
{
    public function getPaginate(array $data);

}
