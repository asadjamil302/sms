<?php

namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Model;
use App\Models\attendance;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\Subject;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        // $students = Student::whereHas(
        //     'attendance', function($q){
        //         // $q->latest('date');
        //     }
        // )->get();

        $students = DB::table('students')
            ->leftjoin('attendances', 'attendances.student_id', '=', 'students.id')
            ->select('attendances.id', 'attendances.student_id', 'attendances.attendance', 'students.id', 'students.studentname' )
            ->groupBy('attendances.id', 'attendances.student_id', 'attendances.attendance', 'students.id', 'students.studentname')
            ->where('attendances.student_id', null)
            ->get();

            dd($students);

        return view('student.attendance', compact('students'));
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
        //
        $data = $request->validate([
            'studentname' => 'required',
            'rollno' => 'required',
            'date'=>'required',
            'attendance' => 'required',
        ]);    
        // $today = Carbon::today();

        $attendance = attendance::create($data);
        // $attendance	  = new attendance();
        // $attendance->studentname  = $request->studentname;
        // $attendance->rollno  = $request->rollno;
        // $attendance->attendance  = $request->attendance;
        // $attendance->save();

        // dd($request);

       

      
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(attendance $attendance)
    {
        //
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

        $attendance = attendance::updateOrCreate([

            'student_id'  => $request->id,
            'date' => Carbon::now()->toDateString(),
        ],
        [
            'attendance' => $request->attendance,
        ]);
        return response('data[]');
    }
    public function absent(Request $request)
    {
        
        $attendance = attendance::updateOrCreate(
            [
            
                'student_id'  => $request->id,
                'date' => Carbon::now()->toDateString(),        
            ],
            [
                'attendance' => $request->attendance,
            ]
        );
        return response('done');
        
    }
}
