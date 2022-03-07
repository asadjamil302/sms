<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Carbon\Factory;
use App\Models\Student;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
        
   
        // $faker = Faker\Factory::create();
        // $faker = new Factory();
        // $date = $this->faker->unique()->dateBetween('now', '+15 days');
        
        
        $year = rand(2009, 2016);
        $month = rand(1, 12);
        $day = rand(1, 28);
        $date = Carbon::create($year,$month ,$day);

        $name = Str::random(10);
        DB::table('students')->insert([
            'student_name' => $name,
            'slug' => Str::slug($name),
            'rollno' => Str::random(10),
            'dob' => $date,
            'admission_date' => $date,
            'clazz_name' => Str::random(10),
            'student_address' => Str::random(10),
            'parent_name' => Str::random(10),
            'parent_cnic' => Str::random(10),
            'parent_contact' => Str::random(10),
            'emergency_contact' => Str::random(10),
            'student_image' => Str::random(10),

        ]);
        
    }
}
