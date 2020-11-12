<?php

namespace App\Http\Controllers;

use App\Models\Church;
use App\Http\Requests\ChurchRequest;
use \Illuminate\Http\Request;

class ChurchController extends Controller
{
  public function auth(Request $request, Church $church){
    $member = $church->hasMember($request->user())->latest()->firstOrFail();

    return ['church_token' => $member->createToken('PAT')->plainTextToken];
  }

  public function whoami(Request $request){
    return $request->user();
  }
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
      $user     = $request->user();
      $pageSize = $request->pageSize;
      $order    = $request->order;
      $orderBy  = $request->orderBy;
      $search   = $request->search;

      return $user->memberChurches()->search($search)
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
     * @param  \Illuminate\Http\ChurchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChurchRequest $request)
    {
      $request->validate([]);
      $user     = $request->user();

      $church = $user->churches()
        ->create($request->only(['name', 'email', 'code', 'country_id', 'state_id', 'city', 'address']));
      $token       = $church->members()->first()->createToken('PAT');

      return [
        'church'      => $church,
        'church_token'=> $token->plainTextToken,
        'token_type'  => 'Church',
      ];
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function show(Church $church)
    {
      $this->authorize('view', $church);
      return $church;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function edit(Church $church)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\ChurchRequest  $request
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function update(ChurchRequest $request, Church $church)
    {
      $this->authorize('update', $church);
      $request->validate([]);
      $user     = $request->user();
      $church->update(array_filter($request->only($church->getFillable())));
      return $church;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Church  $church
     * @return \Illuminate\Http\Response
     */
    public function destroy(Church $church)
    {
      $this->authorize('delete', $church);
      $church->delete();
      return ['status' => true];
    }
}
