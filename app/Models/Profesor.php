<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    public function colegios(){
        return $this->belongsToMany(Colegio::class);
    }
    public function alumnos(){
        return $this->belongsToMany(Alumno::class);
    }
}
