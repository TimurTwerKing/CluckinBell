<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public function profesors(){
        return $this->hasMany(Alumno::class);
    }
    use HasFactory;
    protected $table = 'alumnos';

    protected $hidden = [
        'password',
        "created_at",
        "updated_at"
    ];

    protected $guarded = [
        "id",
        "created_at",
        "updated_at"
    ];
    protected $fillable = [
        'nombre',
        'telefono',
        'edad',
        'password',
        'email',
        'sexo'
    ];
}
