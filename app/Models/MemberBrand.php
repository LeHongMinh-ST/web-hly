<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MemberBrand extends Model
{
    use HasFactory;

    protected $table = 'member_brands';

    protected $fillable = [
        'name',
        'description',
        'icon_path',
        'created_by',
        'updated_by',
    ];

    public function createBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updateBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}
