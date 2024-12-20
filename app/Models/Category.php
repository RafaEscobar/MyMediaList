<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function medias()
    {
        return $this->hasMany(Medium::class);
    }

    public function sagas()
    {
        return $this->hasMany(Saga::class);
    }
}
