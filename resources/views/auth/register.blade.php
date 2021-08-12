<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Register - {{config('app.name')}}</title>
    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ URL::asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ URL::asset('css/nifty.min.css') }}" rel="stylesheet">
    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ URL::asset('css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ URL::asset('plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('plugins/pace/pace.min.js') }}"></script>
    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ URL::asset('css/demo/nifty-demo.min.css') }}" rel="stylesheet">
  <style type="text/css"> .cls-container {
    background-image: url("{{ URL::asset('img/reg_bg.jpg') }}");
    background-color: #cccccc;
  }
  </style>
</head>

<body>
    <div id="container" class="cls-container">
    <!-- BACKGROUND IMAGE -->
    <!--===================================================-->
    <div id="bg-overlay"></div>
    <!-- REGISTRATION FORM -->
    <!--===================================================-->
    <div class="cls-content">
      <div class="title m-b-md">
          <h1 class=" text-light">Super Admin Registration</h1>
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
            <div class="mar-ver pad-btm text-light">
                <h1 class="h3 text-light">Create a New Branch Account</h1>
                <p>Set up account.</p>
            </div>
            @if (isset($_GET['s']))
            <div class="alert alert-success" role="alert">
              <span class="text-danger">
                  <strong>New Branch added Successfully</strong>
              </span>
            </div>
            @endif
            <form id="branch-form" action="{{route('visitor.register')}}" method="POST">
            @csrf
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input id="branchname" placeholder="Branch Name" type="text" class="form-control{{ $errors->has('branchname') ? ' is-invalid' : '' }}" name="branchname" value="{{ old('branchname') }}" required autofocus>

                            @if ($errors->has('branchname'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('branchname') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input id="branchcode" placeholder="Branch Code" type="text" class="form-control{{ $errors->has('branchcode') ? ' is-invalid' : '' }}" name="branchcode" value="{{ old('branchcode') }}" required>

                            @if ($errors->has('branchcode'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('branchcode') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <input id="password" type="password" placeholder="Password " class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <input id="password-confirm" type="password" placeholder="Password Confimation"  class="form-control" name="password_confirmation" required>

                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                      <div class="form-group">
                          <textarea type="text" class="form-control" placeholder="Branch Address" name="address"></textarea>
                          @if ($errors->has('address'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('address') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <input id="city" type="city" placeholder="City" class="form-control{{ $errors->has('city') ? ' is-invalid' : '' }}" name="city" value="{{ old('city') }}" required>

                          @if ($errors->has('city'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('city') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <input id="state" type="state" placeholder="State" class="form-control{{ $errors->has('state') ? ' is-invalid' : '' }}" name="state" value="{{ old('state') }}" required>

                          @if ($errors->has('state'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('state') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <!--input id="country" type="country" placeholder="Country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required-->
                          <select  id="country"class="form-control {{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" required placeholder="Enter member country">
                            @foreach($currencies as $currency)
                            @if($currency->currency_symbol)
                            <option value="{{$currency->name}}">{{$currency->name}}</option>
                            @endif
                            @endforeach
                          </select>
                          @if ($errors->has('country'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('country') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                  <div class="col-sm-3">
                      <div class="form-group">
                          <!--input id="country" type="country" placeholder="Country" class="form-control{{ $errors->has('country') ? ' is-invalid' : '' }}" name="country" value="{{ old('country') }}" required-->
                          <select class="form-control {{ $errors->has('currency') ? ' is-invalid' : '' }}" name="currency" required placeholder="Enter Branch Currency">
                             <option value="" selected disabled>Currency</option>
                             @foreach($currencies as $currency)
                             @if($currency->currency_symbol)
                             <option value="{{$currency->currency_symbol}}">{{$currency->currency_name}} - {{$currency->currency_symbol}}</option>
                             @endif
                             @endforeach
                           </select>
                          @if ($errors->has('currency'))
                              <span class="invalid-feedback">
                                  <strong>{{ $errors->first('currency') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>
                </div>
                <!--<div class="checkbox pad-btm text-left">
                    <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                    <label for="demo-form-checkbox">I agree with the <a href="pages-register.html#" class="btn-link text-bold">Terms and Conditions</a></label>
                </div>-->
                <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
            </form>
        </div>
    </div>


        <!--div class="cls-content-lg panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3">Create a New Branch Account</h1>
                    <p>Set up account.</p>
                </div>
                <?php //print(route('register')); ?>
                <form action="{{route('register')}}" method="POST">
                @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="branchname" placeholder="Branch Name" type="text" class="form-control{{ $errors->has('branchname') ? ' is-invalid' : '' }}" name="branchname" value="{{ old('branchname') }}" required autofocus>

                                @if ($errors->has('branchname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('branchname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="branchcode" placeholder="Branch Code" type="text" class="form-control{{ $errors->has('branchcode') ? ' is-invalid' : '' }}" name="branchcode" value="{{ old('branchcode') }}" required>

                                @if ($errors->has('branchcode'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('branchcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="password" type="password" placeholder="Password " class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <input id="password-confirm" type="password" placeholder="Password Confimation"  class="form-control" name="password_confirmation" required>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <textarea type="text" class="form-control" placeholder="Branch Address" name="address"></textarea>
                                @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!--<div class="checkbox pad-btm text-left">
                        <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
                        <label for="demo-form-checkbox">I agree with the <a href="pages-register.html#" class="btn-link text-bold">Terms and Conditions</a></label>
                    </div>-->
                    <!--button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                </form>
            </div>
            <div class="pad-all">
                Already have an account ? <a href="{{route('login')}}" class="btn-link mar-rgt text-bold">Sign In</a>

                <!--<div class="media pad-top bord-top">
                    <div class="pull-right">
                        <a href="pages-register.html#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
                        <a href="pages-register.html#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
                        <a href="pages-register.html#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
                    </div>
                    <div class="media-body text-left text-main text-bold">
                        Sign Up with
                    </div>
                </div>-->
            <!--/div-->
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
