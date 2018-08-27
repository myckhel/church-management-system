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
      return view('report.membership', compact('reports'));
    }

    public function collections(){
      $user = \Auth::user();

      $sql = "SELECT count(id) AS total_collections, count(case when date_collected = date(now()) then 1 end) AS todays_collections,
      SUM(special_offering) AS so, SUM(seed_offering) AS sdo, SUM(offering) AS o, SUM(donation) AS d, SUM(tithe) AS t, SUM(first_fruit) AS ff,
      SUM(covenant_seed) AS cs, SUM(love_seed) AS ls, SUM(sacrifice) AS s, SUM(thanksgiving) AS tg, SUM(thanksgiving_seed) AS tgs, SUM(other) AS ot, SUM(amount) AS total
      FROM `collections` WHERE branch_id = ".$user->branchcode."";
      $reports = \DB::select($sql);

      $sql = "SELECT SUM(offering + tithe + special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) as total,
      fname AS fname, lname AS lname
      FROM `members_collection` WHERE branch_id = '".$user->branchcode."' GROUP BY fname, lname";
      $m_r = \DB::select($sql);

      $sql = "SELECT SUM(c.offering + c.tithe + c.special_offering + c.seed_offering + c.donation + c.first_fruit + c.covenant_seed + c.love_seed + c.sacrifice + c.thanksgiving + c.thanksgiving_seed + c.other) as ctotal,
      SUM(m.offering + m.tithe + m.special_offering + m.seed_offering + m.donation + m.first_fruit + m.covenant_seed + m.love_seed + m.sacrifice + m.thanksgiving + m.thanksgiving_seed + m.other) as mtotal,
      branchname AS name
      FROM members_collection m, collections c JOIN users u ON branch_id = u.branchcode GROUP BY name";
      $ad_rep= \DB::select($sql);

      return view('report.collections', compact('reports', 'm_r', 'ad_rep'));
    }
}
//count(case when sex = 'male' then 1 end) AS male, count(case when sex = 'female' then 1 end) AS female,
//count(case when marital_status = 'single' then 1 end) AS single, count(case when marital_status = 'married' then 1 end) AS married
