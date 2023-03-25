<?php

namespace App\Repositories\Config;

use Prettus\Repository\Contracts\RepositoryInterface;

interface SettingRepository extends RepositoryInterface
{
    public function getByKey(string $key);
}
