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
                'nombre' => 'Timur Bogach',
                'telefono' => '658440125',
                'edad' => 34,
                'password' => bcrypt('123'),
                'email' => 'Timurnator_hotmail.com',
                'sexo' => 'M'
            ],
            [
                'nombre' => 'Sofia Hernández',
                'telefono' => '645382019',
                'edad' => 22,
                'password' => bcrypt('abc123'),
                'email' => 'sofia.hernandez@email.com',
                'sexo' => 'F'
            ],
            [
                'nombre' => 'Carlos López',
                'telefono' => '612345678',
                'edad' => 29,
                'password' => bcrypt('secreta123'),
                'email' => 'carlos.lopez@email.com',
                'sexo' => 'M'
            ],
            [
                'nombre' => 'Marta Pérez',
                'telefono' => '661234567',
                'edad' => 25,
                'password' => bcrypt('contraseña123'),
                'email' => 'marta.perez@email.com',
                'sexo' => 'F'
            ],
            [
                'nombre' => 'Juan Gómez',
                'telefono' => '630987654',
                'edad' => 27,
                'password' => bcrypt('12345678'),
                'email' => 'juan.gomez@email.com',
                'sexo' => 'M'
            ],
            [
                'nombre' => 'Lucía Fernández',
                'telefono' => '657856738',
                'edad' => 21,
                'password' => bcrypt('luz12345'),
                'email' => 'lucia.fernandez@email.com',
                'sexo' => 'F'
            ],
            [
                'nombre' => 'Alejandro Martín',
                'telefono' => '669876543',
                'edad' => 30,
                'password' => bcrypt('alexmartin123'),
                'email' => 'alejandro.martin@email.com',
                'sexo' => 'M'
            ],
            [
                'nombre' => 'Isabel Sánchez',
                'telefono' => '656473829',
                'edad' => 24,
                'password' => bcrypt('isabel1234'),
                'email' => 'isabel.sanchez@email.com',
                'sexo' => 'F'
            ],
            [
                'nombre' => 'José Torres',
                'telefono' => '666778899',
                'edad' => 33,
                'password' => bcrypt('jose2024'),
                'email' => 'jose.torres@email.com',
                'sexo' => 'M'
            ],
            [
                'nombre' => 'Laura García',
                'telefono' => '678909876',
                'edad' => 28,
                'password' => bcrypt('laura@123'),
                'email' => 'laura.garcia@email.com',
                'sexo' => 'F'
            ],
        ]);
    }
}

