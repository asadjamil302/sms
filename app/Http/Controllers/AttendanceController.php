<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Clazz;
// use App\Models\attendance;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use App\Models\AttendanceHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clazz = Clazz::all();
        $students = Student::with('attendance')->get();
       
        return view('attendance.set_attendance', compact('clazz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = Student::with('attendance')->get();
        return view('attendance.attendance', compact('students'));

      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendance $attendance)
    {
        


        // $users = DB::table('attendance')
        //     ->join('contacts', 'user.id', '=', 'contacts.user_id')
        //     ->join('orders', 'user.id', '=', 'orders.user_id')
        //     ->select('user.*', 'contacts.phone', 'orders.price')
        //     ->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(attendance $attendance)
    {
        //

    }



    public function present(Request $request)
    {
    
        // $today = Carbon::today();
        

        $attendance = Attendance::updateOrCreate([

            'student_id'  => $request->id,
        ],
        [
            'attendance' => '1',
            'date' => Carbon::now()->toDateString(),
        ]);

        AttendanceHistory::updateOrCreate([

            'student_id'  => $request->id,
            'date' => Carbon::now()->toDateString(),

        ],
        [
            'attendance' => '1',
        ]);

        return response('done');
    }
    public function absent(Request $request)
    {
        
  
        $attendance = Attendance::updateOrCreate([

            'student_id'  => $request->id,
        ],
        [
            'attendance' => '0',
            'date' => Carbon::now()->toDateString(),
        ]);
        AttendanceHistory::updateOrCreate([

            'student_id'  => $request->id,
            'date' => Carbon::now()->toDateString(),

        ],
        [
            'attendance' => '0',
        ]);

        return response('done');
        
    }


    // history


    




}
