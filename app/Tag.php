<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    Public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'post_tags',
            'tag_id',
            'past_id'
        );
    }
}
