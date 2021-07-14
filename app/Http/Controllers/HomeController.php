<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use DB;
use Paystack;
use App\Setting;
use Dcblogdev\Countries\Facades\Countries;
// use Mapper;

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
      if (Setting::notSet()) {
        return view('setup');
      }
        $user = \Auth::user();
        $c_types = \App\CollectionsType::getTypes();
         $eventsall =  \App\Announcement::leftjoin('users',"announcements.branch_id", '=','users.id')->where('announcements.branch_id', $user->id)->orWhere('announcements.branch_id', $user->id)->orderBy('announcements.id', 'desc')->get();
        $members = \App\Member::where('branch_id', $user->id)->get();
        $events = Event::where('branch_id', $user->id)->orderBy('date', 'asc')->get();
        // dd($options);
        $num_members = $user->isAdmin() ? DB::table('members')->count() : DB::table('members')->where('branch_id', \Auth::user()->id)->count();
        $num_pastors = $user->isAdmin() ? DB::table('members')->where('position', 'pastor')->orWhere('position', 'senior pastor')->count() : DB::table('members')->where('position', 'pastor')->orWhere('position', 'senior pastor')->where('branch_id', \Auth::user()->id)->count();
        $num_workers = $user->isAdmin() ? DB::table('members')->where('position', 'worker')->count() : DB::table('members')->where('position', 'worker')->where('branch_id', \Auth::user()->id)->count();
        $total = ['workers' => $num_workers, 'pastors' => $num_pastors, 'members' => $num_members];
        $currencies = Countries::all();
        $options = Setting::findName(['logo', 'name']);
        // $currencies = findName(['logo', 'name'], $options);
        $currency = auth()->user()->getCurrency();
        // get due savings
        $dueSavings = \App\CollectionCommission::dueSavings($user);
        // get the commission percentage
        $percentage = \App\Options::getLatestCommission();
        $percentage = $percentage ? (int)$percentage->value : 0;
        //
        $allDueSavings = \App\CollectionCommission::calculateUnsettledCommission(true);

        $branches = \App\User::all();


        // Mapper::map(6.5437548, 3.5859518, ['center' => [6.5437548, 3.8859518], 'title' => "$user->branchname", 'eventClick' => 'console.log("left click");'])
        // ->informationWindow(6.5437548, 3.5859518, "<div class='panel panel-primary'>$user->branchname</div>", ['open' => true, 'maxWidth'=> 300,'markers' => ['animation' => 'DROP']]);
        // $i = 0;
        // foreach ($branches as $key => $branch) {
        //   // code...
        //   if ($branch->branchname != $user->branchname) {
        //     $lat = (float) 6.5437548 + (0.100 + ( ( (float) ("0.".(string) ( mt_rand(5,20) * mt_rand(0,7) ) ) ) ) );
        //     $lon = (float) 3.3859518 + (0.100 + ( ( (float) ("0.".(string) ( mt_rand(5,20) * mt_rand(0,7) ) ) ) ) );
        //     // if ($i ==3) {
        //     //   // code...
        //     //   dd($lat,$lon, (float) ("0.".(string) mt_rand(400,900)));
        //     // }
        //     $id = $i + 2;
        //     Mapper::
        //     // marker($lat, $lon, ['title' => "$branch->branchname"])
        //     informationWindow($lat, $lon, "<div class='panel panel-primary'>$branch->branchname</div>",
        //     ['maxWidth'=> 300, 'eventMouseOver' => "infowindow_{$id}.open(map,marker_{$id});", 'eventMouseOut' => "infowindow_{$id}.close();",
        //       'draggable' => true,
        //      'markers' => ['animation' => 'DROP', 'title' => "$branch->branchname"]]);
        //     // code...
        //     $i++;
        //   }
        // }
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
