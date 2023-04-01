<?php

namespace App\Repositories\Recruitment;

use Prettus\Repository\Contracts\RepositoryInterface;

interface RecruitmentRepository extends RepositoryInterface
{
    public function getRecruitmentPaginate(array $data);

    public function getByCategoryId(int $categoryId);
}
