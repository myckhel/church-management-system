<?php
/* @extends('layouts.app')

@section('content') */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Recover Password - {{config('app.name')}}</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ URL::asset('css/nifty.min.css') }}" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ URL::asset('css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ URL::asset('plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('plugins/pace/pace.min.js') }}"></script>



    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ URL::asset('css/demo/nifty-demo.min.css') }}" rel="stylesheet">


    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->
    <style type="text/css">
        .cls-container {
           background-image: url("{{ URL::asset('images/reg_bg.jpg') }}");
           background-color: #cccccc;
        }
        .cls-content-lg{
            background-color: aqua;
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
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-lg panel">
          <div class="" id="" tabindex="-1" role="" aria-labelledby="myModalLabel" aria-hidden="">
              <div class="" role="">
                  <div class="modal-content">
                      <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                          @csrf
                      <div class="modal-header text-center">
                          <div class="card-header"><h3>{{ __('Change Password') }}</h3></div>
                      </div>
                      <input type="hidden" name="token" value="{{ $token }}">
                      <div class="modal-body mx-3">
                          <div class="md-form mb-5">
                          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('E-Mail Address') }}</label>
                              <i class="fa fa-envelope prefix grey-text"></i>
                              <input id="email defaultForm-email" type="email" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>

                      <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                          <i class="fa fa-lock prefix grey-text"></i>
                          <label data-error="wrong" data-success="right" for="defaultForm-pass">New password</label>
                          <input id="password defaultForm-pass" type="password" class=" validate form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                          @if ($errors->has('password'))
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $errors->first('password') }}</strong>
                              </span>
                          @endif
                        </div>
                      </div>

                      <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                          <label data-error="wrong" data-success="right" for="defaultForm-pass">Confirm New password</label>
                          <i class="fa fa-lock prefix grey-text"></i>
                          <input id="password-confirm defaultForm-pass" type="password" class=" validate form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password_confirmation" required>
                        </div>
                      </div>

                      <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Reset Password') }}
                        </button>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
        </div>
    </div>
  </div>
<?php //@endsection
?>
