<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medium extends Model
{
    protected $table = "entertainment";
    protected $fillable = [
        'title',
        'score',
        'comment',
        'category_id',
        'status_id',
        'user_id',
        'priority_id',
    ];

    public function users()
    {
        return $this->morphMany('App\Modesl\User', 'mediable');
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
