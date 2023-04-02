<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'fullname',
        'phone_number',
        'email',
        'password',
        'role_id',
        'is_super_admin',
        'status',
        'create_by',
        'update_by'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }

    public function createBy(): BelongsTo
    {
        return $this->belongsTo(self::class, 'create_by');
    }

    public function updateBy(): BelongsTo
    {
        return $this->belongsTo(self::class, 'update_by');
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function getIsActiveTextAttribute(): string
    {
        if($this->status == NULL) return '<span class="label label-primary">Công khai</span>';
        return match ((int)$this->status) {
            1 => '<span class="label label-primary">Hoạt động</span>',
            0 => '<span class="label label-danger">Tạm khóa</span>',
        };
    }
}
