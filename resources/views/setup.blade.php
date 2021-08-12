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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.min.css') }}">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ URL::asset('css/nifty.min.css') }}" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ URL::asset('plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ URL::asset('plugins/pace/pace.min.js') }}"></script>

  <style type="text/css"> .cls-container {
     background-image: url("{{ URL::asset('img/reg_bg.jpg') }}");
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
      <div class="panel-body text-light text-bold">

          <form id="setup-form" class="form-horizontal form-padding" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label class="control-label col-md-3" for="name">Church Name</label>
              <div class="col-md-9">
                <input id="name" required class="form-control" type="text" name="name" placeholder="e.g ccc">
              </div>
            </div>
          </form>

          <form class="form-horizontal form-padding" action="#" enctype="multipart/form-data">
            <div class="form-group">
              <div class="col-md-3">
                <label class="control-label" for="logo">Church Logo</label>
              </div>
              <div class="col-md-9">
                <input required id="logo" class="file-control" type="file" accept="image/*" name="logo[]" >
              </div>
            </div>
          </form>
          <div class="image" id="img-show-container" style="display: none">
            <div class="fa fa-remove blue delete" onclick="resetImgUpl()"></div>
            <canvas id="img-show" class="img-thumbnail img-response"></canvas>
          </div>
          <button id="submit" class="float-right btn btn-primary" type="submit">Submit</button>
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

    <script type="text/javascript">
    var blobs;
    $(document).ready(() => {
      // draw file onchange
      var input = document.querySelector('input[type=file]'); // see Example 4
  		input.onchange = function () {
  		  var file = input.files[0];
  		  drawOnCanvas(file);   // see Example 6
  		  // displayAsImage(file); // see Example 7
  		};
    })

    function uploadImg(fn) {
      var input = document.querySelector('input[type=file]');
      var file = input.files[0];
      var form = new FormData(),
          xhr = new XMLHttpRequest();
    	// form.append("filename", imageData);
      toBlob(document.querySelector('#img-show')).then(function(blob) {
        blobs = blob
    	form.append('photo', blobs);
      // form.append('photo', file);
      form.append('_token', "{{csrf_token()}}");

      xhr.onload = () => {
        if (xhr.responseText) {
          fn()
        } else {
          alert('error try again')
          fn()
        }
      }

      xhr.open('post', "{{route('app.logo')}}", true);
      xhr.send(form)
      });
    }

    // submit form on button click
    $('#submit').click(() => {
      $('#setup-form').submit()
    })
    // form onsubmit
    $('#setup-form').submit((e) => {
      e.preventDefault()
      data = $('#setup-form').serializeArray()
      $.post("{{route('app.name')}}", data)
      .done((res) => {
        if (res.status) {
          uploadImg(() => {
            window.location.reload()
          })
        } else {
          alert(res.text)
        }
      })
      .fail((err) => {
        console.log(err);
        alert(err.message)
      })
    })

    // function to draw image on selection
    function drawOnCanvas(file) {
      var reader = new FileReader();

      reader.onload = function (e) {
        var dataURL = e.target.result,
            c = document.querySelector('#img-show'), // see Example 4
            ctx = c.getContext('2d'),
            img = new Image();

        $('#img-show-container').show()

        img.onload = function() {
          c.width = img.width;
          c.height = img.height;
          ctx.drawImage(img, 0, 0);
        };
        img.src = dataURL;
      };
      reader.readAsDataURL(file);
    }

    // function to convert img to blob
    var toBlob = (canvas) => {
        return new Promise(function(resolve, reject) {
            canvas.toBlob(function(blob) {
              blob = blobToFile(blob, 'captured.jpg')
               resolve(blob) }, 'image/jpeg');
        })
      }

      // function to reset image display dom
    function resetImgUpl(){
      $('#logo').val(null)
      $('#img-show-container').hide()
    }

    // function to convert blob to file
    function blobToFile(theBlob, fileName){
        //A Blob() is almost a File() - it's just missing the two properties below which we will add
        theBlob.lastModifiedDate = new Date();
        theBlob.name = fileName;
        return theBlob;
    }
    </script>
  </body>
</html>
