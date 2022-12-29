<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable, SoftDeletes;

    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = Storage::disk('public')->put('avatars', $value);
    }

    public function scopeUserFilter($query, array $filters)
    {
        $query->when($filters['user-search'] ?? false, fn($query, $user_search) =>
        $query
            ->where('name', 'like', '%' . $user_search . '%'));
    }
}
