@extends('layouts.app')

@section('title') Invoice @endsection

@section('link')
<link href="{{ URL::asset('css/invoice.css') }}" rel="stylesheet">
<link rel='stylesheet' type='text/css' href="{{ URL::asset('css/print.css') }}" media="print" />
@endsection

@section('content')
<?php $user = \Auth::user(); $money = function($number){ return \Auth::user()::toMoney((float) $number); } ?>
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
  <div id="page-head">
    <!--Page Title-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <div id="page-title">
        <h1 class="page-header text-overflow">Invoice</h1>
    </div>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End page title-->
    <!--Breadcrumb-->
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <ol class="breadcrumb">
      <li>
        <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
      </li>
      <li class="active">Invoice</li>
    </ol>
    <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
    <!--End breadcrumb-->
  </div>
  <!--Page content-->
  <!--===================================================-->
  <div id="page-content">
    @include('layouts.error')

    <div class="col-sm-10 col-md-10 col-md-offset-1">
      <div class="panel" style="background-color: #e8ddd3;">
        <!-- <div class="panel-heading">
            <h1 class="text-center panel-title">Collection Commission Invoice</h1>
        </div> -->
        <div class="panel-body demo-nifty-btn table-responsive">
          <!-- <div id="page-wrap"> -->

      		<div id="header">INVOICE</div>

      		<div id="identity">

            <div id="address">
              <b><p>{{ucwords($user->branchname)}}</p></b>
              <p>{{ucwords($user->address)}}</p>
              <p>{{ucwords($user->state)}}, {{ucwords($user->country)}}</p>
              <!-- <p>Phone: (555) 555-5555</p> -->
            </div>

            <div id="logo">

              <!-- <div id="logoctr">
                <a href="javascript:;" id="change-logo" title="Change logo">Change Logo</a>
                <a href="javascript:;" id="save-logo" title="Save changes">Save</a>
                |
                <a href="javascript:;" id="delete-logo" title="Delete logo">Delete Logo</a>
                <a href="javascript:;" id="cancel-logo" title="Cancel changes">Cancel</a>
              </div> -->

              <!-- <div id="logohelp">
                <input id="imageloc" type="text" size="50" value="" /><br />
                (max width: 540px, max height: 100px)
              </div> -->
              <img id="image" style="width:100%; height:100%;" src="{{URL::asset('images/'. $logo['logo'])}}" alt="logo" />
            </div>

      		</div>

      		<div style="clear:both"></div>

      		<div id="customer">

            <div id="customer-title">
              <p><b>{{ config('app.name') }}</b></p>
              <!-- <p>Church the smarter way!</p> -->
            </div>

            <table id="meta">
                <tr>
                    <td class="meta-head">Invoice #</td>
                    <td><div>{{mt_rand(111111, 999999)}}</div></td>
                </tr>
                <tr>

                    <td class="meta-head">Date</td>
                    <td><div id="date">{{date('dS F Y', strtotime( NOW() ) )}}</div></td>
                </tr>
                <tr>
                    <td class="meta-head">Amount Due</td>
                    <td><div class="due">{{$money($blanceDue)}}</div></td>
                </tr>

            </table>

      		</div>

      		<table id="items">

      		  <tr>
      		      <th>Date</th>
      		      <th>Service Type</th>
      		      <th>Amount</th>
      		      <th>Quantity</th>
      		      <th>Commission {{$percentage}}%</th>
      		  </tr>
            <?php $i = 0; $branch_id = $user->id; $order_ids = []; ?>
            @if(isset($dueSavings[$branch_id]))
            <?php $totalCommission = \App\CollectionCommission::savingsPercentage($dueSavings[$branch_id]); ?>
            @foreach($dueSavings[$branch_id]  as $savings)
            <!-- { { dd( $dueSavings[$branch_id])}} -->
      		  <tr class="item-row">
      		      <td class="item-name">
                  <div class="delete-wpr">
                    <div>{{$savings->date_collected}}</div>
                    <!-- <a class="delete" href="javascript:;" title="Remove row">X</a> -->
                  </div>
                </td>
      		      <td class="description"><div>{{$savings->service_types}}</div></td>
      		      <td><div class="cost">{{$money($savings->total)}}</div></td>
      		      <td><div class="qty">1</div></td>
                <?php $i++; $commission = (float)($savings->total * ($percentage / 100));
                $order_ids[] = (\App\CollectionCommission::mySelfByDate($savings->date_collected))->id; ?>
      		      <td><span class="price">{{$money($commission)}}</span></td>
      		  </tr>
            @endforeach
            @endif
            <!-- { {dd($order_ids)}} -->
      		  <!-- <tr class="item-row">
      		      <td class="item-name"><div class="delete-wpr"><div>SSL Renewals</div><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>

      		      <td class="description"><div>Yearly renewals of SSL certificates on main domain and several subdomains</div></td>
      		      <td><div class="cost">$75.00</div></td>
      		      <td><div class="qty">3</div></td>
      		      <td><span class="price">$225.00</span></td>
      		  </tr> -->

      		  <!-- <tr id="hiderow">
      		    <td colspan="5">
                <a id="addrow" href="javascript:;" title="Add a row">Add a row</a>
              </td>
      		  </tr> -->

      		  <!-- <tr>
      		      <td colspan="2" class="blank"> </td>
      		      <td colspan="2" class="total-line">Subtotal</td>
      		      <td class="total-value"><div id="subtotal">$875.00</div></td>
      		  </tr> -->
      		  <tr>
    		      <td colspan="2" class="blank"> </td>
    		      <td colspan="2" class="total-line">Total</td>
    		      <td class="total-value"><div id="total">{{$money($totalCommission)}}</div></td>
      		  </tr>
      		  <!-- <tr>
      		      <td colspan="2" class="blank"> </td>
      		      <td colspan="2" class="total-line">Amount Paid</td>

      		      <td class="total-value"><div id="paid">$0.00</div></td>
      		  </tr> -->
      		  <!-- <tr>
      		      <td colspan="2" class="blank"> </td>
      		      <td colspan="2" class="total-line balance">Balance Due</td>
      		      <td class="total-value balance"><div class="due">$875.00</div></td>
      		  </tr> -->

      		</table>

      		<div id="terms">
      		  <h5>Terms</h5>
      		  <div>Commission charge of {{$percentage}}% being charge on each collection.</div>
      		</div>
        	<!-- </div> -->
          <div class="pull-left">
            <button type="button" name="button" onclick="window.print()" class="btn btn-primary"><i class="fa fa-print"></i> Print </button>
          </div>
          <div class="pull-right">
            <form class="" action="{{route('pay')}}" method="post">
              <input type="hidden" name="email" value="{{auth::user()->email}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="345">
            <input type="hidden" name="amount" value="{{str_replace('.', '', $totalCommission)}}"> {{-- required in kobo --}}
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="order_ids" value="{{implode(',', $order_ids)}}">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['order_ids' => implode(',', $order_ids)]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ rand() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}

            <button type="submit" name="button" class="btn btn-success"><i class="fa fa-money"></i> Continue to pay</button>
            </form>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>

@endsection

@section('js')
<script src="{{ URL::asset('js/invoice.js') }}"></script>
@endsection
