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
