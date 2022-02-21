<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class UserController extends Controller
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
        $users = User::all(); 
        return view('user.index', compact('users'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.create');
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
        $input = $request->validate([
            'user_name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);

            $input['slug'] = Str::slug($request->user_name);

  //for image crud
            if ($image = $request->file('user_image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['user_image'] = "$profileImage";
            }
            User::create($input);
            
        return back()->with('success','record created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            'user_name' => 'required',
            'email' => 'required',
            'password' => 'required',
            //for updation i add image in this crud
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            ]);  
//image crud
            $input = $request->all();
  
        if ($image = $request->file('user_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['user_image'] = "$profileImage";
        }else{
            unset($input['user_image']);
           
            // return set($input["{{asset('assets/media/avatars/avatar15.jpg')}}"]);
        }
          
        $user->update($input);
        return redirect()->back()->with('success', 'record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('user.index')->with('success', 'record has been deleted');
    }
}
