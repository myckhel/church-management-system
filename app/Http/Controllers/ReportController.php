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
      FROM `members` WHERE branch_id = ".$user->branchcode."";
      $reports = \DB::select($sql);

      //Year of reg
      $sql = "SELECT COUNT(case when sex = 'male' then 1 end) AS male, COUNT(case when sex = 'female' then 1 end) AS female,
      YEAR(created_at) AS year FROM `members` WHERE created_at >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = ".$user->branchcode." GROUP BY year";
      $r_years = \DB::select($sql);

      return view('report.membership', compact('reports', 'r_years'));
    }

    public function collections(){
      $user = \Auth::user();

      $sql = "SELECT SUM(offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS total_collections,
      SUM(case when date_collected = date(now()) then (offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) end) AS todays_collections,
      SUM(special_offering) AS so, SUM(seed_offering) AS sdo, SUM(offering) AS o, SUM(donation) AS d, SUM(tithe) AS t, SUM(first_fruit) AS ff,
      SUM(covenant_seed) AS cs, SUM(love_seed) AS ls, SUM(sacrifice) AS s, SUM(thanksgiving) AS tg, SUM(thanksgiving_seed) AS tgs, SUM(other) AS ot, SUM(amount) AS total
      FROM `collections` WHERE branch_id = ".$user->branchcode."";
      $reports = \DB::select($sql);

      $sql = "SELECT SUM(offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) as total,
      fname AS fname, lname AS lname
      FROM `members_collection` WHERE branch_id = '".$user->branchcode."' GROUP BY fname, lname";
      $m_r = \DB::select($sql);

      $sql = "SELECT SUM(c.offering + c.tithe + c.special_offering + c.seed_offering + c.donation + c.first_fruit + c.covenant_seed + c.love_seed + c.sacrifice + c.thanksgiving + c.thanksgiving_seed + c.other) as ctotal,
      branchname AS name
      FROM collections c JOIN users u ON branch_id = u.branchcode GROUP BY name";
      $ad_rep= \DB::select($sql);

      //SUM(m.offering + m.tithe + m.special_offering + m.seed_offering + m.donation + m.first_fruit + m.covenant_seed + m.love_seed + m.sacrifice + m.thanksgiving + m.thanksgiving_seed + m.other) as mtotal,
      //FROM members_collection m, collections c JOIN users u ON branch_id = u.branchcode GROUP BY name";

      //year
      $sql = 'SELECT SUM(tithe) AS tithe, SUM(offering) AS offering, SUM(special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS other,
      YEAR(date_collected) AS year FROM `collections` WHERE date_collected >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '.$user->branchcode.' GROUP BY year';
      $c_years = \DB::select($sql);

      return view('report.collections', compact('reports', 'm_r', 'ad_rep', 'c_years'));
    }

    public function attendance(){
      $user = \Auth::user();

      $sql = "SELECT SUM(female + male + children) AS total_attendance, SUM(case when attendance_date = date(now()) then (female + male + children) end) AS todays_attendance,
      SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, SUM(children + male + female) AS total
      FROM `attendances` WHERE branch_id = ".$user->branchcode."";
      $reports = \DB::select($sql);

      $sql = "SELECT count(case when attendance = 'yes' then 1 end) as total,
      firstname AS fname, lastname AS lname
      FROM `members_attendance` WHERE branch_id = '".$user->branchcode."' GROUP BY fname, lname";
      $m_r = \DB::select($sql);

      $sql = "SELECT SUM(a.male + a.female + a.children) as atotal,
      count(case when attendance = 'yes' then 1 end) as mtotal,
      branchname AS name
      FROM members_attendance m, attendances a JOIN users u ON branch_id = u.branchcode GROUP BY name";
      $ad_rep= \DB::select($sql);

      //Year
      $sql = 'SELECT SUM(male) AS male, SUM(female) AS female, SUM(children) AS children,
      YEAR(attendance_date) AS year FROM `attendances` WHERE attendance_date >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '.$user->branchcode.' GROUP BY year';
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

      $sq = "SELECT branch_id, COUNT(branch_id), branchname FROM members LEFT JOIN users u ON branch_id = u.branchcode GROUP BY branch_id, branchname";
      $runs = \DB::select($sq);

      $sql = "SELECT COUNT(case when sex = 'male' then 1 end) AS male, COUNT(case when sex = 'female' then 1 end) as female,
      branchname AS name,
      YEAR(m.created_at) AS year FROM members m LEFT JOIN users u ON branch_id = u.branchcode WHERE m.created_at >= DATE(NOW() + INTERVAL - 10 YEAR) GROUP BY year, name";
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
      SUM(special_offering) AS so, SUM(seed_offering) AS sdo, SUM(offering) AS o, SUM(donation) AS d, SUM(tithe) AS t, SUM(first_fruit) AS ff,
      SUM(covenant_seed) AS cs, SUM(love_seed) AS ls, SUM(sacrifice) AS s, SUM(thanksgiving) AS tg, SUM(thanksgiving_seed) AS tgs, SUM(other) AS ot, SUM(amount) AS total
      FROM `collections` ";
      $reports = \DB::select($sql);

      $sql = "SELECT SUM(offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) as total,
      fname AS fname, lname AS lname
      FROM `members_collection` GROUP BY fname, lname";
      $m_r = \DB::select($sql);

      $sql = "SELECT SUM(c.offering + c.tithe + c.special_offering + c.seed_offering + c.donation + c.first_fruit + c.covenant_seed + c.love_seed + c.sacrifice + c.thanksgiving + c.thanksgiving_seed + c.other) as ctotal,
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
      SUM(male) AS male, SUM(female) AS female, SUM(children) AS children, SUM(children + male + female) AS total
      FROM `attendances` ";
      $reports = \DB::select($sql);

      $sql = "SELECT count(case when attendance = 'yes' then 1 end) as total,
      firstname AS fname, lastname AS lname
      FROM `members_attendance` GROUP BY fname, lname";
      $m_r = \DB::select($sql);

      $sql = "SELECT SUM(a.male + a.female + a.children) as atotal,
      count(case when attendance = 'yes' then 1 end) as mtotal,
      branchname AS name
      FROM members_attendance m, attendances a JOIN users u ON branch_id = u.branchcode GROUP BY name";
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
