<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Member;

class ReportController extends Controller
{
    //
    public function membership(){
      $user = \Auth::user();

      $sql = "SELECT count(id) AS total_member, count(case when sex = 'male' then 1 end) AS male, count(case when sex = 'female' then 1 end) AS female,
      count(case when marital_status = 'single' then 1 end) AS single, count(case when marital_status = 'married' then 1 end) AS married
      FROM `members` WHERE branch_id = '$user->branchcode'";
      $reports = \DB::select($sql);

      //Year of reg
      $sql = "SELECT COUNT(case when sex = 'male' then 1 end) AS male, COUNT(case when sex = 'female' then 1 end) AS female,
      YEAR(created_at) AS year FROM `members` WHERE created_at >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '$user->branchcode' GROUP BY year";
      $r_years = \DB::select($sql);

      return view('report.membership', compact('reports', 'r_years'));
    }

    public function calculateTotal($savings, $type = false){
      $total = 0;
      foreach ($savings as $key => $value) {
        if ($type == 'now') {
          if ($value->date_collected ==  now()->toDateString() ) {
            $total += array_sum($value->amounts);
          }
        } else {
          $total += array_sum($value->amounts);
        }
      }
      return $total;
    }

    public function calculateSingleTotal($savings, $type = false){
      $obj = ($type == 'memberTotal' || $type == 'branchTotal') ? [] : new \stdClass();
      foreach ($savings as $key => $value) {
        if ($type == 'now') {
          foreach ($value->amounts as $ke => $valu) {
            if ($value->date_collected ==  now()->toDateString() ) {
              $obj->$ke = $valu;
            } else {
              $obj->$ke = 0;
            }
          }
        } elseif ($type == 'year') {
          $year = substr($value->date_collected, 0,4);
          foreach ($value->amounts as $ke => $valu) {
            if (!isset($obj->$ke)) {$obj->$ke = new \stdClass();}
            if (isset($obj->$year)) {
              $obj->$ke->$year += $valu;
            } else {
              $obj->$ke->$year = $valu;
            }
          }
        } elseif ($type == 'memberTotal' || $type == 'branchTotal') {
          $name = ($type == 'memberTotal') ? $value->name : $value->branch_name;
          $obj[$name]['today'] = ($value->date_collected ==  now()->toDateString()) ? array_sum($value->amounts) : 0;
          if (isset($obj[$name]['total']) ) {
            $obj[$name]['total'] += array_sum($value->amounts);
          } else {
            $obj[$name]['total'] = array_sum($value->amounts);
          }
        } else {
          foreach ($value->amounts as $ke => $valu) {
            if (isset($obj->$ke)) {
              $obj->$ke += $valu;
            } else {
              $obj->$ke = $valu;
            }
          }
        }
      }
      return $obj;
    }

    public function collections(){
      $user = \Auth::user();
      $savings = \App\Savings::rowToColumn(\App\Savings::where('branch_id', $user->id)->get());
      $mSavings = \App\MemberSavings::rowToColumn(\App\MemberSavings::where('branch_id', $user->id)->get());

      $obj = new \stdClass();
      $obj->total_collections = $this->calculateTotal($savings);
      $obj->todays_total_collections = $this->calculateTotal($savings, 'now');
      $obj->todays_single_collections = $this->calculateSingleTotal($savings, 'now');
      $obj->total_single_collections = $this->calculateSingleTotal($savings);
      $c_types = \App\CollectionsType::getTypes();

      function dateSum($types, $date = false){
        $string = '';
        $size = sizeof($types);
        if ($date) {
          $operation = function($i, $type, $size) {return "SUM(case when date_collected = date(now()) then $type->name end) AS $type->name".'t'.($size != $i ? ',' : ''); };
        } else {
          $operation = function($i, $type, $size) {return "SUM($type->name) AS $type->name,"; };
        }
        $i = 1;
        foreach ($types as $type) {
          $string .= $operation($i, $type, $size);
          $i++;
        }
        return $string;
      }
      $reports = $obj;
      $memberTotal = $this->calculateSingleTotal($mSavings, 'memberTotal');
      // dd($memberTotal);
      //year
      $c_years = $this->calculateSingleTotal($savings, 'year');

      return view('report.collections', compact('reports', 'memberTotal', 'ad_rep', 'c_years', 'c_types'));
    }

    public function attendance(){
      $user = \Auth::user();

      $sql = "SELECT SUM(female + male + children) AS total_attendance, SUM(case when attendance_date = date(now()) then (female + male + children) end) AS todays_attendance,
      SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, SUM(children + male + female) AS total, SUM(case when attendance_date = date(now()) then children + male + female end) AS totalt,
      SUM(case when attendance_date = date(now()) then male end) AS malet, SUM(case when attendance_date = date(now()) then female end) AS femalet, SUM(case when attendance_date = date(now()) then children end) AS childrent
      FROM `attendances` WHERE branch_id = '$user->branchcode'";
      $reports = \DB::select($sql);

      $sql = "members.firstname, members.lastname, count(case when attendance = 'yes' then 1 end) as total, count(case when attendance_date = date(now()) then (case when attendance = 'yes' then 1 end) end) as totalt
      ";
      $m_r = \App\members_attendance::selectRaw($sql)->where('members_attendances.branch_id', $user->branchcode)
      ->leftjoin('members', 'members.id', '=', 'members_attendances.member_id')
      ->groupBy('firstname', 'lastname')->get();//\DB::select($sql);
      // dd($m_r);
      $sql = "SELECT SUM(a.male + a.female + a.children) as atotal,
      count(case when attendance = 'yes' then 1 end) as mtotal,
      branchname AS name
      FROM members_attendances m, attendances a JOIN users u ON branch_id = u.branchcode GROUP BY name";
      $ad_rep= \DB::select($sql);
      // dd($ad_rep);

      //Year
      $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
      YEAR(attendance_date) AS year FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '".$user->branchcode."' GROUP BY year";
      $a_years = \DB::select($sql);
      return view('report.attendance', compact('reports', 'm_r', 'ad_rep', 'a_years'));
    }

    public function allMembership(){
      $user = \Auth::user();

      if(!$user->isAdmin()){
        return redirect()->route('report.membership');
      }

      $sql = "SELECT count(id) AS total_member, count(case when sex = 'male' then 1 end) AS male, count(case when sex = 'female' then 1 end) AS female,
      count(case when marital_status = 'single' then 1 end) AS single, count(case when marital_status = 'married' then 1 end) AS married
      FROM `members` ";
      $reports = \DB::select($sql);

      //Year of reg
      $sql = "SELECT COUNT(case when sex = 'male' then 1 end) AS male, COUNT(case when sex = 'female' then 1 end) AS female,
      YEAR(created_at) AS year FROM `members` WHERE created_at >= DATE(NOW() + INTERVAL - 10 YEAR) GROUP BY year";
      $r_years = \DB::select($sql);

      $sql = "SELECT COUNT(case when sex = 'male' then 1 end) AS male, COUNT(case when sex = 'female' then 1 end) as female,
      branchname AS name,
      YEAR(m.created_at) AS year FROM members m RIGHT JOIN users u ON branch_id = u.branchcode WHERE m.created_at >= DATE(NOW() + INTERVAL - 10 YEAR) GROUP BY name, year";

      $i_years= \DB::select($sql);

      return view('report.all-m', compact('reports', 'r_years', 'i_years', 'runs'));
    }

    public function allCollections(){
      $user = \Auth::user();

      if(!$user->isAdmin()){
        return redirect()->route('report.collections');
      }
      $savings = \App\Savings::rowToColumn(\App\Savings::all());
      $bSavings = \App\Savings::rowToColumn(\App\Savings::with('users')->get(), 'branch');
      $branches = $this->calculateSingleTotal($bSavings, 'branchTotal');
      $obj = new \stdClass();
      $obj->total_collections = $this->calculateTotal($savings);
      $obj->todays_total_collections = $this->calculateTotal($savings, 'now');
      $obj->todays_single_collections = $this->calculateSingleTotal($savings, 'now');
      $obj->total_single_collections = $this->calculateSingleTotal($savings);
      $c_types = \App\CollectionsType::getTypes();
      $reports = $obj;
      $branchesName = \App\User::select('branchname')->get();
      $c_years = $this->calculateSingleTotal($savings, 'year');

      return view('report.all-c', compact('reports', 'branches', 'ad_rep', 'c_years', 'c_types', 'branchesName'));
    }

    public function allAttendance(){
      $user = \Auth::user();

      if(!$user->isAdmin()){
        return redirect()->route('report.attendance');
      }

      $sql = "SUM(female + male + children) AS total_attendance, SUM(case when attendance_date = date(now()) then (female + male + children) end) AS todays_attendance,
      SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, SUM(children + male + female) AS total, SUM(case when attendance_date = date(now()) then children + male + female end) AS totalt,
      SUM(case when attendance_date = date(now()) then male end) AS malet, SUM(case when attendance_date = date(now()) then female end) AS femalet, SUM(case when attendance_date = date(now()) then children end) AS childrent";
      $reports = \App\Attendance::selectRaw($sql)->get();//\DB::select($sql);

      $sql = "count(case when attendance = 'yes' then 1 end) as total, count(case when attendance_date = date(now()) then (case when attendance = 'yes' then 1 end) end) as totalt";
      $m_r = \App\members_attendance::selectRaw($sql)->with('members')->get();

      $sql = "SELECT SUM(a.male + a.female + a.children) as atotal, SUM(case when a.attendance_date = date(now()) then (a.male + a.female + a.children) end) as atotalt,
      branchname AS name
      FROM attendances a JOIN users u ON branch_id = u.branchcode GROUP BY name";
      $ad_rep= \DB::select($sql);

      //Year
      $sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
      YEAR(attendance_date) AS year FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 10 YEAR) GROUP BY year';
      $a_years = \DB::select($sql);

      return view('report.all-a', compact('reports', 'm_r', 'ad_rep', 'a_years'));
    }
}
