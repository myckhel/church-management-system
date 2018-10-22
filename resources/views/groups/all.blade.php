@extends('layouts.app')

@section('title') All groups @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Groups</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">All</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>
    <!-- check if admin -->
    <?php  $admin = \Auth::user()->isAdmin(); ?>

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
        <div class="panel"  style="background-color: #e8ddd3;">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Create Group</h3>
            </div>
            <div class="pad-all">
            <form method="POST" action="{{route('group.create')}}">
            @csrf
            <input type=text name=branch_id value="{{\Auth::user()->branchcode}}" hidden=hidden/>
            <input style="border:1px solid #ddd; padding:7px;outline:none" name=name type=text Placeholder="Group Name" required/>
                <button type="submit" class="btn btn-success btn-md"><i class="fa fa-plus"></i> Create Group</button>
            </form>
            </div>
        </div>
        <!---------------------------------->

        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel"  style="background-color: #e8ddd3;">
            <div class="panel-heading">
                <h3 class="panel-title text-center">List of Groups in <strong>{{\Auth::user()->branchname}}</strong> (<i>{{\Auth::user()->branchcode}}</i>)</h3>
            </div>
            <div class="panel-body" style="overflow:scroll">
                <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%" >
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Group Name</th>
                            <th>Members</th>
                            <th>Date Created</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count=1; ?>
                        @foreach($groups as $group)
                        <tr>
                            <th>{{$count}}</th>
                            <td><strong>{{strtoupper($group->name)}}</strong></td>
                            <td>{{$group->getNumberOfMembers(\Auth::user()->branchcode)}}</td>
                            <td>{{ \Carbon\Carbon::parse(substr($group->created_at, 0, 10))->format('l, jS \\of F Y')}}</td>
                            <td>
                                <a class="btn btn-success btn-sm d-inline" href="{{route('group.view', $group->id)}}">View Group</a>
                                <a onclick="return confirm('Are you sure you want to delete the group?')" class="btn btn-sm d-inline" href="{{route('group.delete', $group->id)}}" style="background-color:#8c0e0e">Delete Group</a>
                            </td>
                        </tr>
                        <?php $count++;?>
                        @endforeach
                        <tr>
                            <th>{{$count++}}</th>
                            <td><strong>First Timers Group</strong></td>
                            <td>{{$firstimer_numbers}}</td>
                            <td>Default</td>
                            <td>
                                <a class="btn btn-success btn-sm d-inline" href="{{route('group.default.view', 'first')}}">View Group</a>
                            </td>
                        </tr>
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
