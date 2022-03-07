<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $students = Student::count();
        $subjects = Subject::count();
        $teacher = Teacher::count();
        $clazz = Clazz::count();
        return view('dashboard.index' , compact('students' , 'subjects', 'teacher','clazz'));
    }
}
