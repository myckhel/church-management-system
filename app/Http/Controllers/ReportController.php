<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function membership(){
      $user = \Auth::user();

      /*select distributor_id,
    count(*) total,
    sum(case when level = 'exec' then 1 else 0 end) ExecCount,
    sum(case when level = 'personal' then 1 else 0 end) PersonalCount
from yourtable
group by distributor_id*/

      $sql = "SELECT count(id) AS total_member, count(case when sex = 'male' then 1 end) AS male, count(case when sex = 'female' then 1 end) AS female,
      count(case when marital_status = 'single' then 1 end) AS single, count(case when marital_status = 'married' then 1 end) AS married
      FROM `members` WHERE branch_id = ".$user->branchcode."";
      $reports = \DB::select($sql);
      return view('report.membership', compact('reports'));
    }
}
