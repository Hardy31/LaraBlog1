<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
//use Cveebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;  //slug


class  Post extends Model
{
    //use Sluggable;

    const IS_DRAFY = 0;
    const IS_PUBLIS = 1;

    protected $fields = ['title', 'content'];

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

    public static function add($fields)
    {
        $post = new static;
        $post->fill = $fields;
        $post->user_id = 1;
        $post->save();
        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();

    }

    public function remove()
    {
        Storage::delete('uploads/'.$this->image);
        $this->delete();
    }


     public function uploadImage($image )
    {
       if ($image == null) {return; }
        Storage::delete('uploads/'.$this->image);
        $filename = str_random(10).'.'.$image->extension();
        $image->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();

    }

    public function getImage()
    {
        if ($this->image != null) {return '/img/no-image';}
        return '/uploads/'. $this->image;
    }


    public function setCategory($id)
    {
        if($id == null) {return;}
        $this->category_id = $id;
        $this->save();

    }

    public function setTags ($ids)
    {
        if ($ids == null) {return; }
        $this->tags()->syns($ids);

    }

    public function setDraft()
    {
        $this->status = Post::IS_DRAFY;
        $this->save();
    }
    public function setPublic()
    {
        $this->status = Post::IS_PUBLIS;
        $this->save();
    }

    // пеоекдючатель
    public function toggleStatus($var)
    {
        if ($var ==null)
        {
            return $this->setDraft();
        }

            return $this->setPublic();

    }


    public function setFeatured()
    {
        $this->is_feature = 1;
        $this->save();
    }
    public function setStandart()
    {
        $this->is_feature = 0;
        $this->save();
    }


    //пеоекдючатель
    public function toggleFeature($var)
    {
        if ($var ==null)
        {
            return $this->setStandart();
        }

        return $this->setFeatured();

    }

}
