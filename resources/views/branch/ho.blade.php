@extends('layouts.app')

@section('title') Head Office @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Head office</h1>
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
                <a href="forms-general.html#">Admin Tools</a>
            </li>
            <li class="active">Head office</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="table table-striped table-bordered"  >
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
            <div class="">
                <div class="panel" style="overflow:scroll; background-color: #e8ddd3;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Edit Options</h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
					<div class="panel-body">
					<table class="table table-hover" id="dev-table">
						<thead>
							<tr>
								<th>#</th>
								<th>HOSNAME</th>
								<th>HOLNAME</th>
								<th>HOADDRESS</th>
								<th>HOADDRESS2</th>
								<th>HOCITY</th>
								<th>HOSTATE</th>
								<th>HOPOSTAL_CODE</th>
								<th>HOCOUNTRY</th>
								<th>HOPHONE1</th>
								<th>HOPHONE2</th>
								<th>HOPHONE3</th>
								<th>HOPHONE4</th>
								<th>HOEMAIL</th>
								<th>HOLOGO</th>
							</tr>
						</thead>
						<tbody>
                        @foreach($options as $option)
						    <tr id="def">
								<td>{{$option->HOID}}</td>
                <td id="{{$option->HOSNAME}}1" class="">{{$option->HOSNAME}}</td>
								<td id="{{$option->HOLNAME}}2" class="">{{$option->HOLNAME}}</td>
								<td id="{{$option->HOADDRESS}}3" class="">{{$option->HOADDRESS}}</td>
								<td id="{{$option->HOADDRESS2}}4" class="">{{$option->HOADDRESS2}}</td>
								<td id="{{$option->HOCITY}}5" class="">{{$option->HOCITY}}</td>
								<td id="{{$option->HOSTATE}}6" class="">{{$option->HOSTATE}}</td>
								<td id="{{$option->HOPOSTAL_CODE}}7" class="">{{$option->HOPOSTAL_CODE}}</td>
								<td id="{{$option->HOCOUNTRY}}14" class="">{{$option->HOCOUNTRY}}</td>
								<td id="{{$option->HOPHONE1}}8" class="">{{$option->HOPHONE1}}</td>
								<td id="{{$option->HOPHONE2}}9" class="">{{$option->HOPHONE2}}</td>
								<td id="{{$option->HOPHONE3}}10" class="">{{$option->HOPHONE3}}</td>
								<td id="{{$option->HOPHONE4}}11" class="">{{$option->HOPHONE4}}</td>
								<td id="{{$option->HOEMAIL}}12" class="">{{$option->HOEMAIL}}</td>
								<td id="13" class=""><img class="img-responsive" src="data:image/jpeg;base64, {{base64_encode($option->HOLOGO) . ''}}"></td>
                            </tr>
                        @endforeach

					<form class="table" id="update_ho" enctype="multipart/form-data" method="post" action="{{route('branch.ho.up')}}">
					    <tr id="mod" style="display:none">
                            <td>#</td>
					        <td><input name="sname" type="text" class="form-control" value="{{$option->HOSNAME}}"></td>
					        <td><input name="lname" type="text" class="form-control" value="{{$option->HOLNAME}}"></td>
					        <td><input name="addr1" type="text" class="form-control" value="{{$option->HOADDRESS}}"></td>
					        <td><input name="addr2" type="text" class="form-control" value="{{$option->HOADDRESS2}}"></td>
					        <td><input name="city" type="text" class="form-control" value="{{$option->HOCITY}}"></td>
					        <td><input name="state" type="text" class="form-control" value="{{$option->HOSTATE}}"></td>
					        <td><input name="postal" type="text" class="form-control" value="{{$option->HOPOSTAL_CODE}}"></td>
					        <td><input name="country" type="text" class="form-control" value="{{$option->HOCOUNTRY}}"></td>
					        <td><input name="phone1" type="number" class="form-control" value="{{$option->HOPHONE1}}"></td>
					        <td><input name="phone2" type="number" class="form-control" value="{{$option->HOPHONE2}}"></td>
					        <td><input name="phone3" type="number" class="form-control" value="{{$option->HOPHONE3}}"></td>
					        <td><input name="phone4" type="number" class="form-control" value="{{$option->HOPHONE4}}"></td>
					        <td><input name="email" type="email" class="form-control" value="{{$option->HOEMAIL}}"></td>
					        <td><input name="img" type="file" accept=".jpg,.gif,.png"  class="form-control" value=""></td>
					    </tr>
              <input name="id" type="hidden" value="{{$option->HOID}}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
						</tbody>
					</table>
                    <div class="row">
                       <div class="col-md-3">
                            <button id="edit-ho" type='button' class="btn btn-danger" onclick="saveHo(this);">Edit</button>
                            <button style="display:none" id="save-ho" type='submit' name="update" class="btn btn-danger" onclick="">Save</button>
                            <button style="display:none" id="cancel-ho" type='button' class="btn btn-warning" onclick="">Cancel</button>
                        </div>
					</form>
                    </div>
			    </div>
                    <!--===================================================-->
                    <!--End Block Styled Form -->

                </div>
            </div>


        </div>
    </div>
    <!--===================================================-->
    <!--End page content-->

</div>

<!--===================================================-->
<!--END CONTENT CONTAINER-->
@endsection
