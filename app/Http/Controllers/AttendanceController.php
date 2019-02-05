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

        $split_date_array = explode("-",$request->get('date'));
        if (Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->isFuture())
        {
            return response()->json(['status' => false, 'text' => "**You can't save attendance for a future date!"]);
        }

        // check if attendnace has already been marked for that date
        $attendance = Attendance::where('attendance_date', date('Y-m-d',strtotime($request->get('date'))) )->where('branch_id',$user->branchcode )->get(['id'])->count();
        if ($attendance > 0){
            return response()->json(['status' => false, 'text' => "**Attendance for {$this->get_date_in_words($request->get('date'))} has been saved before!"]);
        }
        // convert date to acceptable mysql format
        $dateToSave = date('Y-m-d',strtotime($request->get('date')));
        // register attendance
        $attendance = new Attendance(array(
            'branch_id' => $user->branchcode,
            'male' => $request->get('male'),
            'female' => $request->get('female'),
            'children' => $request->get('children'),
            'service_types_id' => $request->get('type'),
            'other' => $request->get('custom_type'),
            'attendance_date' => $dateToSave,
        ));
        $attendance->save();

        return response()->json(['status' => true, 'text' => 'Attendance successfully saved']);
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
            return response()->json(['status' => true, 'attendance' => $attendance]);
            // return view('attendance.view', compact('attendance','addedVariables' ) );
        }
        else
        {
          return response()->json(['status' => false, 'text' => "No attendance for {$this->get_date_in_words($request->get('date'))}"]);
            // return redirect()->route('attendance.view.form')->with('status',"{$thedate} No attendance for {$this->get_date_in_words($request->get('date'))}");
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
        $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        MONTH(attendance_date) AS month FROM `attendances` WHERE YEAR(attendance_date) = YEAR(CURDATE()) AND branch_id = '$user->branchcode' GROUP BY month";
        $attendances = \DB::select($sql);
        //day
        $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        DAYOFWEEK(attendance_date) AS day FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 7 DAY) AND WEEK(attendance_date) = WEEK(DATE(NOW())) AND branch_id = '$user->branchcode' GROUP BY day";
        $attendances2 = \DB::select($sql);

        //Week
        $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        WEEK(attendance_date) AS week FROM `attendances` WHERE YEAR(attendance_date) = YEAR(CURDATE()) AND attendance_date >= DATE(NOW() + INTERVAL - 10 WEEK) AND branch_id = '$user->branchcode' GROUP BY week";
        $attendances3 = \DB::select($sql);

        //Year
        $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        YEAR(attendance_date) AS year FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '$user->branchcode' GROUP BY year";
        $attendances4 = \DB::select($sql);

        return view('attendance.analysis', compact('attendances', 'attendances2', 'attendances3', 'attendances4'));
    }
    //form view
    public function view(){
      $user = \Auth::user();
      $attendance = Attendance::where('branch_id', $user->branchcode)->with('service_types')->orderBy('attendance_date', 'DESC')->get();
      $attendances = \App\members_attendance::where('members_attendances.branch_id', $user->branchcode)
      ->with(array('service_types' => function($query){
        $query->select('*');
      }))
      ->leftJoin('members', 'members_attendances.member_id', '=', 'members.id')->get();
      // dd($attendances);
      return view('attendance.view', compact('attendance', 'attendances'));
    }

    public function mark(){
      $user = \Auth::user();
      $services = $user->getServiceTypes();
      $members = \App\Member::where('branch_id', $user->branchcode)->get();
      return view('attendance.mark', compact('members', 'services'));
    }

    public function mark_it(Request $request){
      $split_date_array = explode("-", date('Y-m-d', strtotime($request->date)));
      if (Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->isFuture())
      {
          return response()->json(['status' => false, 'text' => "**You can't save attendance for a future date!"]);
      }
      if ($check = \App\members_attendance::where('attendance_date', date('Y-m-d', strtotime($request->date)))->first()) {
        // code...
        return response()->json(['status' => false, 'text' => "Member Attendance for {$this->get_date_in_words($check->attendance_date)} Already Marked"]);
      }
      $offer = $request;
      for($i = 0; $i < count($offer['member_id']); $i++) {
        // code...
        $present = isset($offer['attendance'][$i]) ? $offer['attendance'][$i] : 'no';
        $value = [
        'member_id' => $offer['member_id'][$i],
        'attendance' => $present,
        'attendance_date' => date('Y-m-d',strtotime($offer['date'])),
        'branch_id' => $offer['branch_id'][$i],
        'service_types_id' => $offer['type'],
        ];
            \App\members_attendance::create($value);
      }
      return response()->json(['status' => true, 'text' => 'Attendance Marked']);
    }

    public function attendanceStats(Request $request){
      $user = \Auth::user();
      return $member = Attendance::selectRaw("COUNT(id) as total, SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
      MONTH(attendance_date) AS month")->whereRaw("attendance_date > DATE(now() + INTERVAL - 12 MONTH)")->where("branch_id", $user->branchcode)->groupBy("month")->get();
    }
}
