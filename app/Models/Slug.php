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
        'slugableType',
    ];

    public function slugable(): MorphTo
    {
        return $this->morphTo();
    }
}
