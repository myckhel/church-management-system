@extends('layouts.app')

@section('title') All Members @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Member</h1>
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
                <a href="{{route('members.all')}}">Members</a>
            </li>
            <li class="active">All</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">



        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">List of Members In {{\Auth::user()->branchname}}</h3>
            </div>
            <div class="col-lg-10 col-lg-offset-2">
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
            <div class="panel-body" style="overflow:scroll">
                <!--div style="height:100px;border:1px solid green">
                Sort by Newest Members, Gender
              </div-->
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
                        @foreach($members as $member)
                        <tr>
                            <th>{{$count}}</th>
                            <th><img src="{{url('/images/')}}/{{$member->photo}}"  class="img-md img-circle" alt="Profile Picture"></th>
                            <td><strong>{{strtoupper($member->position)}}</strong></td>
                            <td>{{$member->getFullname()}}</td>
                            <td>{{$member->occupation}}</td>
                            <td>{{$member->marital_status}}</td>
                            <td>{{$member->phone}}</td>
                            <td>{{$member->dob}}</td>
                            <td>{{$member->member_since}}</td>
                            <td style='white-space: nowrap'>
                              <div class="btn-group">
                                <a class="btn btn-success" href="{{route('member.profile', $member->id)}}">View Profile</a><!--a style="margin-left:5px;" class="btn btn-primary" href="{{route('member.edit', $member->id)}}">Edit Profile</a-->
                                <a style="" class="btn btn-danger" href="{{route('member.delete', $member->id)}}" onclick="return confirm('Are you sure you want to delete the member?')"><i class="fa fa-trash"></i> Delete Member</a></td>
                              </div>
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
