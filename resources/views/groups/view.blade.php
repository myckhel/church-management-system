@extends('layouts.app')

@section('title') All Group Members @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Group Members</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li>
                <i class="fa fa-users"></i><a href="{{url('groups')}}"> Groups</a>
            </li>
            <li class="active">Members</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        @if (session('status'))
            <!-- Line Chart -->
            <!---------------------------------->
            <div class="panel">
                <div class="panel-heading">
                </div>
                <div class="pad-all">
                @if (session('status'))

                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)

                        <div class="alert alert-danger">{{ $error }}</div>

                    @endforeach

                @endif

                </div>
            </div>
            <!---------------------------------->
        @endif

        <!-- Line Chart -->
        <!---------------------------------->
        <?php if(isset($members_in_branch)){ ?>
        <div class="panel"  style="background-color: #e8ddd3;">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Add Members To Group</h3>
            </div>
            <div class="pad-all">
            <form method="POST" action="<?php echo route('group.add.member', $group->id) ?>">
            @csrf
                <input type="text" name="group_id" value="{{$group->id}}" hidden=hidden/>
                <p>Members of <strong>{{\Auth::user()->branchname}}</strong> that are not in <strong>{{strtoupper($group->name)}}</strong> Group</p>
                <select class="selectpicker" name="member_id" style="outline:none;height:33px">
                    @foreach ($members_in_branch as $member)

                        @if (!$member->InGroup($group->id))

                        <option value="{{$member->id}}">{{$member->getFullname()}}</option>

                        @endif

                    @endforeach

                </select>
                <input class="" type="hidden" value="{{\Auth::user()->branchcode}}" name="branch_id" />
                <button type="submit" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Add Member</button>
            </form>
            </div>
        </div>
        <?php }?>
        <!---------------------------------->
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel"  style="background-color: #e8ddd3;">
            <div class="panel-heading">
                <h3 class="panel-title text-center">List of members in <strong>{{strtoupper($group->name)}}</strong> Group</h3>
            </div>
            <div class="panel-body" style="overflow:scroll">
            <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Photo</th>
                    <th>Position</th>
                    <th>Fullname</th>
                    <th>Occupation</th>
                    <th class="min-tablet">Marital Status</th>
                    <th class="min-tablet">Phone Number</th>
                    <th class="min-desktop">Birthday</th>
                    <th class="min-desktop">Member Since</th>
                    <th class="min-desktop">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $count=1;?>

                @foreach($members_in_group as $member)

                <tr>
                    <th>{{$count}}</th>
                    <th><img src="{{url('images/')}}/{{$member->photo}}"  class="img-md img-circle" alt="Profile Picture"></th>
                    <td><strong>{{strtoupper($member->position)}}</strong></td>
                    <td>{{$member->getFullname()}}</td>
                    <td>{{$member->occupation}}</td>
                    <td>{{$member->marital_status}}</td>
                    <td>{{$member->phone}}</td>
                    <td>{{$member->dob}}</td>
                    <td>{{$member->member_since}}</td>
                    <td>
                        <a class="btn btn-success btn-sm" href="{{route('member.profile', $member->id)}}">View Profile</a>
                        @if(isset($members_in_branch))
                          <a class="btn btn-danger btn-sm" href="{{route('group.remove.member', [$member->id, $group->id])}}">Remove Member</a>
                        @endif

                    </td>
                </tr>
                <?php $count++;?>
                @endforeach

            </tbody>
        </table>
            </div>
        </div>
        <!--===================================================-->
        <!-- End Striped Table -->


    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
