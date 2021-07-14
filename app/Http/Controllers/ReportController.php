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
      FROM `members` WHERE branch_id = '$user->id'";
      $reports = \DB::select($sql);

      //Year of reg
      $sql = "SELECT COUNT(case when sex = 'male' then 1 end) AS male, COUNT(case when sex = 'female' then 1 end) AS female,
      YEAR(created_at) AS year FROM `members` WHERE created_at >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '$user->id' GROUP BY year";
      $r_years = \DB::select($sql);

      return view('report.membership', compact('reports', 'r_years'));
    }

    public function collections(){
      $user = \Auth::user();
      $savings = \App\Collection::rowToColumn(\App\Collection::with('service_types')->where('branch_id', $user->id)->get());
      $mSavings = \App\MemberCollection::rowToColumn(\App\MemberCollection::where('branch_id', $user->id)->get());
      $obj = new \stdClass();
      $obj->total_collections = $this->calculateTotal($savings);
      $obj->todays_total_collections = $this->calculateTotal($savings, 'now');
      $obj->todays_single_collections = $this->calculateSingleTotal($savings, 'now');
      // dd($this->calculateSingleTotal($savings, 'now'));
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
      // dd($obj);
      //year
      $c_years = $this->calculateSingleTotal($savings, 'year');
      // dd($c_years);

      return view('report.collections', compact('reports', 'memberTotal', 'c_years', 'c_types'));
    }

    public function attendance(){
      $user = \Auth::user();

      $sql = "SUM(female + male + children) AS total_attendance, SUM(case when attendance_date = date(now()) then (female + male + children) end) AS todays_attendance,
      SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, SUM(children + male + female) AS total, SUM(case when attendance_date = date(now()) then children + male + female end) AS totalt,
      SUM(case when attendance_date = date(now()) then male end) AS malet, SUM(case when attendance_date = date(now()) then female end) AS femalet, SUM(case when attendance_date = date(now()) then children end) AS childrent";
      $reports = \App\Attendance::selectRaw($sql)->where('branch_id', $user->id)->first();

      $sql = "members.firstname, members.lastname, count(case when member_attendances.attendance = 'yes' then 1 end) as total, count(case when member_attendances.date = date(now()) then (case when member_attendances.attendance = 'yes' then 1 end) end) as totalt";
      $m_r = $user->members()->selectRaw($sql)
      ->leftjoin('member_attendances', 'members.id', '=', 'member_attendances.member_id')
      ->groupBy('members.firstname', 'members.lastname')->get();
      // dd($m_r);
      $sql = "SELECT SUM(a.male + a.female + a.children) as atotal,
      count(case when attendance = 'yes' then 1 end) as mtotal,
      branchname AS name
      FROM member_attendances m, attendances a JOIN users u ON branch_id = u.id GROUP BY name";
      $ad_rep= \DB::select($sql);
      // dd($ad_rep);

      //Year
      $sql = "SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
      YEAR(attendance_date) AS year FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '".$user->id."' GROUP BY year";
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
      YEAR(m.created_at) AS year FROM members m RIGHT JOIN users u ON branch_id = u.id WHERE m.created_at >= DATE(NOW() + INTERVAL - 10 YEAR) GROUP BY name, year";

      $i_years= \DB::select($sql);

      return view('report.all-m', compact('reports', 'r_years', 'i_years'));
    }

    public function allCollections(){
      $user = \Auth::user();
      if(!$user->isAdmin()){
        return redirect()->route('report.collections');
      }

      $bSavings = \App\Collection::rowToColumnByField(\App\Collection::with('users')->get());
      $obj = new \stdClass();
      $obj->branch_collections = $this->calculateSingleTotalBranch($bSavings);
      $obj->collections = $this->calculateSingleTotalCollection($bSavings);
      $c_years = $this->calculateSingleTotalCollection($bSavings, 'year');

      $c_types = \App\CollectionsType::getTypes();
      $branchesName = \App\User::select('branchname')->get();

      $reports = $obj;

      return view('report.all-c', compact('reports', 'c_years', 'c_types', 'branchesName'));
    }

    public function allAttendance(){
      $user = \Auth::user();

      if(!$user->isAdmin()){
        return redirect()->route('report.attendance');
      }

      $sql = "SUM(female + male + children) AS total_attendance, SUM(case when attendance_date = date(now()) then (female + male + children) end) AS todays_attendance,
      SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, SUM(children + male + female) AS total, SUM(case when attendance_date = date(now()) then children + male + female end) AS totalt,
      SUM(case when attendance_date = date(now()) then male end) AS malet, SUM(case when attendance_date = date(now()) then female end) AS femalet, SUM(case when attendance_date = date(now()) then children end) AS childrent";
      $reports = \App\Attendance::selectRaw($sql)->first();//\DB::select($sql);

      $sql = "count(case when attendance = 'yes' then 1 end) as total, count(case when date = date(now()) then (case when attendance = 'yes' then 1 end) end) as totalt";
      $m_r = \App\MemberAttendance::selectRaw($sql)->with('member')->get();

      $sql = "SELECT SUM(a.male + a.female + a.children) as atotal, SUM(case when a.attendance_date = date(now()) then (a.male + a.female + a.children) end) as atotalt,
      branchname AS name
      FROM attendances a JOIN users u ON branch_id = u.id GROUP BY name";
      $ad_rep= \DB::select($sql);

      //Year
      $sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
      YEAR(attendance_date) AS year FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 10 YEAR) GROUP BY year';
      $a_years = \DB::select($sql);

      return view('report.all-a', compact('reports', 'm_r', 'ad_rep', 'a_years'));
    }


    public function calculateSingleTotalCollection($savings, $type = false){
      // dd($savings);
      $obj = $type == 'year' ? new \stdClass() : ['total' => 0, 'today' => 0];
      foreach ($savings as $key => $value) {
        if (!$type) {
          foreach ($value as $ke => $valu) {
            try {
              foreach ($valu['amounts'] as $savingName => $savingAmount) {
                // dd($savingName);
                if (!isset($obj[$savingName])) {
                  $obj[$savingName] = [];
                }

                $obj[$savingName]['total'] = isset($obj[$savingName]['total']) ? $obj[$savingName]['total'] + $savingAmount : $savingAmount;
                // do for all time
                $obj['total'] += $savingAmount;

                if ($ke ==  now()->toDateString()) {
                  $obj[$savingName]['today'] = isset($obj[$savingName]['today']) ? $obj[$savingName]['today'] + $savingAmount : $savingAmount;
                  // do for todays total
                  $obj['today'] += $savingAmount;
                }
              }
            } catch (\Exception $e) {
              // print($e->getMessage());
            }
          }
        }

        if ($type == 'year') {
          foreach ($value as $k => $v) {
            // dd($savings);
            $year = substr($k, 0,4);
            foreach ($v['amounts'] as $savingName => $savingAmount) {
              if (!isset($obj->$savingName)) {$obj->$savingName = new \stdClass();}
              if (isset($obj->$savingName->$year)) {
                $obj->$savingName->$year += $savingAmount;
              } else {
                $obj->$savingName->$year = $savingAmount;
              }
            }
          }
        }

      }
      return $obj;
    }

    public function calculateSingleTotalBranch($savings, $type = false){
      // dd($savings);
      $obj = [];
      foreach ($savings as $key => $value) {
        $name = $key;

        if (!$type) {
          foreach ($value as $ke => $valu) {
            if ($ke ==  now()->toDateString()) {
              $obj[$key]['today'] = array_sum($valu['amounts']);
            } elseif (!isset($obj[$key]['today'])) {
              $obj[$key]['today'] = 0;
            }
            if (isset($obj[$name]['total']) ) {
              $obj[$key]['total'] += array_sum($valu['amounts']);
            } else {
              $obj[$key]['total'] = array_sum($valu['amounts']);
            }

            // do for savings
            if (!isset($obj[$key]['savings'])) {
              $obj[$key]['savings'] = [];
            }

            foreach ($valu as $k => $v) {
              try {
                foreach ($v as $savingName => $savingAmount) {
                  if (!isset($obj[$key]['savings'][$savingName])) {
                    $obj[$key]['savings'][$savingName] = [];
                  }
                  $obj[$key]['savings'][$savingName]['total']
                    = isset($obj[$key]['savings'][$savingName]['total'])
                    ? $obj[$key]['savings'][$savingName]['total'] + $savingAmount
                    : $savingAmount;
                  if ($ke ==  now()->toDateString()) {
                    $obj[$key]['savings'][$savingName]['today'] = isset($obj[$key]['savings'][$savingName]['today'])
                      ? $obj[$key]['savings'][$savingName]['today'] + $savingAmount : $savingAmount;
                  }
                }
              } catch (\Exception $e) {
                // print($e->getMessage());
              }
            }
          }
        }
      }
      // dd($obj);
      return $obj;
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
      // dd($savings);
      return $total;
    }

    public function calculateSingleTotal($savings, $type = false){
      $obj = ($type == 'memberTotal') ? [] : new \stdClass();
      foreach ($savings as $key => $value) {
        if ($type == 'now') {
          foreach ($value->amounts as $ke => $valu) {
            if ($value->date_collected ==  now()->toDateString() ) {
              $obj->$ke = isset($obj->$ke) ? $obj->$ke + $valu : $valu;
            } else {
              $obj->$ke = isset($obj->$ke) ? $obj->$ke + 0 : 0;
            }
          }
          // dd($savings);
        }
        if ($type == 'year') {
          $year = substr($value->date_collected, 0,4);
          foreach ($value->amounts as $ke => $valu) {
            if (!isset($obj->$ke)) {$obj->$ke = new \stdClass();}
            if (isset($obj->$ke->$year)) {
              $obj->$ke->$year += $valu;
            } else {
              $obj->$ke->$year = $valu;
            }
          }
        }
        if ($type == 'memberTotal') {
          $name = ($type == 'memberTotal') ? $value->name : $value->branch_name;
          if ($value->date_collected ==  now()->toDateString()) {
            $obj[$name]['today'] = array_sum($value->amounts);
          } elseif (!isset($obj[$name]['today'])) {
            $obj[$name]['today'] = 0;
          }
          if (isset($obj[$name]['total']) ) {
            $obj[$name]['total'] += array_sum($value->amounts);
          } else {
            $obj[$name]['total'] = array_sum($value->amounts);
          }
        }
        if(!$type){
          foreach ($value->amounts as $ke => $valu) {
            if (isset($obj->$ke)) {
              $obj->$ke += $valu;
            } else {
              $obj->$ke = $valu;
            }
          }
        }
        // dd($obj);
      }
      // $type = false;
      return $obj;
    }
}
