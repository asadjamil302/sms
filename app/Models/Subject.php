<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded = [
       'id'
    ];
    public function students(){
        return $this->belongsToMany(Student::class,'student_subjects');
                    
    }
    public function clazz(){
        return $this->belongsToMany(Clazz::class,'student_subjects');
                    
    }

}
