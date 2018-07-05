
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
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">List of All Branches</h3>
            </div>
            <div class="panel-body">
                <table id="demo-dt-basic" class="table table-striped table-bordered datatable " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Country</th>
                            <th>Branch Name</th>
                            <th>Province</th>
                            <th class="min-tablet">Branch Code</th>
                            <th class="min-tablet">State</th>
                            <th class="min-desktop">City</th>
                            <th class="min-desktop">Country</th>
                            <th class="min-desktop">Pastor in Charge</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><span class="flag-icon flag-icon-ng"></span> </td>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                            <td>Mathew Ashimolowo</td>
                        </tr>
                        <tr>
                        <td><span class="flag-icon flag-icon-gb"></span> </td>
                            <td>Lael Greer</td>
                            <td>Systems Administrator</td>
                            <td>London</td>
                            <td>21</td>
                            <td>2009/02/27</td>
                            <td>$103,500</td>

                            <td>Adedayo Aloa</td>
                        </tr>
                        <tr>
                        <td><span class="flag-icon flag-icon-ng"></span> </td>
                            <td>Jonas Alexander</td>
                            <td>Developer</td>
                            <td>San Francisco</td>
                            <td>30</td>
                            <td>2010/07/14</td>
                            <td>$86,500</td>
                            <td>Mathew Ashimolowo</td>
                        </tr>
                        <tr>
                            <td><span class="flag-icon flag-icon-us"></span> </td>
                            <td>Shad Decker</td>
                            <td>Regional Director</td>
                            <td>Edinburgh</td>
                            <td>51</td>
                            <td>2008/11/13</td>
                            <td>$183,000</td>
                            <td>Tayo Akinsola</td>
                        </tr>
                        <tr>
                            <td><span class="flag-icon flag-icon-ng"></span> </td>
                            <td>Michael Bruce</td>
                            <td>Javascript Developer</td>
                            <td>Singapore</td>
                            <td>29</td>
                            <td>2011/06/27</td>
                            <td>$183,000</td>
                            <td>Mathew Ashimolowo</td>
                        </tr>
                        <tr>
                            <td><span class="flag-icon flag-icon-ng"></span> </td>
                            <td>Donna Snider</td>
                            <td>Customer Support</td>
                            <td>New York</td>
                            <td>27</td>
                            <td>2011/01/25</td>
                            <td>$112,000</td>
                            <td>Grace Adedoyin</td>
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


