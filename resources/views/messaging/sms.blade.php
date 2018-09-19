@extends('layouts.app')

@section('title') All Members @endsection

@section('content')
<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
    <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Messaging</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">SMS</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->

    </div>


    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-6 col-md-offset-3"  >
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
            <div class="col-sm-6 col-sm-offset-3" style="margin-bottom:420px">
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">SMS Messaging</h3>
                    </div>

                    <!--Block Styled Form -->
                    <!--===================================================-->
                    <form method="POST" action="{{route('sendSMS')}}">
                        @csrf
                        <input name="branch_id" value="3" type="text" hidden="hidden"/>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Number</label>
                                        <!--input type="text" name="to" class="form-control"-->
                                        <select id="num-selector" name="to[]" class="selectpicker" data-live-search="true" data-actions-box="true" data-width="100%" multiple>
                                          @foreach ($members as $member)
                                            <option value="{{$member->phone}}">{{ucwords($member->getFullname()) . ' - ' . $member->phone}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                    <div class="col-sm-12">
                                      <div class="col-lg-9">
                                        <input id="nums" type="text" placeholder="Type in comma seperated Numbers and click add" class="form-control" aria-label="Recipient's Number" aria-describedby="basic-addon2">
                                      </div>
                                    <div class="col-lg-3">
                                      <div class="input-group-append">
                                        <button id="add-num" type="button" class="btn btn-success form-control input-group-text" id="basic-addon2">Add</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label">Message</label>
                                        <textarea name="message" class="form-control" style="height:300px"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer text-right">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
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
