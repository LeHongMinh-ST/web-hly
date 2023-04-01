<?php

namespace App\Repositories\GroupPermission;

use App\Models\GroupPermission;
use Prettus\Repository\Eloquent\BaseRepository;

class GroupPermissionRepositoryEloquent extends BaseRepository implements GroupPermissionRepository
{

    public function model()
    {
        return GroupPermission::class;
    }
}
