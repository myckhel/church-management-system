@extends('layouts.app')

@section('title') Messaging - Email @endsection

@section('content')
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
<div id="content-container">
  <div id="page-head">

        <!--Page Title-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <div id="page-title">
            <h1 class="page-header text-overflow">Messaging - Email</h1>
        </div>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End page title-->


        <!--Breadcrumb-->
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <ol class="breadcrumb">
          <li>
              <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
          </li>
            <li class="active">Email</li>
        </ol>
        <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
        <!--End breadcrumb-->
  </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">
						@if (session('status'))
							<!-- Line Chart -->
							<!---------------------------------->
							<div class="panel">
								<div class="panel-heading">
								</div>
								<div class="pad-all">
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
							</div>
							<!---------------------------------->
						@endif
                        <div class="panel">

					        <div class="panel-body">
					            <div class="fixed-fluid">
					                <div class="fixed-sm-200 pull-sm-left fixed-right-border">

					                    <div style="display:none" class="list-group bg-trans pad-ver bord-ver">
					                        <p class="pad-hor mar-top text-main text-bold text-sm text-uppercase">Friends</p>

					                        <!-- Menu list item -->
					                        <a href="mailbox-compose.html#" class="list-group-item list-item-sm">
					                            <span class="badge badge-purple badge-icon badge-fw pull-left"></span>
					                            Joey K. Greyson
					                        </a>
					                        <a href="mailbox-compose.html#" class="list-group-item list-item-sm">
					                            <span class="badge badge-info badge-icon badge-fw pull-left"></span>
					                            Andrea Branden
					                        </a>
					                        <a href="mailbox-compose.html#" class="list-group-item list-item-sm">
					                            <span class="badge badge-pink badge-icon badge-fw pull-left"></span>
					                            Lucy Moon
					                        </a>
					                        <a href="mailbox-compose.html#" class="list-group-item list-item-sm">
					                            <span class="badge badge-success badge-icon badge-fw pull-left"></span>
					                            Johny Juan
					                        </a>
					                        <a href="mailbox-compose.html#" class="list-group-item list-item-sm">
					                            <span class="badge badge-danger badge-icon badge-fw pull-left"></span>
					                            Susan Sun
					                        </a>
					                    </div>


					                </div>
					                <div class="fluid">
					                    <!-- COMPOSE EMAIL -->
					                    <!--===================================================-->

					                    <div class="pad-btm clearfix">
					                        <!--Cc & bcc toggle buttons-->
					                        <div class="pull-right pad-btm">
					                            <div class="btn-group">
					                                <button id="demo-toggle-cc" data-toggle="button" type="button" class="btn btn-sm btn-default btn-active-info">Cc</button>
					                                <button id="demo-toggle-bcc" data-toggle="button" type="button" class="btn btn-sm btn-default btn-active-info">Bcc</button>
					                            </div>
					                        </div>
					                    </div>

					                    <!--Input form-->
					                    <form id="send-mail-form" role="form" class="form-horizontal" method=POST action="{{route('sendMail')}}">
							                      @csrf
					                        <div class="form-group">

					                            <label class="col-lg-1 control-label text-left"  for="inputEmail">To</label>
					                            <div class="col-lg-6">
                                        <?php if(isset($_GET['mail'])) { ?>
					                                <input type="email" id="inputEmail" name="to[]" value="<?php echo $_GET['mail']; ?> " class="form-control" required>
                                        <?php echo '</div>'; }else{ ?>
                                        <select id="num-selector" data-live-search="true" name="to[]" data-width="100%" data-actions-box="true" class="selectpicker" multiple required>
                                          @foreach ($members as $member)
                                            <option value="{{$member->email}}">{{ucwords($member->getFullname())}}</option>
                                          @endforeach
                                        </select>
					                            </div>
                                      <div class="col-lg-5">
                                        <div class="col-lg-9">
                                          <input id="emails" type="text" placeholder="Type in comma seperated emails and click add" class="form-control" aria-label="Recipient's email" aria-describedby="basic-addon2">
                                        </div>
                                      <div class="col-lg-3">
                                        <div class="input-group-append">
                                          <button id="add-num" type="button" class="btn btn-success form-control input-group-text" id="basic-addon2">Add</button>
                                        </div>
                                      </div>
                                    </div>
                                  <?php }?>
					                        </div>
					                        <div id="demo-cc-input" class="hide form-group">
					                            <label class="col-lg-1 control-label text-left" for="inputCc">Cc</label>
					                            <div class="col-lg-11">
					                                <input type="text" id="inputCc" name="cc" class="form-control">
					                            </div>
					                        </div>
					                        <div id="demo-bcc-input" class="hide form-group">
					                            <label class="col-lg-1 control-label text-left" for="inputBcc">Bcc</label>
					                            <div class="col-lg-11">
					                                <input type="text" id="inputBcc" name="bcc" class="form-control">
					                            </div>
					                        </div>
                                  <div class="row">
  					                        <div class="form-group">
  				                            <label class="col-lg-1 control-label text-left" for="inputSubject">Subject</label>
  				                            <div class="col-lg-6">
  				                                <input type="text" id="inputSubject" name="subject" class="form-control"  required>
  				                            </div>
                                      <div class="col-lg-4">
                                        <ul id="list" class="list-group">
                                        </ul>
                                      </div>
                                    </div>

											<div class="form-group" style="display:none">
					                            <label class="col-lg-1 control-label text-left" for="inputSubject">Message</label>
					                            <div class="col-lg-11">
					                                <textarea name="message" id="message-textarea"></textarea>
					                            </div>
					                        </div>
					                    <!--Wysiwyg editor : Summernote placeholder-->
					                    <div id="demo-mail-compose"></div>

					                    <div class="pad-ver">

					                        <!--Send button-->
					                        <button id="mail-send-btn" type="submit" class="btn btn-primary">
					                            <i class="demo-psi-mail-send icon-lg icon-fw"></i> Send Mail
					                        </button>
					                    </div>

										</form>
					                    <!--===================================================-->
					                    <!-- END COMPOSE EMAIL -->
					                </div>
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
