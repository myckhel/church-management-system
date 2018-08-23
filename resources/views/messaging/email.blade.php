@extends('layouts.app')

@section('title') Messaging - Email @endsection

@section('content')
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
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

					                    <!--div class="pad-btm bord-btm">
					                        <a href="mailbox-compose.html" class="btn btn-block btn-success">Compose Mail</a>
					                    </div-->

					                    <!--<p class="pad-hor mar-top text-main text-bold text-sm text-uppercase">Folders</p>
					                    <div class="list-group bg-trans pad-btm bord-btm">
					                        <a href="mailbox-compose.html#" class="list-group-item mail-nav-unread">
					                            <i class="demo-pli-mail-unread icon-lg icon-fw"></i> Inbox (73)
					                        </a>
					                        <a href="mailbox-compose.html#" class="list-group-item">
					                            <i class="demo-pli-pen-5 icon-lg icon-fw"></i> Draft
					                        </a>
					                        <a href="mailbox-compose.html#" class="list-group-item">
					                            <i class="demo-pli-mail-send icon-lg icon-fw"></i> Sent
					                        </a>
					                        <a href="mailbox-compose.html#" class="list-group-item mail-nav-unread">
					                            <i class="demo-pli-fire-flame-2 icon-lg icon-fw"></i> Spam (5)
					                        </a>
					                        <a href="mailbox-compose.html#" class="list-group-item">
					                            <i class="demo-pli-trash icon-lg icon-fw"></i> Trash
					                        </a>
					                    </div>

					                    <div class="list-group bg-trans">
					                        <a href="mailbox-compose.html#" class="list-group-item"><i class="demo-pli-male-female icon-lg icon-fw"></i> Address Book</a>
					                        <a href="mailbox-compose.html#" class="list-group-item"><i class="demo-pli-folder-with-document icon-lg icon-fw"></i> User Folders</a>
					                    </div>-->

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

					                    <!--<p class="pad-hor mar-top text-main text-bold text-sm text-uppercase">Labels</p>
					                    <ul class="list-inline mar-hor">
					                        <li class="tag tag-xs">
					                            <a href="mailbox-compose.html#"><i class="demo-pli-tag"></i> Family</a>
					                        </li>
					                        <li class="tag tag-xs">
					                            <a href="mailbox-compose.html#"><i class="demo-pli-tag"></i> Home</a>
					                        </li>
					                        <li class="tag tag-xs">
					                            <a href="mailbox-compose.html#"><i class="demo-pli-tag"></i> Work</a>
					                        </li>
					                        <li class="tag tag-xs">
					                            <a href="mailbox-compose.html#"><i class="demo-pli-tag"></i> Film</a>
					                        </li>
					                        <li class="tag tag-xs">
					                            <a href="mailbox-compose.html#"><i class="demo-pli-tag"></i> Music</a>
					                        </li>
					                        <li class="tag tag-xs">
					                            <a href="mailbox-compose.html#"><i class="demo-pli-tag"></i> Photography</a>
					                        </li>
					                    </ul>-->

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
					                                <!--input type="email" id="inputEmail" name="to" value="<?php echo isset($_GET['mail']) ? $_GET['mail'] : "" ; ?> " class="form-control"-->
                                        <select data-live-search="true" name="to[]" data-width="100%" data-actions-box="true" class="selectpicker" multiple>
                                          @foreach ($members as $member)
                                            <option value="{{$member->email}}">{{ucwords($member->getFullname())}}</option>
                                          @endforeach
                                        </select>
					                            </div>
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
					                        <div class="form-group">
					                            <label class="col-lg-1 control-label text-left" for="inputSubject">Subject</label>
					                            <div class="col-lg-6">
					                                <input type="text" id="inputSubject" name="subject" class="form-control">
					                            </div>
					                        </div>

											<div class="form-group" style="display:none">
					                            <label class="col-lg-1 control-label text-left" for="inputSubject">Message</label>
					                            <div class="col-lg-11">
					                                <textarea name="message" id="message-textarea"></textarea>
					                            </div>
					                        </div>



					                    <!--Attact file button-->
					<!--                    <div class="media pad-btm">
					                        <div class="media-left">
					                            <span class="btn btn-default btn-file">
					                            Attachment <input type="file">
					                        </span>
					                        </div>
					                        <div id="demo-attach-file" class="media-body"></div>
					                    </div>-->


					                    <!--Wysiwyg editor : Summernote placeholder-->
					                    <div id="demo-mail-compose"></div>

					                    <div class="pad-ver">

					                        <!--Send button-->
					                        <button id="mail-send-btn" type="submit" class="btn btn-primary">
					                            <i class="demo-psi-mail-send icon-lg icon-fw"></i> Send Mail
					                        </button>

					                        <!--Save draft button-->
					                        <!--<button id="mail-save-btn" type="button" class="btn btn-default">
					                            <i class="demo-pli-mail-unread icon-lg icon-fw"></i> Save Draft
					                        </button>-->

					                        <!--Discard button-->
					                        <!--<button id="mail-discard-btn" type="button" class="btn btn-default">
					                            <i class="demo-pli-mail-remove icon-lg icon-fw"></i> Discard
					                        </button>-->
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
