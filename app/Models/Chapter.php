<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    public function saga()
    {
        return $this->belongsTo(Saga::class);
    }
}
