<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        //
        $users = User::all();
        // dd($users); 
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
        $roles = Role::pluck('name')->all();
        return view('user.create', compact('roles'));
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
            'user_image' => '|image|mimes:jpeg,png,jpg,gif,svg',
            'roles' => 'required',
            
            ]);

            $input['slug'] = Str::slug($request->user_name);
           $input['password'] = Hash::make($request->password);
  //for image crud
            if ($image = $request->file('user_image')) {
                $destinationPath = 'image/';
                $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $profileImage);
                $input['user_image'] = "$profileImage";
                
            }
            else{
        
                $input['user_image']= 'default.png';

            }
           $user = User::create($input);
            $user->assignRole($request->input('roles'));   
            
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
        $roles = Role::pluck('name')->all();
        $userRole = $user->roles->pluck('name')->first();
        return view('user.edit', compact('user','roles','userRole'));
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
            'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'roles' => 'required',
            ]);  
//image crud
            $input = $request->all();
  
        if ($image = $request->file('user_image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['user_image'] = "$profileImage";
        }else{
            $input['user_image']= 'default.png';
           
        }
          
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$user)->delete();
    
        $user->assignRole($request->input('roles'));
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
