<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use DataTables;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = \Auth::user();
        $members = \App\Member::where('branch_id', $user->id)->get();
        $services = $user->getServiceTypes();
        $collections = $user->getCollectionTypes();
        $currency = $user->getCurrency();
        return view('collection.offering', compact('members', 'services', 'collections', 'currency'));
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
      $branch = \Auth::user();
      // validate date
      $split_date_array = explode("-",date('Y-m-d',strtotime($request->get('date_collected'))));
      if (Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->isFuture())
      {
          return response()->json(['status' => false, 'text' => "**You can't save collection for a future date!"]);
      }
      // check if collection has already been saved for that date
      $savings = \App\Collection::getByDate($branch, $request->get('date_collected'));
      if ($savings > 0){
          return response()->json(['status' => false, 'text' => "**Branch Collection for {$this->get_date_in_words(date('Y-m-d',strtotime($request->get('date_collected'))))} has been saved before!"]);
      }

      $c_type = \App\CollectionsType::all();
      foreach ($c_type as $key => $type) {
        // save collection
        $name = $type->name;
        $savings = \App\Collection::create([
          'branch_id' => $branch->id,
          'collections_types_id' => $type->id,
          'service_types_id' => $request->type,
          'amount' => $request->$name,
          'date' => date('Y-m-d',strtotime($request->date_collected))
        ]);
      }
      // set the collection as due commission
      \App\CollectionCommission::setCollection($savings);
      return response()->json(['status' => true, 'text' => 'Branch Collection Successfully Saved']);
    }

    public function member(Request $request){
      $branch = \Auth::user();
      // validate date
      $split_date_array = explode("-",date('Y-m-d',strtotime($request->get('date_collected'))));
      if (Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->isFuture())
      {
          return response()->json(['status' => false, 'text' => "**You can't save collection for a future date!"]);
      }
      // check if collection has already been saved for that date
      $savings = \App\MemberCollection::getByDate($branch, $request->get('date_collected'));
      if ($savings > 0){
          return response()->json(['status' => false, 'text' => "**Member Collection for {$this->get_date_in_words(date('Y-m-d',strtotime($request->get('date_collected'))))} has been saved before!"]);
      }

      $c_type = \App\CollectionsType::all();
      foreach ($c_type as $key => $type) {
        // code...
        $name = $type->name;
        for($i = 0; $i < count($request['member_id']); $i++){
          $savings = \App\MemberCollection::create([
            'branch_id' => $branch->id,
            'member_id' => $request['member_id'][$i],
            'collections_types_id' => $type->id,
            'service_types_id' => $request->type,
            'amount' => $request->$name[$i],
            'date_collected' => date('Y-m-d',strtotime($request->date_collected))
          ]);
        }
      }

      return response()->json(['status' => true, 'text' => 'Member Collection Successfully Saved']);
    }

    /**
     * Show Collection report.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function report()
    {
      $code = \Auth::user()->id;
      $user = \Auth::user();
      $c_types = $user->getCollectionTypes();
      \App\CollectionsType::disFormatStringAll($c_types);
      return view('collection.report', compact('c_types'));
    }

    private function get_date_in_words($date)
    {
        $split_date_array = explode("-",$date);
        return Carbon::createFromDate($split_date_array[0], $split_date_array[1], $split_date_array[2])->format('l, jS \\of F Y');
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

    public function calculateSingleTotal($savings, $type){
      $obj = [];
      foreach ($savings as $key => $value) {
        switch ($type) {
          case 'day': $t = 'D'; break;
          case 'week': $t = 'W'; break;
          case 'month': $t = 'M'; break;
          case 'year': $t = 'Y'; break;
        }
        $date = date($t, strtotime($value->date_collected));
        $year = (int)substr($value->date_collected, 0,4);
        foreach ($value->amounts as $ke => $valu) {
          if (isset($obj[$date])) {
            if (isset($obj[$date]->$ke)) {  $obj[$date]->$ke += $valu; } else { $obj[$date]->$ke = $valu; }
          } else {
            $obj[$date] = new \stdClass();
            $obj[$date]->$ke = $valu;
            $obj[$date]->$type = $date;
          }
        }
      }
      return $obj;
    }

    public function analysis()
    {
      $user = \Auth::user();
      $savings = \App\Collection::rowToColumn(\App\Collection::where('branch_id', $user->id)->get());
      $mSavings = \App\MemberCollection::rowToColumn(\App\MemberCollection::where('branch_id', $user->id)->get());
      $c_types = \App\CollectionsType::getTypes();

      $collections = $this->calculateSingleTotal($savings, 'month');
      $collections2 = $this->calculateSingleTotal($savings, 'day');
      $collections3 = $this->calculateSingleTotal($savings, 'week');
      $collections4 = $this->calculateSingleTotal($savings, 'year');

      return view('collection.analysis', compact('collections','collections2','collections3','collections4', 'c_types'));
    }

    public function yData($collection,$c_types, $value){
      $y = new \stdClass();
      $y->y = $value;  $i = 1; $size = sizeof($c_types);
      foreach ($c_types as $key => $value) {
        $name = $value->name;
        $amount = isset($collection->$name) ? $collection->$name : 0;
        $y->$name = $amount;
        $i++;
      }
      return $y; //. "},";
    }

    public function noData($c_types, $value){
        $y = new \stdClass();
        $y->y = $value; $i=1;
        foreach ($c_types as $key => $value) {
          $name = $value->name;
          $y->$name = 0;
          $i++;
        }
        return $y;//. "},";
      }

    public function test (Request $request){
      $user = \Auth::user();
      $c_types = \App\CollectionsType::getTypes();
      $savings = $request->show == 'true' ? Collection::rowToColumn(Collection::all()) : Collection::rowToColumn($user->collections()->get());
      $interval = $request->interval;
      $group = $request->group;
      $months = [];
      for ($i = $interval-1; $i >= 0; $i--) {
        $t = 'M';
        switch ($group) {
          case 'day': $t = 'D'; break;
          case 'week': $t = 'W'; break;
          case 'month': $t = 'M'; break;
          case 'year': $t = 'Y'; break;
        }
        $dateOrNot = $group == 'month' ? date('Y-m-01') : '';
        $months[$i] = date($t, strtotime($dateOrNot. "-$i $group")); //1 week ago
      }
      $collections2 = $this->calculateSingleTotal($savings, $group);
      $dt = (function($savings, $c_types, $months, $group){
        $output = [];
        foreach ($months as $key => $value) {
    		$month = $value; $found = false;
    		foreach ($savings as $collection) {
    			if($value == $collection->$group){
    				$found = true;
            $output[] = $this->yData($collection, $c_types, $value);
    			}
    		}
    		if(!$found){
    			$output[] = $this->noData($c_types, $value);
            //"', 1: 0, 2: 0, 3: 0, 4: 0, 5: 0},";
    		}
    	}
      return $output;
    })($collections2, $c_types, $months, $group);
      // dd($dt);
      return response()->json($dt);
    }

  public function history(Request $request){
    $branch = \Auth::user();
    $history = collect(new \App\Collection);//[];
    if (isset($request->branch)) {
      $history = \App\Collection::rowToColumn(\App\Collection::where('branch_id', $branch->id)
      ->with('collections_types')->with('service_types')->get());
    }
    if(isset($request->member)) {
      $history = \App\MemberCollection::rowToColumn(\App\MemberCollection::where('branch_id', $branch->id)
      ->with('member')->with('collections_types')->with('service_types')->get());

    }
    return DataTables::of($history)->make(true);
  }

  public function collectionStats(Request $request){
    $c_types = \App\CollectionsType::getTypes();
    $user = \Auth::user();

    $collections = \App\Collection::rowToColumn(\App\Collection::selectRaw("*, MONTH(date) AS month")
    ->with('collections_types')->with('service_types')
    // ->leftJoin('collections_types', 'collections_types.id', 'savings.collections_types_id')
    ->whereRaw("date > DATE(now() + INTERVAL - 12 MONTH)")->where("collections.branch_id", $user->id)
    ->groupBy("date", "month", "amount", 'collections.id', 'collections.branch_id', 'collections.collections_types_id',
     'collections.service_types_id', 'collections.created_at', 'collections.updated_at')
    //
    ->get());
    // dd($collections);
    $toArray = (function ($collections){ $toArray = [];
        foreach ($collections as $key => $value) {
          // dd(array_merge($value->original, (array) $value->amounts));
          array_push($toArray, array_merge(['month' => $value->original['month']], (array) $value->amounts));
     }
     return $toArray;
    })($collections);
    // return response()->json($toArray);

    // dd($collections);
    // sum and group month in collection
    // declare temporary group collection
    $tempGroup = [];
    // each collections item filter only cared properties and add to new array
    foreach ($toArray as $key => $collection) {

      $monthNum = $collection['month'];
      foreach ($c_types as $collectionType) {
        //
        if (!isset($tempGroup[$monthNum])) {
          $tempGroup[$monthNum] = [];
        }

        if (!isset($tempGroup[$monthNum][$collectionType->name])){
          $tempGroup[$monthNum][$collectionType->name] = 0;
          $tempGroup[$monthNum]['month'] = $collection['month'];
        }

        $tempGroup[$monthNum][$collectionType->name] += isset($collection[$collectionType->name]) ? $collection[$collectionType->name] : 0;
      }
    }

    $collections = $tempGroup;
    // dd($tempGroup);

    $group = 'month';
    $months = [];
    $interval = 0;
    $ii = 11;
    // $c_types = Array('male', 'female', 'children');
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

    $dt = (function($collections, $c_types, $months, $group){
      $output = [];
      foreach ($months as $key => $value) {
      $month = $value; $found = false;
      foreach ($collections as $date => $collection) {
        // dd($member->$group,$month);
        $m;
        switch ($collection[$group]) {
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
          $output[] = $this->flotY($collection, $c_types, $key);
        }
      }
      if(!$found){
        $output[] = $this->flotNoData($c_types, $key);
      }
    }
    return $output;
  })($collections, $c_types, $months, $group);

  return $dt;
  }

  private function flotY($collection, $c_types, $value){
    $y = [];
    $y['month'] = $value;  $i = 1; $size = sizeof($c_types);
    foreach ($c_types as $key => $value) {
      $name = $value->name;
      $amount = isset($collection[$name]) ? $collection[$name] : 0;
      $y[$name] = $amount;
      $i++;
    }
    return $y;
  }

  private function flotNoData($c_types, $value){
    $y = [];
    $y['month'] = $value; $i=1;
    foreach ($c_types as $key => $value) {
      $name = $value->name;
      $y[$name] = 0;
      $i++;
    }
    return $y;//. "},";
  }
}
