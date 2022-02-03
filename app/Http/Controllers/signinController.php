<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use App\Models\Signup;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
class signinController extends Controller
{
    //
    public function create()
    {
        //
        return view('signin.create');
        
    }
    public function store(Request $request)
    {
        //

        
        $request->validate([
            'username'=>'required',
            'password' => 'required'
            ]);
       
            $userinfo = Signup::where('username','=', $request->username)->first();
   
            if(!$userinfo){
                return back()->fail('fail','we did not recognize your username');
            }
            else{
                    if(Hash::check($request->password, $userinfo->password)){
                       $request->session()->put('LoggedUser');
                       
                    }
            }
            return redirect()->route('students.create')->with('status','you are logged successfully');
            
        }
}
