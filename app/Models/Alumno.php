<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }
    public function colegio(){
        return $this->belongsTo(Colegio::class);
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
