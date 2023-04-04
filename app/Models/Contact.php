<?php

namespace App\Models;

use App\Enums\ContactStatus;
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


    public function getStatusTextAttribute(): string
    {
        return match ($this->status) {
            ContactStatus::Unread => '<span class="label label-warning">Chưa đọc</span>',
            ContactStatus::Read  => '<span class="label label-primary">Đã đọc</span>',
            ContactStatus::Reply  => '<span class="label label-primary">Đã phản hồi</span>',
        };
    }
}
