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
    <div class="cls-content">
        <div class="cls-content-lg panel">
          <div class="" id="" tabindex="-1" role="" aria-labelledby="myModalLabel" aria-hidden="">
              <div class="" role="">
                  <div class="modal-content">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                      <div class="modal-header text-center">
                          <div class="card-header"><h3>{{ __('Reset Password') }}</h3></div>
                      </div>
                      <div class="modal-body mx-3">
                          <div class="md-form mb-5">
                          <label data-error="wrong" data-success="right" for="defaultForm-email">{{ __('E-Mail Address') }}</label>
                              <i class="fa fa-envelope prefix grey-text"></i>
                              <input id="email defaultForm-email" type="email" class="validate form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                              @if ($errors->has('email'))
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif
                          </div>
                      </div>
                      @csrf
                      <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Send Password Reset Link') }}
                        </button>
                      </div>
                    </form>
                  </div>
              </div>
          </div>

            <!--div class="panel-body"-->


                <!--div class="mar-ver pad-btm">
                    <h1 class="h3">Recover Password {{ route('recover.reset',['selector'=>'selec', 'token'=>'tok'])}} </h1>
                </div>
                <form action="{{route('recover')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="mar-ver col-md-12">
                            <div class="form-group">
                                <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" placeholder="Enter your email address" required>
                            </div>
                        </div>
                    </div>
                    <!--<div class="checkbox pad-btm text-left">
                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                        <label for="demo-form-checkbox">I agree with the <a href="pages-register.html#" class="btn-link text-bold">Terms and Conditions</a></label>
                    </div>-->
                    <!--button class="btn btn-primary btn-lg" type="submit">Send Password Reset Link</button>
                </form-->
            </div>
            <!--div class="pad-all">
                Have you remebered your password ? <a href="{{route('login')}}" class="btn-link mar-rgt text-bold">Sign In</a>
            </div-->
        </div>
    </div>
    <!--===================================================-->
    <!-- DEMO PURPOSE ONLY -->
    <!--===================================================-->
    <!--<div class="demo-bg">
        <div id="demo-bg-list">
            <div class="demo-loading"><i class="psi-repeat-2"></i></div>
            <img class="demo-chg-bg bg-trans active" src="img/bg-img/thumbs/bg-trns.jpg" alt="Background Image">
            <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-1.jpg" alt="Background Image">
            <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-2.jpg" alt="Background Image">
            <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-3.jpg" alt="Background Image">
            <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-4.jpg" alt="Background Image">
            <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-5.jpg" alt="Background Image">
            <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-6.jpg" alt="Background Image">
            <img class="demo-chg-bg" src="img/bg-img/thumbs/bg-img-7.jpg" alt="Background Image">
        </div>
    </div>-->
    <!--===================================================-->



    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->



    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="{{ URL::asset('js/nifty.min.js') }}"></script>




    <!--=================================================-->

    <!--Background Image [ DEMONSTRATION ]-->
    <script src="{{ URL::asset('js/demo/bg-images.js') }}"></script>

</body>
</html>
