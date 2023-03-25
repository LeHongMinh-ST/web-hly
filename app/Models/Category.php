<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'order',
        'status',
        'type',
        'create_by',
        'update_by',
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function slug(): MorphOne
    {
        return $this->morphOne(Slug::class, 'slugable');
    }

    public function createBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_by');
    }

    public function updateBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'update_by');
    }

    public function getTextDatePublishAttribute(): string
    {
        return Carbon::createFromTimeString($this->created_at)->format('H:m d/m/Y');
    }

    public function getIsActiveTextAttribute(): string
    {
        return match ((int)$this->status) {
            1 => '<span class="label label-primary">Công khai</span>',
            0 => '<span class="label label-danger">Ẩn</span>',
        };
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Category $post) {
            $post->posts()->detach();
        });
    }
}
