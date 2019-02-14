@extends('layouts.app')

@section('title') Map @endsection

@section('link')
@endsection

@section('content')
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
    <div class="row">
      <div class="col-md-6 col-md-offset-3"  >
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        @if (count($errors) > 0)
          @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
          @endforeach
        @endif
      </div>
    </div>
    <div style="width: 500px; height: 500px;">
    	{!! Mapper::render() !!}
    </div>
  </div>
</div>
@endsection

@section('js')
@endsection
