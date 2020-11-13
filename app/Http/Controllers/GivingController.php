<?php

namespace App\Http\Controllers;

use App\Models\Giving;
use Illuminate\Http\Request;

class GivingController extends Controller
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

      return $church->givings()->search($search)
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
        'name'      => 'required|min:3',
        'is_global' => 'bool',
      ]);
      $church     = $request->church();

      return $church->givings()->create($request->only([
        'name', 'is_global'
      ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Giving  $giving
     * @return \Illuminate\Http\Response
     */
    public function show(Giving $giving)
    {
      $this->authorize('view', $giving);
      return $giving;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Giving  $giving
     * @return \Illuminate\Http\Response
     */
    public function edit(Giving $giving)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Giving  $giving
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Giving $giving)
    {
      $this->authorize('update', $giving);
      $request->validate([
        'name'      => 'required|min:3',
        'is_global' => 'bool',
      ]);

      $giving->update(array_filter($request->only($giving->getFillable())));
      return $giving;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Giving  $giving
     * @return \Illuminate\Http\Response
     */
    public function destroy(Giving $giving)
    {
      $this->authorize('delete', $giving);
      $giving->delete();
      return ['status' => true];
    }
}
