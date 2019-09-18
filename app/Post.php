<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
//use Cveebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Str;  //slug
use Carbon\Carbon;
use App\Tag;
use App\User;
use App\Category;




class  Post extends Model
{
    //use Sluggable;

    const IS_DRAFY = 0;
    const IS_PUBLIS = 1;

    protected $fillable = ['title', 'content', 'date' , 'category_id', 'user_id' ];

    //protected  $fillable = ['_token'];
    //protected $hidden = ['remember_token' ];


    Public function category()
    {
        return $this->belongsTo(Category::class);
    }
    Public function comments()
    {
        return $this->hasMany(Comment::class);
    }


    Public function getCategoryTitle()
    {

        if($this->category != null){
            return $this->category->title;
        }
        return "Нет категорий";

    }

    Public function user()
    {
        return $this->belongsTo(User::class);
    }

    Public function getUserName()
    {

        if($this->user != null){
            return $this->user->name;
        }
        return "Нет автора";

    }

    Public function tags ()
       {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
            );
    }

    Public function getTagsTitle()
    {
        //dd($this->tags);
        //dd($this->tags->pluck('title'));
        //dd(implode(',', $this->tags->pluck('title')->all()));
        if($this->tags->pluck('title')->all() != null){
            return implode(',', $this->tags->pluck('title')->all());
        }
        return "Нет Тегов";
    }

    public function sluggable()
    {
        return Str::slug();
    }

    public static function add($fields)
    {
        $post = new static();
        $post->fill($fields);
        $post->user_id = 1;
        $post->slug = str_slug($fields['title'], '-');

        $post->save();
        return $post;
    }

    public function edit($fields)
    {

        //dd($this->image, $this->fill($fields));
        $this->fill($fields);
       // $post->slug = str_slug($fields['title'], '-');
        $this->save();

    }

    public function remuv()
    {
        $this->removeImage();
        $this->delete();

    }

    public function uploadImage($image )
    {
        //dd($image);
        if($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10).'.'.$image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();

    }

    public function getImage()
    {

        if ($this->image == null) {return '/public/imag/photo1.png';}
        return '/public/uploads/'. $this->image;
    }

    public function removeImage()
    {
        //dd($this->image);
        if ($this->image != null) {
            Storage::delete('uploads/'.$this->image);
        }
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
        $this->tags()->sync($ids);

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
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = 0;
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

    public function setDateAttribute($value)
    {
        //dd($value);
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        //dd($date);
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        //dd($value);
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        //dd($date);
        return $date;
    }
    public function getDate()
    {
        //dd($value);
        $date = Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
        //dd($date);
        return $date;
    }
    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }
    public function getPrevious()
    {
       $postID = $this->hasPrevious();
       return self::find($postID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }

    public function related()
    {
        return self::all()->except($this->id);

    }

    public function getComments()
    {
        return $this->comments->where('status', 1);
    }


}
