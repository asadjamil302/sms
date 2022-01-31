<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use Illuminate\Http\Request;

class ClazzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clazz.create');
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
            'class_name' => 'required',
        ]);
        // dd($request);
        clazz::create($request->all());

        return redirect()->route('clazzs.create')->with('success','Post created successfully.');
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
    }
}
