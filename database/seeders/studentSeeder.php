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
        $name = Str::random(10);
        DB::table('students')->insert([
            'student_name' => $name,
            'slug' => Str::slug($name),
            'rollno' => Str::random(10),
            'department' => Str::random(10),
            'parent_name' => Str::random(10),
            'parent_email' => Str::random(10),
            'student_image' => Str::random(10),
            
            
           
        ]);
    }
}
