<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Slug extends Model
{
    use HasFactory;

    protected $table = 'slugs';

    protected $fillable = [
        'content',
        'slugable_id',
        'slugable_type',
        'create_by',
        'update_by'
    ];

    public function slugable(): MorphTo
    {
        return $this->morphTo();
    }

    public function createBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function updateBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_by');
    }
}
