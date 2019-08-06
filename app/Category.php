<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    Public function posts()
    {
        return $this->  hasMany(Category::class);
    }
}
