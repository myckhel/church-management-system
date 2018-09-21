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
        $user = \Auth::user();
        //$members = $user->isAdmin() ? \App\Member::all() : \App\Member::where('branch_id', $user->branchcode)->get();
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
        $user = \Auth::user();

        $this->validate($request, [
            'branch_id' => 'required|string|min:0',
            'male' => 'required|numeric|min:0',
            'female' => 'required|numeric|min:0',
            'children' => 'required|numeric|min:0',
            'date' => 'required|date ',

        ]);

        $split_date_array = explode("-",$request->get('date'));
        if (Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->isFuture())
        {
            return redirect()->back()->with('status', "**You can't save attendance for a future date!");
        }

        // check if attendnace has already been marked for that date
        $attendance = Attendance::where('attendance_date', date('Y-m-d',strtotime($request->get('date'))) )->where('branch_id',$user->branchcode )->get(['id'])->count();
        if ($attendance > 0){
            return redirect()->route('attendance')->with('status', "**Attendance for {$this->get_date_in_words($request->get('date'))} has been saved before!");
        }


        // convert date to acceptable mysql format
        $dateToSave = date('Y-m-d',strtotime($request->get('date')));
        // register attendance
        $attendance = new Attendance(array(
            'branch_id' => $user->branchcode,
            'male' => $request->get('male'),
            'female' => $request->get('female'),
            'children' => $request->get('children'),
            'service_type' => $request->get('type'),
            'other' => $request->get('custom_type'),


            'attendance_date' => $dateToSave,
        ));
        $attendance->save();

        return redirect()->route('attendance.view.custom', $dateToSave )->with('status', 'Attendance successfully saved');
    }
    private function get_date_in_words($date)
    {
        $split_date_array = explode("-",$date);
        return Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->format('l, jS \\of F Y');

    }

    public function showByDate($date){

        $user = \Auth::user();
        $attendance = Attendance::where('attendance_date', $date )->where('branch_id',$user->branchcode )->first();
        if ($attendance)
        {
            $addedVariables = ['formatted_date'=>$request->get('date'), 'date_in_words'=>"{$this->get_date_in_words($attendance->attendance_date)}",'request_date'=>$request->date];
            return view('attendance.view', compact('attendance','addedVariables' ) );
        }
        else
        {
            return redirect()->route('attendance.view.form')->with('status',"{$date} No attendance for {$date}");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance, Request $request, $date="")
    {
        $user = \Auth::user();
        $convertedDate = date('Y-m-d',strtotime($request->get('date')));
        $thedate = (!empty($date) && strlen($date) > 2) ? $date : $convertedDate;
        $attendance = Attendance::where('attendance_date', $thedate )->where('branch_id',$user->branchcode )->first();
        if ($attendance)
        {
            $addedVariables = ['formatted_date'=>$thedate, 'date_in_words'=>"{$this->get_date_in_words($attendance->attendance_date)}",'request_date'=>$request->date];
            return view('attendance.view', compact('attendance','addedVariables' ) );
        }
        else
        {
            return redirect()->route('attendance.view.form')->with('status',"{$thedate} No attendance for {$this->get_date_in_words($request->get('date'))}");
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


    public function analysis(){

        $user = \Auth::user();

        /*$sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, MONTH(attendance_date) AS month FROM `attendances` WHERE branch_id = '.$user->branchcode.' GROUP BY month';
        $attendances = \DB::select($sql);
        $sql = 'SELECT SUM(male + female + children) AS total, MONTH(attendance_date) AS month FROM `attendances` WHERE branch_id = '.$user->branchcode.'  GROUP BY month';
        $attendances2 = \DB::select($sql);
        $sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, WEEK(attendance_date) AS week FROM `attendances` WHERE branch_id = '.$user->branchcode.' GROUP BY week';
        $attendances3 = \DB::select($sql);
        $sql = 'SELECT SUM(male + female + children) AS total, MONTH(attendance_date) AS month FROM `attendances` WHERE branch_id = '.$user->branchcode.'  GROUP BY month';
        $attendances4 = \DB::select($sql);*/
        //month
        $sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        MONTH(attendance_date) AS month FROM `attendances` WHERE YEAR(attendance_date) = YEAR(CURDATE()) AND branch_id = '.$user->branchcode.' GROUP BY month';
        $attendances = \DB::select($sql);
        //day
        $sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        DAYOFWEEK(attendance_date) AS day FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 7 DAY) AND WEEK(attendance_date) = WEEK(DATE(NOW())) AND branch_id = '.$user->branchcode.' GROUP BY day';
        $attendances2 = \DB::select($sql);

        //Week
        $sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        WEEK(attendance_date) AS week FROM `attendances` WHERE YEAR(attendance_date) = YEAR(CURDATE()) AND attendance_date >= DATE(NOW() + INTERVAL - 10 WEEK) AND branch_id = '.$user->branchcode.' GROUP BY week';
        $attendances3 = \DB::select($sql);

        //Year
        $sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        YEAR(attendance_date) AS year FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '.$user->branchcode.' GROUP BY year';
        $attendances4 = \DB::select($sql);

        return view('attendance.analysis', compact('attendances', 'attendances2', 'attendances3', 'attendances4'));
    }
//WEEK(attendance_date) = (WEEK(attendance_date, 3) -
//WEEK(attendance_date - INTERVAL DAY(attendance_date)-1 DAY, 3) + 1)  YEAR(attendance_date) = YEAR(CURDATE())
    //form view
    public function view(){
      $user = \Auth::user();
      $sql = "SELECT * FROM attendances WHERE branch_id = '$user->branchcode' "; // ORDER BY attendance_date DESC";
      $attendance = \DB::select($sql);
      $sqll = "SELECT * FROM members_attendance WHERE branch_id =" .$user->branchcode. "";
      $attendances = \DB::select($sqll);
      return view('attendance.view', compact('attendance', 'attendances'));
    }

    public function mark(){
      $user = \Auth::user();
      $members = \App\Member::where('branch_id', $user->branchcode)->get();
      return view('attendance.mark', compact('members'));
    }

    public function mark_it(Request $request){
      $offer = $request->except(['_token']);
      for($i = 0; $i < count($offer['member_id']); $i++) {
        // code...
        $present = isset($offer['attendance'][$i]) ? $offer['attendance'][$i] : 'no';
        $value = [
        'member_id' => $offer['member_id'][$i],
        'title' => $offer['title'][$i],
        'firstname' => $offer['fname'][$i],
        'lastname' => $offer['lname'][$i],
        'attendance' => $present,
        'attendance_date' => date('Y-m-d',strtotime($offer['date'])),
        'branch_id' => $offer['branch_id'][$i],
        'date_submitted' => now(),
        'service_type' => $offer['type'],
        ];
            \DB::table('members_attendance')->insert($value);
      }
      return redirect()->back()->with('status', 'Attendance Marked');
    }
}
