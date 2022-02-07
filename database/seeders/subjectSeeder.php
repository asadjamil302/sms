<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class subjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(DB::table('subjects')->count() == 0){
       
            DB::table('subjects')->insert([
                [
                'subject_name' => Str::random(10),
                'slug' => Str::random(10),
                'subject_code' => Str::random(1),
                ],

                [
                    'subject_name' => Str::random(10),
                    'slug' => Str::random(10),
                    'subject_code' => Str::random(1),
                ],
                [
                    'subject_name' => Str::random(10),
                    'slug' => Str::random(10),
                    'subject_code' => Str::random(1),
                ],
                [
                    'subject_name' => Str::random(10),
                    'slug' => Str::random(10),
                    'subject_code' => Str::random(1),
                ],
                [
                    'subject_name' => Str::random(10),
                    'slug' => Str::random(10),
                    'subject_code' => Str::random(1),
                ],
                [
                    'subject_name' => Str::random(10),
                    'slug' => Str::random(10),
                    'subject_code' => Str::random(1),
                ],
                [
                    'subject_name' => Str::random(10),
                    'slug' => Str::random(10),
                    'subject_code' => Str::random(1),
                ],
                [
                    'subject_name' => Str::random(10),
                    'slug' => Str::random(10),
                    'subject_code' => Str::random(1),
                ],
                [
                    'subject_name' => Str::random(10),
                    'slug' => Str::random(10),
                    'subject_code' => Str::random(1),
                ]
                ]);

}
    else { echo "\e[31mTable is not empty, therefore NOT "; }
        // foreach ($subjects as $key => $subject) {
        //     # code...

            
        // }




        
    }
}
