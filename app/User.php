<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class  User extends Authenticatable
{
    use Notifiable;

    const IS_USER = 0;
    const IS_ADMIN = 1;

    const IS_BANNED = 0;
    const IS_ACTIVE = 1;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    Public function posts()
    {
        return $this->hasMany(Post::class);
    }

    Public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static();
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();
        return $user;
    }

    public function edit($fields)
    {

        $this->fill($fields);
        $this->password = bcrypt($fields['password']);
        $this->save();

    }

    public function remuv()
    {
        Storage::delete('uploads/'.$this->image);
        $this->delite();
    }



    public function uploadAvatar($image )
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
        if ($this->image != null) {return '/img/no-avatar';}
        return '/uploads/'. $this->image;
    }

    public function makeAdmin()
    {
        $this->is_admin = User::IS_ADMIN;
        $this->save();
     }
    public function makeNormal()
    {
        $this->is_admin = User::IS_USER;
        $this->save();
    }

//пеоекдючатель
    public function toggleAdmin($var)
    {
        if ($var == null) {
            return $this->makeNormal();
        }

        return $this->makeAdmin();

    }



    public function ban()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }
    public function unban()
    {
        $this->status = User::IS_ACTIVE;
        $this->save();
    }

//пеоекдючатель
    public function toggleBan ($var)
    {
        if ($var == null) {
            return $this->unban();
        }

        return $this->ban();

    }




}
