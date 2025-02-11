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
        'post_view_priority_id',
        'pending_priority_id',
        'user_id',
        'score'
    ];

    public function favoriteBy()
    {
        return $this->morphToMany(User::class, 'favorites');
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
