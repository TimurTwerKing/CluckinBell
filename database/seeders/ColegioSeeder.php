<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Colegio;

class ColegioSeeder extends Seeder
{

    public function run()
    {
        Colegio::factory()->count(3)->create();
    }
}
