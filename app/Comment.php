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



    public function allow()
    {
        $this->status = 1;
        $this->save();
    }
    public function disAllow()
    {
        $this->status = 0;
        $this->save();
    }


    //пеоекдючатель
    public function toggleStatus()
    {
        if ( $this->status = 0)
        {
            return $this->allow();
        }

        return $this->disAllow();

    }


    public function remove()
    {

        $this->delete();
    }
}
