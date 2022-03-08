<?php

namespace App\Http\Controllers;
use App\Models\Clazz;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $teacher = Teacher::all();
        return view('teacher.index',compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clazz = Clazz::all();
        
        return view('teacher.create', compact('clazz'));
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
            'teacher_name'=>'required',
            'email' => 'required|unique:teachers',
            'cnic' => 'required',
            'phone_no'=>'required',
            'salary' => 'required',
           
            'designation'=> 'required'

        ]);
        
        
        $teacher = new Teacher();
    
        $teacher->teacher_name =$request->input('teacher_name');
        $teacher['slug'] = Str::slug($request->teacher_name);
        
        if($request->hasfile('image'))
           {
               $file = $request->file('image');
               $extension =$file->getClientOriginalExtension();
               $filename= time().'.'.$extension;
               $file->move('image/teachers/', $filename);
               $teacher->image = $filename;
           }
         else{
            // return asset('image/default.png');
            $teacher->image = ('default.png');
         }
        $teacher->email =$request->input('email');
        $teacher->cnic =$request->input('cnic');
        $teacher->phone_no =$request->input('phone_no');
        $teacher->salary =$request->input('salary');
        $teacher->designation =$request->input('designation');
           $teacher->save();
           return redirect()->back()->with('success','teacher added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(teacher $teacher)
    {
        //
       // $teacher = Teacher::find($teacher);
        return view('teacher.edit',compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, teacher $teacher)
    {
        //
        
        $input = $request->validate([
            'teacher_name'=>'required',
            'email' => 'required',
            'cnic' => 'required',
            'phone_no'=>'required',
            'salary' => 'required',
            'designation'=> 'required',
             'image' => 'required'
        ]);
      
        

        $teacher->teacher_name =$request->input('teacher_name');
        $teacher['slug'] = Str::slug($request->teacher_name);
        if($request->hasfile('image'));
        {
            $destination = 'image/teachers/'.$teacher->image;
             if(File::exists($destination))
             {
                 File::delete($destination);
             }
            $file = $request->file('image');
            $extension =$file->getClientOriginalExtension();
            $filename= time().'.'.$extension;
            $file->move('image/teachers/', $filename);
            $teacher->image = $filename;


        }
          
        $teacher->email =$request->input('email');
        $teacher->cnic =$request->input('cnic');
        $teacher->phone_no =$request->input('phone_no');
        $teacher->salary =$request->input('salary');
        $teacher->designation =$request->input('designation');
           $teacher->update();
        //    dd($teacher);
           return back()->with('success', 'record has been updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(teacher $teacher)
    {
        
        // $teacher = Teacher::find($teacher);
        $destination= 'image/teachers'.$teacher->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $teacher->delete();
        return redirect()->route('teacher.index')->with('success', 'record has been deleted');
    }
        
}
