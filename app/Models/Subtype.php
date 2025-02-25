<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtype extends Model
{
    protected $fillable = [
        "subtype",
        "created_at"
    ];

    public function category()
    {
        return $this->hasMany(Category::class);
    }
}
