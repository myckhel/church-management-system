<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    public function collections(){
      $user = \Auth::user();
      $savings = \App\Savings::rowToColumn(\App\Savings::where('branch_id', $user->id)->get());
      // dd($savings,now()->toDateString() );
      function calculateTotal($savings, $type = false){
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
      function calculateSingleTotal($savings, $type = false){
        $obj = new \stdClass();
        foreach ($savings as $key => $value) {
          if ($type == 'now') {
            if ($value->date_collected ==  now()->toDateString() ) {
              foreach ($value->amounts as $key => $value) {
                $obj->$key = $value;
              }
            }
          } else {
            foreach ($value->amounts as $key => $valu) {
              if (isset($obj->$key)) {
                $obj->$key += array_sum($value->amounts);
              } else {
                $obj->$key = array_sum($value->amounts);
              }
            }
          }
        }
        return $obj;
      }

      $obj = new \stdClass();
      $obj->total_collections = calculateTotal($savings);
      $obj->todays_total_collections = calculateTotal($savings, 'now');
      $obj->todays_single_collections = calculateSingleTotal($savings, 'now');
      $obj->total_single_collections = calculateSingleTotal($savings);
      $c_types = \App\CollectionsType::getTypes();
      $collects = ['offering','tithe','special_offering','seed_offering','donation','first_fruit','covenant_seed','love_seed','sacrifice','thanksgiving','thanksgiving_seed','other'];

      // dd($obj);
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
      $operations = '';//sum($c_types);
      $single = dateSum($c_types);
      $singleDate = dateSum($c_types, true);
      $sql = "SUM($operations) AS total_collections,
      SUM(case when date_collected = date(now()) then ($operations) end) AS todays_collections,
      SUM(case when date_collected = date(now()) then ($operations) end) AS todays_collectionst,
      $single
      $singleDate
      ";
      // $reports = \App\Savings::selectRaw($sql)
      // // ->leftjoin('collections_types', 'collections_types.id', '=', 'savings.collections_types_id')
      // ->where('branch_id', $user->branchcode)->first();
      $reports = $obj;

      $sql = "SELECT SUM(offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) as total,
      SUM(case when date_added = date(now()) then (offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) end) as totalt,
      fname AS fname, lname AS lname
      FROM `members_collection` WHERE branch_id = '$user->branchcode' GROUP BY fname, lname";
      $m_r = \DB::select($sql);

      $sql = "SELECT SUM(c.offering + c.tithe + c.special_offering + c.seed_offering + c.donation + c.first_fruit + c.covenant_seed + c.love_seed + c.sacrifice + c.thanksgiving + c.thanksgiving_seed + c.other) as ctotal,
      branchname AS name
      FROM collections c JOIN users u ON branch_id = u.branchcode GROUP BY name";
      $ad_rep= \DB::select($sql);

      //year
      $sql = "SELECT SUM(tithe) AS tithe, SUM(offering) AS offering, SUM(special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS other,
      YEAR(date_collected) AS year FROM `collections` WHERE date_collected >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '$user->branchcode' GROUP BY year";
      $c_years = \DB::select($sql);
      //dd($c_years);

      return view('report.collections', compact('reports', 'm_r', 'ad_rep', 'c_years', 'c_types'));
    }

    public function attendance(){
      $user = \Auth::user();

      $sql = "SELECT SUM(female + male + children) AS total_attendance, SUM(case when attendance_date = date(now()) then (female + male + children) end) AS todays_attendance,
      SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, SUM(children + male + female) AS total, SUM(case when attendance_date = date(now()) then children + male + female end) AS totalt,
      SUM(case when attendance_date = date(now()) then male end) AS malet, SUM(case when attendance_date = date(now()) then female end) AS femalet, SUM(case when attendance_date = date(now()) then children end) AS childrent
      FROM `attendances` WHERE branch_id = '$user->branchcode'";
      $reports = \DB::select($sql);

      $sql = "SELECT count(case when attendance = 'yes' then 1 end) as total, count(case when attendance_date = date(now()) then (case when attendance = 'yes' then 1 end) end) as totalt,
      firstname AS fname, lastname AS lname
      FROM `members_attendance` WHERE branch_id = '$user->branchcode' GROUP BY fname, lname";
      $m_r = \DB::select($sql);

      $sql = "SELECT SUM(a.male + a.female + a.children) as atotal,
      count(case when attendance = 'yes' then 1 end) as mtotal,
      branchname AS name
      FROM members_attendance m, attendances a JOIN users u ON branch_id = u.branchcode GROUP BY name";
      $ad_rep= \DB::select($sql);

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

      $sql = "SELECT SUM(offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS total_collections,
      SUM(case when date_collected = date(now()) then (offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) end) AS todays_collections,
      SUM(case when date_collected = date(now()) then (offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) end) AS todays_collectionst,
      SUM(special_offering) AS so, SUM(seed_offering) AS sdo, SUM(offering) AS o, SUM(donation) AS d, SUM(tithe) AS t, SUM(first_fruit) AS ff,
      SUM(covenant_seed) AS cs, SUM(love_seed) AS ls, SUM(sacrifice) AS s, SUM(thanksgiving) AS tg, SUM(thanksgiving_seed) AS tgs, SUM(other) AS oth, SUM(amount) AS total,
      SUM(case when date_collected = date(now()) then special_offering end) AS sot, SUM(case when date_collected = date(now()) then seed_offering end) AS sdot, SUM(case when date_collected = date(now()) then offering end) AS ot,
      SUM(case when date_collected = date(now()) then donation end) AS dt, SUM(case when date_collected = date(now()) then tithe end) AS tt, SUM(case when date_collected = date(now()) then first_fruit end) AS fft,
      SUM(case when date_collected = date(now()) then covenant_seed end) AS cst, SUM(case when date_collected = date(now()) then love_seed end) AS lst, SUM(case when date_collected = date(now()) then sacrifice end) AS st, SUM(case when date_collected = date(now()) then thanksgiving end) AS tgt,
      SUM(case when date_collected = date(now()) then thanksgiving_seed end) AS tgst, SUM(case when date_collected = date(now()) then other end) AS otht, SUM(case when date_collected = date(now()) then amount end) AS total
      FROM `collections` ";
      $reports = \DB::select($sql);

      $sql = "SELECT SUM(offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) as total,
      SUM(case when date_added = date(now()) then (offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) end) as totalt,
      fname AS fname, lname AS lname
      FROM `members_collection` GROUP BY fname, lname";
      $m_r = \DB::select($sql);

      $sql = "SELECT SUM(c.offering + c.tithe + c.special_offering + c.seed_offering + c.donation + c.first_fruit + c.covenant_seed + c.love_seed + c.sacrifice + c.thanksgiving + c.thanksgiving_seed + c.other) as ctotal,
      SUM(case when date_collected = date(now()) then (c.offering + c.tithe + c.special_offering + c.seed_offering + c.donation + c.first_fruit + c.covenant_seed + c.love_seed + c.sacrifice + c.thanksgiving + c.thanksgiving_seed + c.other) end) as ctotalt,
      branchname AS name
      FROM collections c JOIN users u ON branch_id = u.branchcode GROUP BY name";
      $ad_rep= \DB::select($sql);

      //year
      $sql = 'SELECT SUM(tithe) AS tithe, SUM(offering) AS offering, SUM(special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS other,
      YEAR(date_collected) AS year FROM `collections` WHERE date_collected >= DATE(NOW() + INTERVAL - 10 YEAR) GROUP BY year';
      $c_years = \DB::select($sql);

      return view('report.all-c', compact('reports', 'm_r', 'ad_rep', 'c_years'));
    }

    public function allAttendance(){
      $user = \Auth::user();

      if(!$user->isAdmin()){
        return redirect()->route('report.attendance');
      }

      $sql = "SELECT SUM(female + male + children) AS total_attendance, SUM(case when attendance_date = date(now()) then (female + male + children) end) AS todays_attendance,
      SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, SUM(children + male + female) AS total, SUM(case when attendance_date = date(now()) then children + male + female end) AS totalt,
      SUM(case when attendance_date = date(now()) then male end) AS malet, SUM(case when attendance_date = date(now()) then female end) AS femalet, SUM(case when attendance_date = date(now()) then children end) AS childrent
      FROM `attendances` ";
      $reports = \DB::select($sql);

      $sql = "SELECT count(case when attendance = 'yes' then 1 end) as total, count(case when attendance_date = date(now()) then (case when attendance = 'yes' then 1 end) end) as totalt,
      firstname AS fname, lastname AS lname
      FROM `members_attendance` GROUP BY fname, lname";
      $m_r = \DB::select($sql);

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
//count(case when sex = 'male' then 1 end) AS male, count(case when sex = 'female' then 1 end) AS female,
//count(case when marital_status = 'single' then 1 end) AS single, count(case when marital_status = 'married' then 1 end) AS married
