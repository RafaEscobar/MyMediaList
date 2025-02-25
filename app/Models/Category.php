<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;

    public function medias()
    {
        return $this->hasMany(Medium::class);
    }

    public function sagas()
    {
        return $this->hasMany(Saga::class);
    }

    public function subtype()
    {
        return $this->belongsTo(Subtype::class);
    }
}
