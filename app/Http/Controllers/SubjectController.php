<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

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
        $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required|unique:subjects',
        ]);

        subject::create([
                            'subject_name' => $request->subject_name,
                            // 'slug' ＝＞$slug 
                            'subject_code' => $request->subject_code,
                        ]);


        // subject::create($request->all());

        return redirect()->route('subjects.create')->with('success','Post created successfully.');
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
    public function edit($id)
    {
        //
        $subjects = Subject::findOrFail($id);
    
        // dd($subjects);
        return view('subject.edit', compact('subjects'));
      

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $data= $request->validate([
            'subject_name' => 'required',
            'subject_code' => 'required|unique:subjects',
        ]);
        Subject::whereId($id)->update($data);

        return redirect()->route('subjects/')->with('success','Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subjects = Subject::findOrFail($id);
        $subjects->delete();
        return redirect()->route('subjects.create')->with('success','Post deleted successfully.');
    }
}
