<?php

namespace App\Http\Controllers;

use App\Models\EventGiving;
use App\Models\Giving;
use App\Models\Event;
use Illuminate\Http\Request;

class EventGivingController extends Controller
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

      return $church->eventGivings()->search($search)
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
    public function store(Request $request)
    {
      $request->validate([
        'amount'    => 'required|numeric',
        'event_id'  => 'required|int',
        'giving_id' => 'required|int',
      ]);
      $church     = $request->church();
      $event      = Event::findOrFail($request->event_id);
      $this->authorize('view', $event);
      $giving      = Giving::findOrFail($request->giving_id);
      $this->authorize('view', $giving);

      return $church->eventGivings()->create($request->only([
        'amount', 'event_id', 'giving_id',
      ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EventGiving  $eventGiving
     * @return \Illuminate\Http\Response
     */
    public function show(EventGiving $eventGiving)
    {
      $this->authorize('view', $eventGiving);
      return $eventGiving;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EventGiving  $eventGiving
     * @return \Illuminate\Http\Response
     */
    public function edit(EventGiving $eventGiving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EventGiving  $eventGiving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EventGiving $eventGiving)
    {
      $this->authorize('update', $eventGiving);
      $request->validate([
        'amount'    => 'required|numeric',
        'event_id'  => 'required|int',
        'giving_id' => 'required|int',
      ]);
      if ($request->event_id) {
        $event      = Event::findOrFail($request->event_id);
        $this->authorize('view', $event);
      }
      if ($request->giving_id) {
        $giving      = Giving::findOrFail($request->giving_id);
        $this->authorize('view', $giving);
      }
      $user     = $request->user();
      $eventGiving->update(array_filter($request->only($eventGiving->getFillable())));
      return $eventGiving;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EventGiving  $eventGiving
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventGiving $eventGiving)
    {
      $this->authorize('delete', $eventGiving);
      $eventGiving->delete();
      return ['status' => true];
    }
}
