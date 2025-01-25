<?php

namespace Database\Factories;

use App\Models\Director;
use App\Models\Colegio;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorFactory extends Factory
{
    protected $model = Director::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->name(),
            'colegio_id' => Colegio::inRandomOrder()->first()->id ?? Colegio::factory(),
        ];
    }
}
