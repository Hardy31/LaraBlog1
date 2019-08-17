<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable = ['title'];

    Public function posts()
    {
        return $this->belongsToMany(
            Post::class,
            'post_tags',
            'tag_id',
            'past_id'
        );
    }
    public static function add($fields)
    {


        $tag = new Tag();
        $tag->title = $fields['title'];
        $tag->slug = str_slug($fields['title'], '-');

        $tag->save();
        return $tag;
    }

}
