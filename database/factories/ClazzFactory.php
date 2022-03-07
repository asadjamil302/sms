<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Clazz;

class ClazzFactory extends Factory
{
    protected $model = Clazz::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
   
    
    public function definition()
    {
        $clazz = new Clazz();
        $clazz_grade = $this->faker->randomElement(['1','2','3','4','5','6','7','8','9','10']);
        $clazz_section = $this->faker->randomElement(['A','B','C']);
        $clazz_name = $clazz_grade.' '.$clazz_section;
        return [
            //
            'clazz_grade' => $clazz_grade,
                'slug' =>  $clazz_name,
                'clazz_section' => $clazz_section,
                'clazz_name' => $clazz_name,
        ];

    }
}
