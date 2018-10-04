@extends('layouts.app')

@section('title') Gallery @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Gallery</h1>
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
                <a href="{{route('members.all')}}">Gallery</a>
            </li>
            <li class="active">All</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
      <div class="panel">
          <div class="panel-heading">
              <h3 class="panel-title">Upload</h3>
          </div>
          <div class="panel-body">
            <form id="form1" runat="server">
              <div class="col-xs-4">
               <div class="form-group">
                  <input type='file' id="imgInp" class="filestyle" multiple/>
                  <img id="blah" src="#" alt="your image" />
                </div>
              </div>
            </form>
          </div>
        </div>
        <!--===================================================-->
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Pictures</h3>
            </div>
            @if (session('status'))
            <div class="col-lg-10 col-lg-offset-2">

              <div class="alert alert-success">
                  {{ session('status') }}
              </div>
            @endif
              @if (count($errors) > 0)
                @foreach ($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
                @endforeach
                </div>
              @endif
            <div class="panel-body">
              <div class="row justify-content-center">
  <div class="col-md-8">
      <div class="row">
          <a href="https://unsplash.it/1200/768.jpg?image=251" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
              <img src="https://unsplash.it/600.jpg?image=251" class="img-fluid">
          </a>
          <a href="https://unsplash.it/1200/768.jpg?image=252" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
              <img src="https://unsplash.it/600.jpg?image=252" class="img-fluid">
          </a>
          <a href="https://unsplash.it/1200/768.jpg?image=253" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
              <img src="https://unsplash.it/600.jpg?image=253" class="img-fluid">
          </a>
      </div>
      <div class="row">
          <a href="https://unsplash.it/1200/768.jpg?image=254" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
              <img src="https://unsplash.it/600.jpg?image=254" class="img-fluid">
          </a>
          <a href="https://unsplash.it/1200/768.jpg?image=255" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
              <img src="https://unsplash.it/600.jpg?image=255" class="img-fluid">
          </a>
          <a href="https://unsplash.it/1200/768.jpg?image=256" data-toggle="lightbox" data-gallery="example-gallery" class="col-sm-4">
              <img src="https://unsplash.it/600.jpg?image=256" class="img-fluid">
          </a>
      </div>
  </div>
</div>
            </div>

        </div>
        <!--===================================================-->

    </div>
    <!--===================================================-->
    <!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
