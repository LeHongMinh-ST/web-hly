<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupPermission extends Model
{
    use HasFactory;

    protected $table = 'group_permissions';

    protected $fillable = [
        'name',
        'code',
    ];

    public function permissions(): HasMany
    {
        return $this->hasMany(Permission::class, 'group_permission_id', 'code');
    }
}
