<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Event;
use App\Http\Requests\AttendanceRequest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $request->validate([
        'orderBy'     => '',
        'search'      => 'min:3',
        'order'       => 'in:asc,desc',
        'pageSize'    => 'int',
      ]);
      $church   = $request->church();
      $pageSize = $request->pageSize;
      $order    = $request->order;
      $orderBy  = $request->orderBy;
      $search   = $request->search;

      return $church->attendances()->search($search)
      ->with(['service:services.id,name'])
      ->orderBy($orderBy ?? 'id', $order ?? 'desc')
      ->paginate($pageSize);
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
    public function store(AttendanceRequest $request)
    {
      $request->validate([]);
      $church     = $request->church();
      $event      = Event::findOrFail($request->event_id);
      $this->authorize('view', $event);

      return $church->attendances()->create($request->only([
        'female', 'male', 'children', 'event_id'
      ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
      $this->authorize('view', $attendance);
      return $attendance;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(AttendanceRequest $request, Attendance $attendance)
    {
      $request->validate([]);
      $this->authorize('update', $attendance);
      if ($request->event_id) {
        $event      = Event::findOrFail($request->event_id);
        $this->authorize('view', $event);
      }
      $attendance->update(array_filter($request->only($attendance->getFillable())));
      return $attendance;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
      $this->authorize('delete', $attendance);
      $attendance->delete();
      return ['status' => true];
    }
}
