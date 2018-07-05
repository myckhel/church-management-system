
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
            <h1 class="page-header text-overflow">Collection</h1>
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
                <a href="forms-general.html#">Collection</a>
            </li>
            <li class="active">Offering</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
                                
            <div class="col-sm-12 col-md-10 col-md-offset-1">
                <div class="panel">
                    <div class="panel-body demo-nifty-btn">

                        <!--Rounded Buttons-->
                        <!--===================================================-->
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Offering</a>
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Donation</a>
                        <a style="min-width:100px !important" class="btn btn-primary btn-rounded">Tithe</a>
                        <a href="{{route('collection.report')}}" style="min-width:100px !important"  class="btn btn-success btn-rounded">Reports</a>
                        <!--===================================================-->

                    </div>
                </div>
            </div>


        <div class="col-md-8 col-md-offset-2">

<!-- Bar Chart -->
<!---------------------------------->
<div class="panel">
    <div class="panel-heading">
        <h3 class="panel-title">Total Monthly Collection</h3>
    </div>
    <div class="panel-body">
        <div id="demo-flot-bar" style="height: 250px"></div>
    </div>
</div>
<!---------------------------------->


</div>

            <div class="col-md-10 col-md-offset-1">
        <!-- Basic Data Tables -->
        <!--===================================================-->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">List of Members in province004</h3>
            </div>
            <div class="panel-body">
                <table id="demo-dt-basic" class="table table-striped table-bordered datatable" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Jan</th>
                            <th class="min-tablet">Feb</th>
                            <th class="min-tablet">Mar</th>
                            <th class="min-desktop">April</th>
                            <th class="min-desktop">May</th>
                            <th class="min-desktop">June</th>
                            <th class="min-desktop">July</th>
                            <th class="min-desktop">Aug</th>
                            <th class="min-desktop">Sept</th>
                            <th class="min-desktop">Oct</th>
                            <th class="min-desktop">Nov</th>
                            <th class="min-desktop">Dec</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php $months = ['Jan', 'Feb', 'Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Now','Dec']; ?>
                            @foreach ($months as $k => $month)
                                <?php $found = false;?>
                                @foreach($collections as $collection)

                                    @if ($collection->month == ($k+1) )
                                        <?php $found = true;?>
                                        <td>₦{{number_format($collection->amount)}}</td>
                                    
                                    @endif

                                
                                
                                @endforeach

                                <?php if (!$found){

                                        echo '<td><strong style="color:#666">No record yet</strong></td>';

                                }

                                ?>
                            @endforeach
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
        <!--===================================================-->
        <!-- End Striped Table -->
        </div>
                
        </div>
					
					


                    
    







    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection


