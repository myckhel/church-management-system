<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
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
      $member   = $request->user();
      $pageSize = $request->pageSize;
      $order    = $request->order;
      $orderBy  = $request->orderBy;
      $search   = $request->search;

      $members = $member->church->members()->search($search)
      ->with(['user'])
      ->orderBy($orderBy ?? 'id', $order ?? 'asc')
      ->paginate($pageSize);

      $members->map(fn ($member) => $member->user->withUrls('avatar'));

      return $members;
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
        'email' => 'required|email',
        'member_since' => 'date',
        'avatar'       => '',
      ]);
      $user     = $request->user();
      $church   = $user->church;

      $cuser    = User::firstOrCreate(
        ['email' => $request->email],
        $request->only((new User)->getFillable())
      );

      $cuser->saveImage($request->avatar, 'avatar');

      return $church->members()->latest()
      ->updateOrCreate(
        ['user_id' => $cuser->id],
        [
          'user_id' => $cuser->id,
          'member_since' => $request->member_since,
        ]
      );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Member $member)
    {
      $church = $request->church();
      $this->authorize('view', [$member, $church]);
      $member->load(['user'])->user->withUrls('avatar');
      return $member;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
      $this->authorize('update', $member);
      $request->validate([
        'member_since' => 'date',
        'sex'          => 'in:male,female',
      ]);
      $user     = $request->user();
      $cuser    = $member->user;

      if($request->member_since) $member->update($request->only(['member_since']));

      $cuser->update(array_filter(
        $request->only($cuser->getFillable())
      ));

      $cuser->saveImage($request->avatar, 'avatar');

      $member->load(['user'])->user->withUrls('avatar');
      return $member;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Member $member)
    {
      $this->authorize('delete', $member);
      $member->delete();
      return ['status' => true];
    }
}
