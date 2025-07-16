<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = ['category'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories');
    }

    public function Contents()
    {
        return $this->hasMany(Content::class);
    }

}
