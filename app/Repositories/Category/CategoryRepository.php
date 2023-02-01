<?php

namespace App\Repositories\Category;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategroyRepository.
 *
 * @package namespace App\Repositories\Category;
 */
interface CategoryRepository extends RepositoryInterface
{
    public function getCategory();

    public function getCategoryPaginate(array $data);
}
