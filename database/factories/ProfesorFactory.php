<?php

namespace Database\Factories;

use App\Models\Profesor;
use App\Models\Colegio;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfesorFactory extends Factory
{
    protected $model = Profesor::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'especialidad' => $this->faker->randomElement(['Matemáticas', 'Ciencias', 'Historia', 'Lengua']),
            'colegio_id' => Colegio::inRandomOrder()->first()->id ?? Colegio::factory(),
        ];
    }
}
