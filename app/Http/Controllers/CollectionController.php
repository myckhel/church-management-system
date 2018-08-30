<?php

namespace App\Http\Controllers;

use App\Collection;
use Illuminate\Http\Request;
use DB;

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
        $members = \App\Member::where('branch_id', $user->branchcode)->get();
        //$by_member = DB::table('members_collection')->where('branch_id', $user->branchcode)->select();
        return view('collection.offering', compact('members'));
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

        $offer = $request;
        $this->validate($request, [
            'branch_id' => 'required|string|min:0',
            //'amount' => 'required|numeric|min:0',
            'date_collected' => 'required|string|min:0',
            'type' => 'required|string|min:0',

        ]);



        // register collection
        //$collection = new Collection(array(
        $value = [
            'branch_id' => $user = \Auth::user()->branchcode,
            //'amount' => $request->get('amount'),
            'date_collected' => date('Y-m-d',strtotime($offer['date_collected'])),
            'type' => $offer['type'],
            'special_offering' => $offer['special_offering'],
            'seed_offering' => $offer['seed_offering'],
            'offering' => $offer['offering'],
            'donation' => $offer['donation'],
            'tithe' => $offer['tithe'],
            'first_fruit' => $offer['first_fruit'],
            'covenant_seed' => $offer['covenant_seed'],
            'love_seed' => $offer['love_seed'],
            'sacrifice' => $offer['sacrifice'],
            'thanksgiving' => $offer['thanksgiving'],
            'thanksgiving_seed' => $offer['thanksgiving_seed'],
            'other' => $offer['other'],
            'amount' => $offer['amount'],
        ];
        DB::table('collections')->insert($value);
        //$collection->save();

        return redirect()->route('collection.offering')->with('success', 'collection successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function edit(Collection $collection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        //
    }
    /**
     * Show Collection report.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function report()
    {

        //$sql = 'SELECT SUM(amount) AS amount, MONTH(date_collected) AS month, count(*) AS entries FROM `collections` WHERE branch_id = '.\Auth::user()->branchcode.' GROUP BY month';
        //$collections = \DB::select($sql);
        $code = \Auth::user()->branchcode;
        $sql = "SELECT * FROM collections WHERE branch_id = " . $code . "";
        $collections = \DB::select($sql);

        return view('collection.report', compact('collections'));
    }

    public function member(Request $request){
      $offer = $request->except(['_token']);
      for($i = 0; $i < count($offer['member_id']); $i++) {
        // code...
        $value = [
        'member_id' => $offer['member_id'][$i],
        'title' => $offer['title'][$i],
        'fname' => $offer['fname'][$i],
        'lname' => $offer['lname'][$i],
        'special_offering' => $offer['special_offering'][$i],
        'seed_offering' => $offer['seed_offering'][$i],
        'date_added' => date('Y-m-d',strtotime($offer['date'])),
        'offering' => $offer['offering'][$i],
        'donation' => $offer['donation'][$i],
        'tithe' => $offer['tithe'][$i],
        'first_fruit' => $offer['first_fruit'][$i],
        'covenant_seed' => $offer['covenant_seed'][$i],
        'love_seed' => $offer['love_seed'][$i],
        'sacrifice' => $offer['sacrifice'][$i],
        'thanksgiving' => $offer['thanksgiving'][$i],
        'thanksgiving_seed' => $offer['thanksgiving_seed'][$i],
        'other' => $offer['other'][$i],
        'branch_id' => $offer['branch_id'][$i],
        'date_submitted' => now(),
        ];
            DB::table('members_collection')->insert($value);
      }
      /*DB::table("members_collections")->(function(){
        foreach ($request as $offer) {
          // code...

        }
      });*/
      return redirect()->back()->with(['success' => 'Successful']);
    }
    public function analysis()
    {
        //
        $user = \Auth::user();
        $sql = 'SELECT SUM(tithe) AS tithe, SUM(offering) AS offering, SUM(special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS other,
        MONTH(date_collected) AS month FROM `collections` WHERE YEAR(date_collected) = YEAR(CURDATE()) AND branch_id = '.$user->branchcode.' GROUP BY month';
        $collections = \DB::select($sql);

        //$sql = 'SELECT SUM(special_offering + seed_offering + offering) AS total, MONTH(date_collected) AS month FROM `collections` WHERE branch_id = '.$user->branchcode.'  GROUP BY month';
        //$attendances2 = \DB::select($sql);

        $sql = 'SELECT SUM(tithe) AS tithe, SUM(offering) AS offering, SUM(special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS other,
        DAYOFWEEK(date_collected) AS day FROM `collections` WHERE date_collected >= DATE(NOW() + INTERVAL - 7 DAY) AND WEEK(date_collected) = WEEK(DATE(NOW())) AND branch_id = '.$user->branchcode.' GROUP BY day';
        $collections2 = \DB::select($sql);

        $sql = 'SELECT SUM(tithe) AS tithe, SUM(offering) AS offering, SUM(special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS other,
        WEEK(date_collected) AS week FROM `collections` WHERE YEAR(date_collected) = YEAR(CURDATE()) AND date_collected >= DATE(NOW() + INTERVAL - 10 WEEK) AND branch_id = '.$user->branchcode.' GROUP BY week';
        $collections3 = \DB::select($sql);

        //$sql = 'SELECT SUM(special_offering + seed_offering + offering) AS total, MONTH(date_collected) AS month FROM `collections` WHERE branch_id = '.$user->branchcode.'  GROUP BY month';
        //$attendances4 = \DB::select($sql);
        $sql = 'SELECT SUM(tithe) AS tithe, SUM(offering) AS offering, SUM(special_offering + seed_offering + donation + first_fruit + covenant_seed + love_seed + sacrifice + thanksgiving + thanksgiving_seed + other) AS other,
        YEAR(date_collected) AS year FROM `collections` WHERE date_collected >= DATE(NOW() + INTERVAL - 10 YEAR) AND branch_id = '.$user->branchcode.' GROUP BY year';
        $collections4 = \DB::select($sql);

        return view('collection.analysis', compact('collections','collections2','collections3','collections4'));
    }
}
