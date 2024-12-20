<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    public function media()
    {
        return $this->hasMany(Medium::class);
    }

    public function sagas()
    {
        return $this->hasMany(Saga::class);
    }
}
