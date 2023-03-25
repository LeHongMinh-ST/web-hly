<?php

namespace App\Repositories\Setting;

use Prettus\Repository\Contracts\RepositoryInterface;

interface SettingRepository extends RepositoryInterface
{
    public function getByKey(string $key);
}
