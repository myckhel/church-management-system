<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Member;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $members = \App\Member::all();
        $date = $request->date;
        return view('attendance.mark', compact('members', 'date'));
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

        $this->validate($request, [
            'branch_id' => 'required|string|min:0',
            'male' => 'required|numeric|min:0',
            'female' => 'required|numeric|min:0',
            'children' => 'required|numeric|min:0',
            'date' => 'required|date ',

        ]);

        // check if attendnace has already been marked for that date
        $attendance = Attendance::where('attendance_date', date('Y-m-d',strtotime($request->get('date'))) )->get(['id'])->count();
        if ($attendance > 0){
            return redirect()->route('attendance')->with('status', "**Attendance for {$this->get_date_in_words($request->get('date'))} has been saved for  before!");
        }



        // register attendance
        $attendance = new Attendance(array(
            'branch_id' => $request->get('branch_id'),
            'male' => $request->get('male'),
            'female' => $request->get('female'),
            'children' => $request->get('children'),

            // convert date to acceptable mysql format
            'attendance_date' => date('Y-m-d',strtotime($request->get('date'))),
        ));
        $attendance->save();

        return redirect()->route('attendance')->with('status', 'Attendance successfully saved');
    }
    private function get_date_in_words($date)
    {
        $split_date_array = explode("-",$date);
        return Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->format('l, jS \\of F Y');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance, Request $request)
    {
        $attendance = Attendance::where('attendance_date', date('Y-m-d',strtotime($request->get('date'))) )->first();
        if ($attendance)
        {
            $addedVariables = ['formatted_date'=>$request->get('date'), 'date_in_words'=>"{$this->get_date_in_words($attendance->attendance_date)}",'request_date'=>$request->date];
            return view('attendance.view', compact('attendance','addedVariables' ) );
        }
        else
        {
            return redirect()->route('attendance.view.form')->with('status',"No attendance for {$this->get_date_in_words($request->get('date'))}");
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}