<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];
    public function students(){
        return $this->belongsToMany(Student::class,'attendance');
                    
    }
}
