<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class AlumnoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('alumnos')->insert([
            [
                'nombre' => 'Timur Bogachasdddddddddddddddasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd',
                'telefono' => '658440125',
                'edad' => 34,
                'password' => bcrypt('123'),
                'email' => 'Timurnator_hotmail.com',
                'sexo' => 'M'
            ]
        ]);
    }
}

