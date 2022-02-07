<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
            'studentname' => Str::random(10),
            'rollno' => Str::random(10),
            'department' => Str::random(10),
            
           
        ]);
    }
}
