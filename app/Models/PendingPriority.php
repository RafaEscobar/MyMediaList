<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PendingPriority extends Model
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

    public function saga()
    {
        return $this->hasMany(Saga::class);
    }
}
