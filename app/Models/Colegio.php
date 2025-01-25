<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }

    public function profesors()
    {
        return $this->hasMany(Profesor::class);
    }
    public function director()
    {
        return $this->belongsTo(Director::class);
    }
}
