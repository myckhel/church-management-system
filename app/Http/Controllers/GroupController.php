<?php

namespace App\Http\Controllers;

use App\Group;
use App\GroupMember;
use Illuminate\Http\Request;
use App\Member;

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
      //$members = $user->isAdmin() ? \App\Member::all() : \App\Member::where('branch_id', $user->id)->get();
      $groups = Group::where('branch_id', $user->id)->get();//all();
      //default groups
      $firstimer_numbers = Member::where('branch_id', $user->id)->where('member_status', 'new')->get(['id'])->count();

      return view('groups.all', compact('groups', 'firstimer_numbers'));
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
        $group = Group::create([
          'name' => $request->name,
          'branch_id' => auth()->user()->id
        ]);

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
        $members_in_branch = \App\Member::where('branch_id', $user->id)->get();

        $members_in_group = [];
        $group = Group::find($id);
        $member_ids = \App\GroupMember::where('group_id', $id)->get();
        //print_r($member_ids);exit();

        foreach($member_ids as $member_id){

          $member = Member::where('id', json_decode($member_id)->member_id )->get()->first();

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
        ]);

        $group_members->save();


        return redirect()->back()->with('status', 'Member successfully added!');
    }

    public function remove_member($id, $group_id){

        $group_member = \App\GroupMember::where('member_id', $id)->where('group_id', $group_id)->get()->first();

        $group_member->delete();
        return redirect()->back()->with('status', 'Member has been removed from group!');
    }

    public function defaultView($name){
      $user = \Auth::user();
      if($name == 'first'){
        $group = new \App\Group();
        $group->name = 'First Timers Group';
        // $group->save();
        $members_in_group = Member::where('branch_id', $user->id)->where('member_status', 'new')->get();
        return view('groups.view', compact('members_in_group', 'group'));
      }
      return ;
    }

    public function members(Request $request){
      $user = \Auth::user()->id;
      $names = $request->group;
      $groupMember = [];
      foreach ($names as $key => $value) {
        // code...
        if($value == 'First Timers Group'){
          $group = Member::where('branch_id', $user)->where('member_status', 'new')->get();
        }else{
          $group = Group::selectRaw('groups.id, groups.name, members.firstname, members.lastname, members.email, members.phone')->leftjoin('group_members', 'group_members.group_id', 'groups.id')
            ->leftjoin('members', 'members.id', 'group_members.member_id')->where('groups.name', $value)->get();
        }
        if(!empty($group)){$groupMember[$value] = $group;}
      }
      return response()->json(['status' => true, 'groupMember' => $groupMember]);
    }
}
