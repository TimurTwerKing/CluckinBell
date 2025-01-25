<?php

namespace Database\Factories;

use App\Models\Alumno;
use App\Models\Profesor;
use App\Models\Colegio;
use Illuminate\Database\Eloquent\Factories\Factory;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'edad' => $this->faker->numberBetween(6, 18),
            'profesor_id' => Profesor::inRandomOrder()->first()->id ?? Profesor::factory(),
            'colegio_id' => Colegio::inRandomOrder()->first()->id ?? Colegio::factory(),
        ];
    }
}
