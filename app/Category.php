<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Post;


class Category extends Model
{

    protected $fillable = ['title'];

    Public function posts()
    {
        return $this->  hasMany(Post::class);
    }

    public static function add($fields)
    {


       $category = new Category;
       $category->title = $fields['title'];
       $category->slug = str_slug($fields['title'], '-');
       //dd($category);
       $category->save();
       return $category;
    }



    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
