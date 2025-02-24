<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostViewPriority extends Model
{
    protected $fillable = [
        "id",
        "priority",
        "description"
    ];

    public function medium()
    {
        return $this->hasMany(Medium::class);
    }
}
