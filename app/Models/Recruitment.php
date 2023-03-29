<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Recruitment extends Model
{
    use HasFactory;

    protected $table = 'recruitments';

    protected $fillable = [
        'title',
        'content',
        'description',
        'thumbnail',
        'language',
        'views',
        'category_id',
        'create_by',
        'update_by',
    ];

    public function slug(): MorphOne
    {
        return $this->morphOne(Slug::class, 'slugable');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
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

        static::deleting(function (Recruitment $recruitment) {
            $recruitment->categories()->dissociate();
            $recruitment->slug()->delete();
        });
    }

    public function getTextDatePublishAttribute(): string
    {
        return Carbon::createFromTimeString($this->created_at)->format('H:m d/m/Y');
    }
}
