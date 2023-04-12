<?php

namespace App\Repositories\Category;

use App\Enums\CategoryType;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface CategroyRepository.
 *
 * @package namespace App\Repositories\Category;
 */
interface CategoryRepository extends RepositoryInterface
{
    public function getCategory($data = []);

    public function getCategoryPaginate(array $data);

    public function getByType(string $type);

    public function getCategoryHome();
}
