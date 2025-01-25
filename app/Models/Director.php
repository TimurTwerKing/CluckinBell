<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    public function colegio()
    {
        return $this->belongsTo(Director::class);
    }
}
