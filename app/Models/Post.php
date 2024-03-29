<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

use App\Models\Hashtag;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'user_id',
        'title',
    ];

    public function likedBy(User $user)
    {
        return $this->likes->contains('user_id', $user->id);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }


    public function hashtags()
    {
        return $this->belongsToMany(Hashtag::class);
    }
}
