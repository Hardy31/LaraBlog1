<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    Public function post()
    {
        return $this->hasOne(Post::class);
    }

    Public function author()
    {
        return $this->hasOne(User::class);
    }
}
