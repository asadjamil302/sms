<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Clazz;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
        
    }

 

    public function student_detail()
    {
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clazz = Clazz::all();
        return view ('student.create', compact('clazz'));
        
      
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
            'student_name'=>'required',
            'rollno' => 'required|unique:students',
            'dob' => 'required',
            'admission_date' => 'required',
            'clazz_name' => 'required',
            'student_address' => 'required',
            'parent_name' => 'required',
            'parent_contact' => 'required',
            'emergency_contact' => 'required',
            'parent_cnic' => 'required',
            'student_image' => '|image|mimes:jpeg,png,jpg,gif,svg',

        ]);


        
        $student    = new student();
        $student->student_name  = $request->student_name;
        $student->slug = Str::slug($request->student_name);
        $student->rollno  = $request->rollno;
        $student->dob  = $request->dob;
        $student->admission_date  = $request->admission_date;
        $student->clazz_name  = $request->clazz_name;
        $student->student_address  = $request->student_address;
        $student->parent_name  = $request->parent_name;
        $student->parent_cnic  = $request->parent_cnic;
        $student->parent_contact  = $request->parent_contact;
        $student->emergency_contact  = $request->emergency_contact;
        if ($image = $request->file('student_image')) {
            $destinationPath = 'image/students/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $student->student_image = "$profileImage";
            
        }
      else{
         // return asset('image/default.png');
         $student->student_image = 'default.png';
      }

        $student->save();
      
        
        return redirect()->back()->with('success','Post created successfully.');   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $subjects = Subject::all();       
        $student_subjects = $student->subjects->pluck('id')->toArray();

        return view ('student.student_detail' ,compact('student','subjects','student_subjects'));
        
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

        return view ('student.edit' ,compact('student','subjects','student_subjects'));

        
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

      

        $student->student_name = $request->student_name;
        $student->rollno = $request->rollno;
        $student->department = $request->department;
        $student->parent_name  = $request->parent_name;
        $student->parent_email  = $request->parent_email;
        if ($image = $request->file('student_image')) {
            $destinationPath = 'image/students/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $student->student_image = "$profileImage";
        }else{
            $student->student_image = 'default.png';
           
        }
      
        $student->save();
        $student->subjects()->detach();
        foreach($request->subject as $value){
            DB::table('student_subjects')->insert([
                'student_id'=> $student->id,
                'subject_id' => $value
            ]);
        }
      //  $student->subject = $request-> subject;
//        $student->subject->id as $value;
        // foreach($request->subject->id as $value){
            
        // $student->subjects()->attach($value);
        
        // }
         return redirect()->route('student.index')->with('success', 'record has been updated'); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        
        
       //$student->subjects()->detach();
       $student->delete();
        return redirect()->route('student.index')->with('success', 'record has been deleted');
        
        
    }
}
