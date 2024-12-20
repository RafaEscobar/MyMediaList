<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Saga extends Model
{
    public function users()
    {
        return $this->morphMany('App\Modesl\User', 'mediable');
    }
}
