<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'address',
        'content',
        'status'
    ];

    public function contactReplies(): HasMany
    {
        return $this->hasMany(ContactReply::class);
    }

}
