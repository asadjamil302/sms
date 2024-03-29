<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Mockery\Matcher\Subset;

class SubjectController extends Controller
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
        //
       
        $subjects = Subject::all(); 
        return view('subject.index',compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('subject.create');
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
            'subject_name' => 'required',
            'subject_code' => 'required|unique:subjects',
        ]);
        
        // $previous = Subject::where('slug',Str::slug($request->subject_name))->exists();
       
        // dd($previous);

        $data['slug'] = Str::slug($request->subject_name);
       
        $subject = Subject::create($data);
        // dd($subject);

        // if($previous) {
        //     $subject->slug = Str::slug($request->subject_name);
        // } else {
        //     $subject->slug = Str::slug($request->subject_name).'-'.$subject->id;
        // }

        // dd($request);

       

        return back()->with('success','record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
        
        // $subjects = Subject::all();
        return view('subject.edit', compact('subject'));
           

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
        $data = $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required|unique:subjects,subject_code',
        ]);

       
       
        // $data['slug'] = Str::slug($request->subject_name);
       
        $data = $request->all();
        $subject->update($data);
        // $subjects = Subject::create($data);
        return back()->with('success','record updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();
        return redirect()->route('subject.index')->with('success', 'record has been deleted');
    }
    

}
