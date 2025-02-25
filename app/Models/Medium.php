<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Medium extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = "entertainment";
    protected $casts = [
        "score" => "double"
    ];

    protected $fillable = [
        'title',
        'score',
        'comment',
        'category_id',
        'status_id',
        'user_id',
        'post_view_priority_id',
        'pending_priority_id'
    ];

    public function favoriteBy()
    {
        return $this->morphToMany(User::class, 'favorites');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subtype()
    {
        return $this->belongsTo(Subtype::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function PendingPriority()
    {
        return $this->belongsTo(PendingPriority::class);
    }

    public function postViewPriority()
    {
        return $this->belongsTo(PostViewPriority::class);
    }
}
