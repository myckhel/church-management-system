@extends('layouts.app')

@section('title') Payment Status @endsection

@section('link')
@endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
  <div id="page-head">

      <!--Page Title-->
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <div id="page-title">
          <h1 class="page-header text-overflow">Payment Status</h1>
      </div>
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End page title-->

      <!--Breadcrumb-->
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <ol class="breadcrumb">
        <li>
            <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
        </li>
          <li class="active">Status</li>
      </ol>
      <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
      <!--End breadcrumb-->

  </div>


  <!--Page content-->
  <!--===================================================-->
  <div id="page-content">
    <div class="panel rounded-top text-center">
      <!-- <div class="panel-heading card">
        <h1 class="display-1 text-center"><i class="fa fa-{{session('status') ? 'mark' : 'close'}}"></i> {{session('message')}}ggfg</h1>
      </div> -->
      <div class="panel-body">
        <div class="text-xs-center bg-{{session('status') ? 'success' : 'danger'}} card border border-light col-md-6 col-md-offset-2">
          <div class="card-block">
            <h1 class="display-3 mb-0">Thank You!</h1>
            <h1 class="display-1 text-center"><i class="fa fa-{{session('status') ? 'mark' : 'close'}}"></i> {{session('message')}}</h1>
            @if (session('status'))
            <p class="lead"><strong>Please check your email</strong> for payment receipt.</p>
            <hr>
            @endif
            <p>
              Having trouble? <a href="">Contact us</a>
            </p>
            <p class="lead  mb-0">
              <a class="btn btn-primary btn-sm" href="{{Route('dashboard')}}" role="button">Continue to homepage</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
