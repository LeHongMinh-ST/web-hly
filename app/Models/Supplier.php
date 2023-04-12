<?php

namespace App\Models;

use App\Enums\Language;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $casts = [
        'brands' => 'array',
        'status' => 'integer',
    ];

    protected $fillable = [
        'name',
        'description',
        'introduction',
        'thumbnail',
        'introduction',
        'brands',
        'status',
        'is_top'
    ];

    public function slug(): MorphOne
    {
        return $this->morphOne(Slug::class, 'slugable');
    }


    public function getIsActiveTextAttribute(): string
    {
        return match ((int)$this->status) {
            1 => '<span class="label label-primary">Công khai</span>',
            0 => '<span class="label label-danger">Ẩn</span>',
        };
    }

    public function language(): MorphOne
    {
        return $this->morphOne(LanguageMeta::class, 'languageable', 'reference_type', 'reference_id');
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

    public function getTextDatePublishAttribute(): string
    {
        return Carbon::createFromTimeString($this->created_at)->format('H:m d/m/Y');
    }

    protected static function boot()
    {
        parent::boot();

    }
}
