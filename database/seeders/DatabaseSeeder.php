<?php

namespace Database\Seeders;

use App\Models\Clazz;
use Database\Factories\ClazzFactory;
use Illuminate\Database\Seeder;
use Database\Seeders\studentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(subjectSeeder::class);
        $this->call([
           SeedData::class,  
            subjectSeeder::class,
            studentSeeder::class,
            UserSeeder::class,
        ]);  
        
         
    }
}
