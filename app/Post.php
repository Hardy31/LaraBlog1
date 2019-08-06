<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;  //slug


class  Post extends Model
{



    Public function category()
    {
        return $this->hasOne(Category::class);
    }

    Public function author()
    {
        return $this->hasOne(User::class);
    }

    Public function tags ()
       {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag-id'
            );
    }

    public function sluggable()
    {
        return Str::slug();
    }
}
