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
            <h1 class="page-header text-overflow">group</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
            <li>
                <a href="forms-general.html#">
                    <i class="demo-pli-home"></i>
                </a>
            </li>
            <li>
                <a href="forms-general.html#">groups</a>
            </li>
            <li class="active">All</li>
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
        <div class="panel" style="padding-top:15px;padding-bottom:45px;">
            <div class="panel-heading">
                <h3 class="panel-title">Create Group</h3>
            </div>
            <div class="pad-all">
            <form method="POST" action="{{route('group.create')}}">
            @csrf
            <input type=text name=branch_id value="{{\Auth::user()->branchcode}}" hidden=hidden/>
            <input style="border:1px solid #ddd; padding:7px;outline:none" name=name type=text Placeholder="Group Name"/>
                <button type="submit" class="btn btn-success btn-md">Create Group</button>
            </form>
            </div>
        </div>
        <!---------------------------------->

        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">List of Groups in <strong>{{\Auth::user()->branchname}}</strong> (<i>{{\Auth::user()->branchcode}}</i>)</h3>
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
                        <?php $count=1;?>
                        @foreach($groups as $group)
                        <tr>
                            <th>{{$count}}</th>
                            <td><strong>{{strtoupper($group->name)}}</strong></td>
                            <td>{{$group->getNumberOfMembers()}}</td>
                            <td>{{ \Carbon\Carbon::parse(substr($group->created_at, 0, 10))->format('l, jS \\of F Y')}}</td>
                            <td>
                                <a class="btn btn-success btn-sm" href="{{route('group.view', $group->id)}}">View Group</a>
                                <a class="btn btn-danger btn-sm" href="{{route('group.delete', $group->id)}}">Delete Group</a>
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