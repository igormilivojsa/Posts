<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;

trait Likeable
{
    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function like($user = null, $liked = true)
    {
        if ($this->isLikedBy($user)) {
            $this->likes()->where('user_id', $user ? $user->id : auth()->id())->first()->delete();

            return;
        }

        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ], [
                'liked' => $liked,
            ]
        );
    }

    public function dislike($user = null)
    {
        if ($this->isDislikedBy($user)) {
            $this->likes()->where('user_id', $user ? $user->id : auth()->id())->first()->delete();

            return;
        }

        return $this->like($user, false);
    }

    public function isLikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', true)
            ->count();
    }

    public function isDislikedBy(User $user)
    {
        return (bool) $user->likes
            ->where('post_id', $this->id)
            ->where('liked', false)
            ->count();
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
}