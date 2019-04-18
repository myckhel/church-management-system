<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Setup App </title>

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ URL::asset('css/nifty.min.css') }}" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ URL::asset('plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('plugins/pace/pace.min.js') }}"></script>

  <style type="text/css"> .cls-container {
     background-image: url("{{ URL::asset('images/reg_bg.jpg') }}");
     background-color: #cccccc;
  }
  </style>
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
  <div id="container" class="cls-container">
  <!-- BACKGROUND IMAGE -->
  <!--===================================================-->
  <div id="bg-overlay"></div>
  <!-- REGISTRATION FORM -->
  <!--===================================================-->
  <div class="cls-content">
    <div class="title m-b-md">
      <h1 class=" text-light">Setup App</h1>
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

    <div class="cls-content-lg panel">
      <div class="panel-body">


      </div>
    </div>

    </div>
  </div>

    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>
</html>
