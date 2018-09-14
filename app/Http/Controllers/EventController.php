<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $events = Event::where('branch_id',$user->branchcode)->get();
        return view('calendar.index', compact('events'));
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
        $this->validate($request, [
            'branch_id' => 'required|numeric|min:0',
            'title' => 'required|string|min:0',
            'location' => 'required|string|min:0',
            'time' => 'required|string|min:0',
            'by_who' => 'required|string|min:0',
            'date' => 'required|date ',
        ]);

        // register attendance
        $event = new Event([
            'title' => $request->get('title'),
            'location' => $request->get('location'),
            'time' => $request->get('time'),
            'by_who' => $request->get('by_who'),
            'details' => $request->get('details'),
            'branch_id' => $user = \Auth::user()->branchcode,

            // convert date to acceptable mysql format
            'date' => date('Y-m-d',strtotime($request->get('date'))),
        ]);
        $event->save();

        return redirect()->route('calendar')->with('status', 'Event successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $event = Event::find($id);
        $event->delete();
        return redirect()->back()->with('status','Event Successfully Deleted');
      }

      public function news()
     {
        $user = \Auth::user();
           //$contact =  \App\User::get();

        $contact =  \App\User::where('branchcode' , '!=' , $user->branchcode)->get();
       return view('notification.index',compact('contact'));
     }



        public function add(Request $request)
   {
       $this->validate($request, [
           'message' => 'required|string|min:0',
           'by_who' => 'required|string|min:0',
           'date' => 'required|date ',
       ]);
         $split_sdate_array = explode("-", date('Y-m-d',strtotime($request->get('sdate'))));
       $split_date_array = explode("-",date('Y-m-d',strtotime($request->get('date'))));
       
       if(Carbon::createFromDate($split_sdate_array[0], $split_sdate_array[1], $split_sdate_array[2])->isPast() ||  $split_date_array < $split_sdate_array){

     $request->session()->flash('message', 'Announcement Not saved Only Future Date Allowed!');
       $request->session()->flash('alert-class', 'alert-danger');
       return redirect()->route('notification');
     }
else{
    foreach ($request->to as $to)
    {
       // register attendance

           $by_who = $request->get('by_who');
            $branchcode = $to;
           $details = $request->get('message');
           $time = $request->get('time');
           $stime = $request->get('stime');
           $branch_id = $user = \Auth::user()->branchcode;

           // convert date to acceptable mysql format
           $sdate = date('Y-m-d',strtotime($request->get('sdate')));
               $date = date('Y-m-d',strtotime($request->get('date')));




   // return redirect()->route('notification')->with('status', 'Announcement Not saved Only Future Date Allowed');

 $sql="INSERT INTO announcements (branch_id,branchcode,details,by_who,start_date,stop_date,start_time,stop_time) VALUES ('$branch_id','$branchcode','$details','$by_who','$date','$sdate','$time','$stime')";
     \DB::insert($sql);

   }
      $request->session()->flash('message', 'Announcement successfully saved!');
       $request->session()->flash('alert-class', 'alert-success');
          return redirect()->route('notification');
}

   }

}
