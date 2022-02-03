<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('subjects')->get();
        return view('student.index', compact('students'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $subjects = Subject::all();
        return view ('student.create' , compact('subjects'));
        
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'studentname'=>'required',
            'rollno' => 'required|unique:students',
            'department' => 'required'
        ]);
        $data['slug'] = Str::slug($request->studentname);
       
       
        $student = Student::create($data);
        foreach($request->subject as $item=>$value){
            DB::table('student_subjects')->insert([
                'student_id'=> $student->id,
                'subject_id' => $value
            ]);     
        }
        
        return redirect()->route('students.create')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        
        $subjects = Subject::all();
        $student_subjects = $student->subjects->pluck('id')->toArray();
        return view ('student.edit' ,compact('subjects','student_subjects'));

        
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        // $request->validate([
        //     'studentname'=>'required',
        //     'rollno' => 'required|unique:students',
        //     'department' => 'required'
        //     ]);
       
            
        // $data=Student::create([
        //     'studentname' => $request->studentname,
        //     'rollno' => $request->rollno,
        //     'department' => $request->department
        // ]);
        // foreach($request->subject as $item=>$value){
        //     DB::table('student_subjects')->update([
        //         'student_id'=> $data->id,
        //         'subject_id' => $value
        //     ]);     
        // }
        // return redirect()->route('students.create')->with('success','Post created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->route('students.index')->with('success', 'A Student has been deleted');
    
    }
}
