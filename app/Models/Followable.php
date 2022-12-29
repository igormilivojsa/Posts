<?php

namespace App\Models;

trait Followable
{

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id');
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    }

    public function follow(User $user)
    {
        $this->follows()->attach($user);
    }

    public function unfollow(User $user)
    {
        $this->follows()->detach($user);
    }


    public function isFollowing()
    {
        return $this->followers()->where('following_user_id', $this->id)->count();
    }


}