<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupMember;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user = \Auth::user();
      //$members = $user->isAdmin() ? \App\Member::all() : \App\Member::where('branch_id', $user->branchcode)->get();
      $groups = Group::where('branch_id', $user->branchcode)->get();//all();

          return view('groups.all', compact('groups'));
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

        $group = new Group([

            'name' => $request->name,
            'branch_id' => $request->branch_id
        ]);

        $group->save();
        return redirect()->back()->with('status','Group created Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = \Auth::user();
        $members_in_branch = \App\Member::where('branch_id', $user->branchcode)->get();

        $members_in_group = [];
        $group = Group::find($id);
        $member_ids = \App\GroupMember::where('group_id', $id)->where('for_branch',$user->branchcode)->get();
        //print_r($member_ids);exit();

        foreach($member_ids as $member_id){

            $member = \App\Member::where('id', json_decode($member_id)->member_id )->get()->first();

            if ($member) array_push($members_in_group, $member);

        }

        return view('groups.view', compact('members_in_group','members_in_branch', 'group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
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
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $group = Group::find($id);

        //for each member in the group
        //delete them
        $members = GroupMember::where('group_id', $group)->get();
        foreach ($members as $group_member) {
          // delete group member
          //GroupMember::where('member_id',$member->member_id)
          $group_member->get()->delete();
        }

        //then delete group
        $group->delete();

        return redirect()->back()->with('status','Group Successfully deleted');
    }

    public function add_member(Request $request, $id){

        // check if member

        $group_members = new \App\GroupMember([

            'group_id' => $id,//$request->group_id,
            'member_id' => $request->member_id,//$id
            'for_branch' => $request->branch_id
        ]);

        $group_members->save();


        return redirect()->back()->with('status', 'Member successfully added!');
    }

    public function remove_member($id, $group_id){

        $group_member = \App\GroupMember::where('member_id', $id)->where('group_id', $group_id)->get()->first();

        $group_member->delete();
        return redirect()->back()->with('status', 'Member has been removed from group!');
    }
}
