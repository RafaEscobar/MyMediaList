<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{

    protected $fillable = [
        'name',
        'score',
        'comment',
        'content_id',
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
