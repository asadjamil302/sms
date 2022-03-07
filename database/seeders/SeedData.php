<?php

namespace Database\Seeders;

use App\Models\Clazz;
use Illuminate\Database\Seeder;

class SeedData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Clazz::factory()->count(50)->create();
    }
}
