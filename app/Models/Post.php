<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function scopePostFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
        $query
            ->where('body', 'like', '%' . $search . '%'));
    }

    public function setFileAttribute($value)
    {
        $this->attributes['file'] = Storage::disk('public')->put('images', $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }


    public function scopeWithLikes(Builder $query)
    {
        $query->leftJoinSub(
            'select post_id, sum(liked) likes, sum(!liked) dislikes from likes group by post_id',
            'likes',
            'likes.post_id',
            'posts.id'
        );
    }


    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, $liked = true)
    {
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
                'liked' => $liked,
            ]
        );
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes->where('post_id', $this->id)->where('liked', true)->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes->where('post_id', $this->id)->where('liked', false)->count();
    }

    public function dislike($user = null)
    {
        return $this->like($user, false);
    }
}
