<?php

namespace App\Repositories\Post;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface PostRepository.
 *
 * @package namespace App\Repositories\Post;
 */
interface PostRepository extends RepositoryInterface
{
    public function getPostPaginate(array $data);

    public function getFeaturedPosts(int $limit);

    public function getPostNew(int $limit);

    public function getInvestmentArticlePaginate(array $data);

    public function getAllPostPaginate(array $data);
}
