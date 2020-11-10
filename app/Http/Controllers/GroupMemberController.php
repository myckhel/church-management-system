<?php

namespace App\Http\Controllers;

use App\Models\GroupMember;
use App\Models\Group;
use Illuminate\Http\Request;

class GroupMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Group $group)
    {
      $this->authorize('view', $group);
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

      $mebers = $group->members()->search($search)
      ->with(['member:id,user_id', 'member.user:id,firstname,lastname'])
      ->orderBy($orderBy ?? 'id', $order ?? 'desc')
      ->paginate($pageSize);

      $mebers->withUrls(null, ['member.user' => 'avatar']);

      return $mebers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Group $group)
    {
      $this->authorize('view', $group);
      $request->validate([
        'user_id'    => 'int',
        'user_email' => 'email',
        'member_id'  => 'int',
      ]);
      $church   = $request->church();
      $userId   = $request->user_id;
      $memberId = $request->member_id;
      $email    = $request->email;
      $member   = $church->members()->when(
        $memberId,
        fn ($q) => $q->whereId($memberId),
        fn ($q) => $q->whereHas('user', fn ($q) =>
          $q->whereId($userId)->orWhere('email', $email)
        ),
      )->firstOrFail();

      return $group->members()->firstOrCreate([
        'member_id' => $member->id,
      ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GroupMember  $groupMember
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, GroupMember $groupMember)
    {
      $this->authorize('view', $groupMember);
      $groupMember->group->withUrls('avatar');
      return $groupMember;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GroupMember  $groupMember
     * @return \Illuminate\Http\Response
     */
    public function edit(GroupMember $groupMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GroupMember  $groupMember
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $this->authorize('update', $groupMember);
      $request->validate([]);
      $user     = $request->user();
      $groupMember->update(array_filter($request->only($groupMember->getFillable())));
      return $groupMember;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GroupMember  $groupMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(GroupMember $groupMember)
    {
      $this->authorize('delete', $groupMember);
      $groupMember->delete();
      return ['status' => true];
    }
}
