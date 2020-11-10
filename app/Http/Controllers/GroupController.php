<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
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
      $church     = $request->church();
      $pageSize = $request->pageSize;
      $order    = $request->order;
      $orderBy  = $request->orderBy;
      $search   = $request->search;

      $groups = $church->groups()->search($search)
      ->withCount(['members'])
      ->orderBy($orderBy ?? 'id', $order ?? 'desc')
      ->paginate($pageSize);

      $groups->withUrls('avatar');

      return $groups;
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
        'name' => 'required|min:3',
      ]);
      $church     = $request->church();

      $group = $church->groups()->create($request->only(['name']));

      $group->saveImage($request->avatar, 'avatar');

      return $group;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
      $this->authorize('view', $group);
      return $group->loadCount(['members'])->withUrls('avatar');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
      $this->authorize('update', $group);
      $request->validate([
        'name' => 'min:3',
      ]);
      $user     = $request->user();
      $group->update(array_filter($request->only($group->getFillable())));

      $group->saveImage($request->avatar, 'avatar');

      return $group;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
      $this->authorize('delete', $group);
      $group->delete();
      return ['status' => true];
    }
}
