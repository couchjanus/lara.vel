<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function posts()
    {
        // Получить статьи блога.
        return $this->hasMany('App\Post'); 

    }

}
