<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LanguageMeta extends Model
{
    use HasFactory;

    protected $table = 'language_metas';

    protected $fillable = [
        'reference_id',
        'reference_type',
        'language_meta_origin',
        'language_code',
    ];

    public function languageable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'reference_type', 'reference_id');
    }
}
