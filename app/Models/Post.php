<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function setFileAttribute($value)
    {
        $this->attributes['file'] = Storage::disk('public')->put('images', $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
