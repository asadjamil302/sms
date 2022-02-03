<?php

namespace App\Models;
use App\Models\Subject;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    // protected $table ='students';
    protected $guarded = [
        
                'id'
    ];
    public function subjects(){
        return $this->belongsToMany(Subject::class,'student_subjects');
                    
    }
}
