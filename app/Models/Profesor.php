<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesor extends Model
{
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
    public function colegio()
{
    return $this->belongsTo(Colegio::class);
}
}
