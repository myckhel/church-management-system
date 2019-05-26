@if (count($errors) > 0)
<div class="row">
  <div class="col-md-6 col-md-offset-3"  >
      @foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{ $error }}</div>
      @endforeach
  </div>
</div>
@endif

@if (session('status'))
<div class="row">
  <div class="col-md-6 col-md-offset-3"  >
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  </div>
</div>
@endif

<!-- <div class="col-lg-10 col-lg-offset-2">
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
</div> -->
