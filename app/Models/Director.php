<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    public function colegios(){
        return $this->belongsTo(Director::class);
    }
}
