<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Seeder;

class PlantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plant::factory(3)->create();
    }
}
