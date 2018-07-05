<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
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
            'branch_id' => $request->get('branch_id'),

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
    public function destroy(Event $event)
    {
        //
    }
}
