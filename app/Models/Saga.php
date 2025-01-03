<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Saga extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'title',
        'num_caps',
        'season',
        'final_comment',
        'category_id',
        'status_id',
        'priority_id',
        'user_id'
    ];

    public function favorites()
    {
        return $this->morphMany('App\Modesl\Favorite', 'mediable');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
