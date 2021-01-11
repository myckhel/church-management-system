<?php

namespace App\Http\Controllers;

use App\Models\SmsMethod;
use Illuminate\Http\Request;

class SmsMethodController extends Controller
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
        'sms_client_id' => 'int',
      ]);
      $church   = $request->church();
      $pageSize = $request->pageSize;
      $order    = $request->order;
      $orderBy  = $request->orderBy;
      $search   = $request->search;
      $clientId = $request->sms_client_id;

      return $church->smsMethods()
      ->search($search)
      ->with(['client' => fn ($q) =>
        $q->select('id', 'name')
        ->when($clientId, fn ($q) =>
          $q->whereId($clientId)
        )
      ])
      ->orderBy($orderBy ?? 'id', $order ?? 'asc')
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
        'sms_client_id' => 'int'
      ]);
      $church    = $request->church();
      $sms_client_id = $request->sms_client_id;
      $client = $church->smsClients($sms_client_id)->firstOrFail();

      return $client->methods()->updateOrCreate(
        ['name' => $request->name, 'method' => $request->method],
        $request->only([
          'name', 'method', 'params'
        ])
      );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return \Illuminate\Http\Response
     */
    public function show(SmsMethod $smsMethod)
    {
      $this->authorize('view', $smsMethod);
      return $smsMethod->load(['client']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsMethod $smsMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SmsMethod $smsMethod)
    {
      $this->authorize('update', $smsMethod);
      $request->validate([]);
      $user     = $request->user();
      $smsMethod->update(array_filter($request->only($smsMethod->getFillable())));
      return $smsMethod;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SmsMethod  $smsMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmsMethod $smsMethod)
    {
      $this->authorize('delete', $smsMethod);
      return ['status' => $smsMethod->delete()];
    }
}
