<?php

namespace App\Http\Controllers;

use App\Models\SmsClient;
use Illuminate\Http\Request;
use App\Http\Requests\SmsClientRequest;

class SmsClientController extends Controller
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

      return $church->smsClients()->search($search)
      ->latest()
      // ->with(['methods'])
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
    public function store(SmsClientRequest $request)
    {
      $request->validate([]);
      $church     = $request->church();

      return $church->smsClients()->create($request->only([
        'name', 'endpoint', 'is_global', 'is_primary', 'auth', 'auth_type',
      ]));
      // todo
      // toggle primary
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SmsClient  $smsClient
     * @return \Illuminate\Http\Response
     */
    public function show(SmsClient $smsClient)
    {
      $this->authorize('view', $smsClient);
      return $smsClient;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SmsClient  $smsClient
     * @return \Illuminate\Http\Response
     */
    public function edit(SmsClient $smsClient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SmsClient  $smsClient
     * @return \Illuminate\Http\Response
     */
    public function update(SmsClientRequest $request, SmsClient $smsClient)
    {
      $this->authorize('update', $smsClient);
      $request->validate([]);
      $user     = $request->user();
      $smsClient->update(array_filter($request->only($smsClient->getFillable())));
      return $smsClient;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SmsClient  $smsClient
     * @return \Illuminate\Http\Response
     */
    public function destroy(SmsClient $smsClient)
    {
      $this->authorize('delete', $smsClient);
      $smsClient->delete();
      return ['status' => true];
    }
}
