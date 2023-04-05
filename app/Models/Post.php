<?php

namespace App\Models;

use App\Enums\Language;
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
        'is_featured',
        'description',
        'thumbnail',
        'language',
        'views',
        'category_id',
        'create_by',
        'update_by',
    ];

    protected $casts = [
        'status' => 'integer',
    ];

    public function language(): MorphOne
    {
        return $this->morphOne(LanguageMeta::class, 'languageable', 'reference_type', 'reference_id');
    }

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
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

    public function getLanguageTextAttribute()
    {
        $language = $this->language()->first();
        if (!$language) {
            return 'Tiếng Việt';
        }
        return match ($language->language_code) {
            Language::Vietnamese => 'Tiếng Việt',
            Language::English => 'Tiếng Anh',
            Language::Chinese => 'Tiếng Trung',
        };
    }

    public function getLanguageIconAttribute()
    {
        $language = $this->language()->first();
        if (!$language) {
            return asset('assets/admin/images/flags/vietnam-flag-icon.svg');
        }
        return match ($language->language_code) {
            Language::Vietnamese => asset('assets/admin/images/flags/vietnam-flag-icon.svg'),
            Language::English => asset('assets/admin/images/flags/united-kingdom-flag-icon.svg'),
            Language::Chinese => asset('assets/admin/images/flags/china-flag-icon.svg'),
        };
    }

    public function getLanguageCodeAttribute()
    {
        $language = $this->language()->first();
        if (!$language) {
            return Language::Vietnamese;
        }
        return $language->language_code;
    }
}
