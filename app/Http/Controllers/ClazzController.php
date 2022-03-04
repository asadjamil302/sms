<?php

namespace App\Http\Controllers;
use App\Models\Subject;
use App\Models\Clazz;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ClazzController extends Controller
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
        $clazz = Clazz::all();
        return view('clazz.index', compact('clazz'));
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
        return view ('clazz.create' , compact('subjects'));
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
            'clazz_grade' => 'required',
            'clazz_section' => 'required',
        ]);
        
        

        $data['slug'] = Str::slug($request->clazz_grade);
        $data['clazz_name'] = ($request->clazz_grade.$request->clazz_section);
    
        
        $clazz = clazz::create($data);

        foreach($request->subject as $value){
            DB::table('clazz_subjects')->insert([
                'clazz_id'=> $clazz->id,
                'subject_id' => $value
            ]);      
            
        }

        return redirect()->route('clazz.create')->with('success','Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Clazz  $clazz
     * @return \Illuminate\Http\Response
     */
    public function show(Clazz $clazz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Clazz  $clazz
     * @return \Illuminate\Http\Response
     */
    public function edit(Clazz $clazz)
    {
        //
        $subjects = Subject::all();       
        $clazz_subjects = $clazz->subjects->pluck('id')->toArray();

        return view ('clazz.edit' ,compact('clazz','subjects','clazz_subjects'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Clazz  $clazz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clazz $clazz)
    {
        //
        $clazz->clazz_grade = $request->clazz_grade;
        $clazz->clazz_section = $request->clazz_section;
        $clazz->save();
        $clazz->subjects()->detach();
        foreach($request->subject as $value){
            DB::table('clazz_subjects')->insert([
                'clazz_id'=> $clazz->id,
                'subject_id' => $value
            ]);
        }
        return redirect()->route('clazz.index')->with('success', 'record has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clazz  $clazz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clazz $clazz)
    {
        //
        $clazz->delete();
        return redirect()->route('clazz.index')->with('success', 'record has been deleted');
    }
}
