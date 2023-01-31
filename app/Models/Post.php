<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'status',
        'description',
        'thumbnail',
        'language',
        'views',
        'create_by',
        'update_by',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'post_categories');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags');
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

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Post $post) {
            $post->categories()->detach();
            $post->tags()->detach();
            $post->slug()->delete();
        });
    }

    public function getTextDatePublishAttribute()
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
}
