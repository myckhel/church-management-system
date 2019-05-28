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
        // $user = \Auth::user();
        // $date = $request->date;
        // return view('attendance.mark', compact('members', 'date', 'users'));
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
        $attendance = Attendance::where('attendance_date', date('Y-m-d',strtotime($request->get('date'))) )->where('branch_id',$user->id )->get(['id'])->count();
        if ($attendance > 0){
            return response()->json(['status' => false, 'text' => "**Attendance for {$this->get_date_in_words($request->get('date'))} has been saved before!"]);
        }
        // convert date to acceptable mysql format
        $dateToSave = date('Y-m-d',strtotime($request->get('date')));
        // register attendance
        $attendance = new Attendance(array(
            'branch_id' => $user->id,
            'male' => $request->get('male'),
            'female' => $request->get('female'),
            'children' => $request->get('children'),
            'service_types_id' => $request->get('type'),
            'attendance_date' => $dateToSave,
        ));
        $attendance->save();

        return response()->json(['status' => true, 'text' => 'Attendance successfully saved']);
    }
    private function get_date_in_words($date)
    {
        $split_date_array = explode("-",str_replace(" ", "-", $date));
        return Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->format('l, jS \\of F Y');

    }

    public function showByDate($date){

        $user = \Auth::user();
        $attendance = Attendance::where('attendance_date', $date )->where('branch_id',$user->id )->first();
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
    public function show(Attendance $attendance, Request $request)
    {
        $user = \Auth::user();
        $attendance = Attendance::where('attendance_date', $request->get('date') )->where('branch_id',$user->id )->first();
        if ($attendance)
        {
            return response()->json(['status' => true, 'attendance' => $attendance]);
        }
        else
        {
          return response()->json(['status' => false, 'text' => "No attendance for {$this->get_date_in_words($convertedDate)}"]);
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
        MONTH(attendance_date) AS month FROM `attendances` WHERE YEAR(attendance_date) = YEAR(CURDATE()) AND branch_id = '$user->id' GROUP BY month";
        $attendances = \DB::select($sql);
        //day
        $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        DAYOFWEEK(attendance_date) AS day FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 7 DAY) AND WEEK(attendance_date) = WEEK(DATE(NOW())) AND branch_id = '$user->id' GROUP BY day";
        $attendances2 = \DB::select($sql);

        //Week
        $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        WEEK(attendance_date) AS week FROM `attendances` WHERE YEAR(attendance_date) = YEAR(CURDATE()) AND attendance_date >= DATE(NOW() + INTERVAL - 10 WEEK) AND branch_id = '$user->id' GROUP BY week";
        $attendances3 = \DB::select($sql);

        //Year
        $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
        YEAR(attendance_date) AS year FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '$user->id' GROUP BY year";
        $attendances4 = \DB::select($sql);

        return view('attendance.analysis', compact('attendances', 'attendances2', 'attendances3', 'attendances4'));
    }
    //form view
    public function view(){
      $user = \Auth::user();
      $members = $user->members()->get();
      $attendance = Attendance::where('branch_id', $user->id)->with('service_types')->orderBy('attendance_date', 'DESC')->get();
      // $attendances = $user->members()->with('member_attendances.service_types')->get();
      return view('attendance.view', compact('attendance', 'members'));
    }

    public function mark(){
      $user = \Auth::user();
      $services = $user->getServiceTypes();
      $members = \App\Member::where('branch_id', $user->id)->get();
      return view('attendance.mark', compact('members', 'services'));
    }

    public function mark_it(Request $request){
      $split_date_array = explode("-", date('Y-m-d', strtotime($request->date)));
      if (Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->isFuture())
      {
          return response()->json(['status' => false, 'text' => "**You can't save attendance for a future date!"]);
      }
      if ($check = \App\MemberAttendance::where('date', date('Y-m-d', strtotime($request->date)))->first()) {
        // code...
        return response()->json(['status' => false, 'text' => "Member Attendance for {$this->get_date_in_words($check->date)} Already Marked"]);
      }
      $offer = $request;
      for($i = 0; $i < count($offer['member_id']); $i++) {
        // code...
        $present = isset($offer['attendance'][$i]) ? $offer['attendance'][$i] : 'no';
        \App\MemberAttendance::create([
          'member_id' => $offer['member_id'][$i],
          'attendance' => $present,
          'date' => date('Y-m-d',strtotime($offer['date'])),
          'service_types_id' => $offer['type'],
        ]);
      }
      return response()->json(['status' => true, 'text' => 'Attendance Marked']);
    }

    public function attendanceStats(Request $request){
      $user = \Auth::user();
      $attendances = Attendance::selectRaw("COUNT(id) as total, SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
      MONTH(attendance_date) AS month")->whereRaw("attendance_date > DATE(now() + INTERVAL - 12 MONTH)")->where("branch_id", $user->id)->groupBy("month")->get();

      $group = 'month';
      $months = [];
      $interval = 0;
      $ii = 11;
      $c_types = Array('male', 'female', 'children');
      for ($i = $interval; $i <= 11; $i++) {
        $t = 'M';
        switch ($group) {
          case 'day': $t = 'D'; break;
          case 'week': $t = 'W'; break;
          case 'month': $t = 'M'; break;
          case 'year': $t = 'Y'; break;
        }
        $dateOrNot = $group == 'month' ? date('Y-m-01') : '';
        $months[$ii] = date($t, strtotime($dateOrNot. "-$i $group")); //1 week ago
        $ii--;
      }

      $dt = (function($attendances, $c_types, $months, $group){
        $output = [];
        foreach ($months as $key => $value) {
    		$month = $value; $found = false;
    		foreach ($attendances as $attendance) {
          // dd($member->$group,$month);
          $m;
          switch ($attendance->$group) {
            case 1: $m = 'Jan'; break;
            case 2: $m = 'Feb'; break;
            case 3: $m = 'Mar'; break;
            case 4: $m = 'Apr'; break;
            case 5: $m = 'May'; break;
            case 6: $m = 'Jun'; break;
            case 7: $m = 'Jul'; break;
            case 8: $m = 'Aug'; break;
            case 9: $m = 'Sep'; break;
            case 10: $m = 'Oct'; break;
            case 11: $m = 'Nov'; break;
            case 12: $m = 'Dec'; break;
          }
          // dd($m);
    			if($month == $m){
    				$found = true;
            $output[] = $this->flotY($attendance, $c_types, $key);
    			}
    		}
    		if(!$found){
    			$output[] = $this->flotNoData($c_types, $key);
    		}
    	}
      return $output;
    })($attendances, $c_types, $months, $group);

    return $dt;
    }

    private function flotY($attendance, $c_types, $value){
      $y = [];
      $y['month'] = $value;  $i = 1; $size = sizeof($c_types);
      foreach ($c_types as $key => $value) {
        $name = $value;
        $amount = isset($attendance->$name) ? $attendance->$name : 0;
        $y[$name] = $amount;
        $i++;
      }
      return $y;
    }

    private function flotNoData($c_types, $value){
      $y = [];
      $y['month'] = $value; $i=1;
      foreach ($c_types as $key => $value) {
        $name = $value;
        $y[$name] = 0;
        $i++;
      }
      return $y;//. "},";
    }
}
