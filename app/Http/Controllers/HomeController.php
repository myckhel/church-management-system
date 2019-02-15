<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;
use Mapper;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $c_types = \App\CollectionsType::getTypes();
         $eventsall =  \App\Announcement::leftjoin('users',"announcements.branchcode", '=','users.branchcode')->where('announcements.branchcode', $user->branchcode)->orWhere('announcements.branch_id', $user->branchcode)->orderBy('announcements.id', 'desc')->get();
        $members = \App\Member::where('branch_id', $user->branchcode)->get();
        $events = Event::where('branch_id', $user->branchcode)->orderBy('date', 'asc')->get();
        $options = DB::table('head_office_options')->where('HOID',1)->first();
        $num_members = $user->isAdmin() ? DB::table('members')->count() : DB::table('members')->where('branch_id', \Auth::user()->branchcode)->count();
        $num_pastors = $user->isAdmin() ? DB::table('members')->where('position', 'pastor')->orWhere('position', 'senior pastor')->count() : DB::table('members')->where('position', 'pastor')->orWhere('position', 'senior pastor')->where('branch_id', \Auth::user()->branchcode)->count();
        $num_workers = $user->isAdmin() ? DB::table('members')->where('position', 'worker')->count() : DB::table('members')->where('position', 'worker')->where('branch_id', \Auth::user()->branchcode)->count();
        $total = ['workers' => $num_workers, 'pastors' => $num_pastors, 'members' => $num_members];
        $currency = \App\Options::getOneBranchOption('currency', \Auth::user());
        // $currency = \App\Options::where('name', 'currency')->first();
        $currency = DB::table('country')->where('currency_symbol', isset($currency->value) ? $currency->value : '₦')->first();
        //$events = Event::all();
        // get due savings
        $dueSavings = \App\CollectionCommission::dueSavings($user);
        // get the commission percentage
        $percentage = (int)(\App\Options::getLatestCommission())->value;
        //
        $allDueSavings = \App\CollectionCommission::calculateUnsettledCommission(true);

        $branches = \App\User::all();

        Mapper::map(6.5437548, 3.5859518, ['center' => [6.5437548, 3.8859518], 'title' => "$user->branchname", 'eventClick' => 'console.log("left click");'])
        ->informationWindow(6.5437548, 3.5859518, "<div class='panel panel-primary'>$user->branchname</div>", ['open' => true, 'maxWidth'=> 300,'markers' => ['animation' => 'DROP']]);
        $i = 0;
        foreach ($branches as $key => $branch) {
          // code...
          if ($branch->branchname != $user->branchname) {
            $lat = (float) 6.5437548 + (0.100 + ( ( (float) ("0.".(string) ( mt_rand(5,20) * mt_rand(0,7) ) ) ) ) );
            $lon = (float) 3.3859518 + (0.100 + ( ( (float) ("0.".(string) ( mt_rand(5,20) * mt_rand(0,7) ) ) ) ) );
            // if ($i ==3) {
            //   // code...
            //   dd($lat,$lon, (float) ("0.".(string) mt_rand(400,900)));
            // }
            Mapper::marker($lat, $lon, ['title' => "$branch->branchname"])
            ->informationWindow($lat, $lon, "<div class='panel panel-primary'>$branch->branchname</div>",
            ['open' => true, 'maxWidth'=> 300,'markers' => ['animation' => 'DROP']]);
            // code...
            $i++;
          }
        }
        // map area
        // Mapper::map(6.5437548, 3.5859518, ['center' => [6.5437548, 3.8859518], 'title' => 'Marker 1', 'eventClick' => 'console.log("left click");'])
        // ->informationWindow(6.5437548, 3.5859518, "<div class='panel panel-primary'>$user->branchname</div>", ['open' => true, 'maxWidth'=> 300,'markers' => ['animation' => 'DROP']]);
        // Mapper::marker(6.5437548, 3.6859518, ['title' => 'Marker 2']);
        // Mapper::marker(6.5437548, 3.7859518, ['title' => 'Marker 3', 'symbol' => 'circle', 'scale' => 1000]);
        // Mapper::marker(6.5437548, 3.8859518, ['title' => 'Marker 4', 'markers' => ['symbol' => 'circle', 'scale' => 1000, 'animation' => 'DROP']]);
        // ed map area
        return view('dashboard.index', compact('events','options','total','members', 'eventsall', 'c_types', 'currency', 'dueSavings', 'percentage', 'allDueSavings'));
    }

    public function gallery()
    {
      return view('gallery.gallery');
    }
}
