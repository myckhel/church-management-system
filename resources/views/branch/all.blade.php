
@extends('layouts.app')

@section('title') All Branches @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Branch</h1>
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
                <a href="forms-general.html#">Branch</a>
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
        <div class="panel" style="overflow:scroll">
            <div class="panel-heading">
                <h3 class="panel-title">List of All Branches</h3>
            </div>
            <div class="panel-body">
                <table id="demo-dt-basic" class="table table-striped table-bordered datatable " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <!--th>Country</th-->
                            <th>Branch Name</th>
                            <th>Address</th>
                            <th class="min-tablet">Branch Code</th>
                            <th class="min-desktop">Country</th>
                            <th class="min-desktop">Pastor in Charge</th>
                            <th class="min-desktop">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <!--td><span class="flag-icon flag-icon-ng"></span> </td-->
                            <td>{{$user->branchname}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->branchcode}}</td>
                            <td><?php echo $user->isAdmin() ? '<strong>HeadQuaters</strong>' : 'Branch Church'; ?></td>
                            <td>Mathew Ashimolowo</td>
                            <td><a href="#" id="{{route('branch.destroy',$user->id)}}" onclick="del(this);" class="btn btn-danger" /><span>delete<i class="fa fa-trash"></i></span></a</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <script>
            /*function confirm(obj){
                var id = obj.value;
                var confirm = confirm('confirm to delete');
            }
            $(document).ready(function(){
                ;
            });*/
        </script>
        <!--===================================================-->
        <!-- End Striped Table -->


    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
