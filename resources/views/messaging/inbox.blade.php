@extends('layouts.app')

@section('title') Communicator - Chat @endsection

@section('content')
            <!--CONTENT CONTAINER-->
            <!--===================================================-->
            <div id="content-container">
                <div id="page-head">
                  <!--Page Title-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <div id="page-title">
                      <h1 class="page-header text-overflow">Communicator</h1>
                  </div>
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!--End page title-->


                  <!--Breadcrumb-->
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-home"></i><a href="{{route('dashboard')}}"> Dashboard</a>
                    </li>
                      <li class="active">Chat</li>
                  </ol>
                  <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                  <!--End breadcrumb-->
                </div>


                <!--Page content-->
                <!--===================================================-->
                <div id="page-content">

                        <div class="panel" style="background-color: #e8ddd3;">
                          @if (session('status'))
                            <!-- Line Chart -->
                            <!---------------------------------->
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
                            <!---------------------------------->
                          @endif
                  <?php //print_r($msg_user); print('<br></br>'); print_r($members); ?>
                  <br><br><br>
                  <div class="container" style="overflow:scroll">
                    <div class="panel messages-panel">
                        <div class="contacts-list">
                            <div class="inbox-categories">
                                <div data-toggle="tab" data-target="#inbox,#welcome-box" class="active" onclick="clr_msg_box();"> Inbox </div>
                                <div data-toggle="tab" data-target="#online,#welcome-box" onclick="clr_msg_box();"> Active Branches </div>
                                <!--div data-toggle="tab" data-target="#sent"> Sent </div>
                                <div data-toggle="tab" data-target="#marked"> Marked </div>
                                <div data-toggle="tab" data-target="#drafts"> Drafts </div-->
                            </div>
                            <div class="tab-content" style="background-color:#afbfd8">
                                <div id="inbox" class="contacts-outter-wrapper tab-pane active">
                                    <!--form class="panel-search-form info form-group has-feedback no-margin-bottom">
                                        <input type="text" class="form-control" name="search" placeholder="Search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                    </form-->
                                    <div class="contacts-outter">
                                        <ul class="list-unstyled contacts">
                                          <?php $user = \Auth::user()->branchcode; $username = \Auth::user()->branchname; ?>
                                          @foreach($msg_user as $branch)
                                            <li data-toggle="tab" data-target="#inbox-message" class="" onclick="get_msg('{{$user}}','{{$branch->branchcode}}')">
                                                <!--div class="message-count {{$branch->isOnline() ? 'online-count' : 'offline-count'}}"> {{$branch->count}} </div-->
                                                <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                                <div class="vcentered info-combo">
                                                    <h3 class="no-margin-bottom name"> {{$branch->branchname}}</h3>
                                                    <!--h5>$branch->lastmsg</h5-->
                                                    <!--p>hiii</p-->
                                                </div>
                                                <div class="contacts-add">
                                                    <span class="message-time"> <?php /* echo $branch->MaxDate == NOW() ? date('H:i',strtotime($branch->MaxDate)) : date('m/d',strtotime($branch->MaxDate)); */ ?> <sup></sup></span>
                                                    <!--i class="fa fa-trash-o"></i>
                                                    <i class="fa fa-paperclip"></i-->
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div id="online" class="contacts-outter-wrapper tab-pane">
                                    <!--form class="panel-search-form success form-group has-feedback no-margin-bottom">
                                        <input type="text" class="form-control" name="search" placeholder="Search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                    </form-->
                                    <div class="contacts-outter">
                                        <ul class="list-unstyled contacts success">
                                          @foreach($members as $branch)
                                          @if($branch->isOnline())
                                            <li data-toggle="tab" data-target="#inbox-message" onclick="get_msg('{{$user}}','{{$branch->branchcode}}')">
                                                <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                                <div class="vcentered info-combo">
                                                    <h3 class="no-margin-bottom name"> {{$branch->getName()}} </h3>
                                                      <div class="{{$branch->isOnline() ? 'online-count' : 'offline-count'}}"> </div><h5> <?php if($branch->isOnline()){echo '<p class="text-success">online</p>';} else {echo '<p class="text-danger">offline</p>';} ?></h5>

                                                </div>
                                                <!--div class="contacts-add">
                                                    <span class="message-time"> 2:24 {{$branch->isOnline()}}<sup>AM</sup></span>
                                                    <i class="fa fa-trash-o"></i>
                                                    <i class="fa fa-paperclip"></i>
                                                </div-->
                                            </li>
                                            @endif
                                            @endforeach

                                            @foreach($members as $branch)
                                            @if(!$branch->isOnline())
                                              <li data-toggle="tab" data-target="#inbox-message" onclick="get_msg({{$user}},{{$branch->branchcode}})">
                                                  <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                                  <div class="vcentered info-combo">
                                                      <h3 class="no-margin-bottom name"> {{$branch->getName()}} </h3>
                                                        <div class="offline-count"> </div><h5> <p class="text-danger">offline</p></h5>
                                                  </div>
                                                  <!--div class="contacts-add">
                                                      <span class="message-time"> 2:24 <sup>AM</sup></span>
                                                      <i class="fa fa-trash-o"></i>
                                                      <i class="fa fa-paperclip"></i>
                                                  </div-->
                                              </li>
                                              @endif
                                              @endforeach
                                        </ul>
                                    </div>

                                </div>
                                <div id="marked" class="contacts-outter-wrapper tab-pane">
                                    <form class="panel-search-form warning form-group has-feedback no-margin-bottom">
                                        <input type="text" class="form-control" name="search" placeholder="Search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                    </form>
                                    <div class="contacts-outter">
                                        <ul class="list-unstyled contacts warning">
                                            <li data-toggle="tab" data-target="#marked-message-1">
                                                <div class="message-count"> 2 </div>
                                                <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                                <div class="vcentered info-combo">
                                                    <h3 class="no-margin-bottom name"> Jessica Franco </h3>
                                                    <h5> Hello, Dennis. I wanted to let you know we reviewed your proposal and decided  </h5>
                                                </div>
                                                <div class="contacts-add">
                                                    <span class="message-time"> 1:44 <sup>AM</sup></span>
                                                    <i class="fa fa-trash-o"></i>
                                                    <i class="fa fa-paperclip"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="drafts" class="contacts-outter-wrapper tab-pane">
                                    <form class="panel-search-form dark form-group has-feedback no-margin-bottom">
                                        <input type="text" class="form-control" name="search" placeholder="Search">
                                        <span class="fa fa-search form-control-feedback"></span>
                                    </form>
                                    <div class="contacts-outter">
                                        <ul class="list-unstyled contacts dark">
                                            <li data-toggle="tab" data-target="#draft-message-1">
                                                <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                                <div class="vcentered info-combo">
                                                    <h3 class="no-margin-bottom name"> Milla Shiffman </h3>
                                                    <h5> Hello, Mila, can you send me the latest pack of icons, I need </h5>
                                                </div>
                                                <div class="contacts-add">
                                                    <span class="message-time"> 4:22 <sup>AM</sup></span>
                                                    <i class="fa fa-trash-o"></i>
                                                    <i class="fa fa-paperclip"></i>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- inbox -->
                        <div class="tab-content">
                            <div class="tab-pane message-body" id="inbox-message">
                                <div class="message-top bg-primary">
                                    <!--a class="btn btn btn-success new-message"> <i class="fa fa-envelope"></i> New Message </a-->
                                    <div class="">
                                      <h1 class="text-center text-white">Powered By Hoffenheim Technologies</h1>
                                    </div>
                                </div>

                                <div class="message-chat"  id="msg_chat">
                                    <div id="inbox-chat-body" class="chat-body">
                                      <div id="wait" style="display:none;width:69px;height:89px;position:absolute;top:50%;left:50%;padding:2px;">
                                        <img src="{{URL::asset('images/msg-loader.gif')}}" width="64" height="64" />
                                        <br>Loading..
                                      </div>
                                    </div>
                                    <!-- conversation end -->
                                    <div class="chat-footer">
                                      <form id="chat-form">
                                        <input id="reply-from" type="hidden" name="from" >
                                        <input id="reply-to" type="hidden" name="to" >
                                        @csrf
                                          <textarea id="reply-text" name="message" class="send-message-text"></textarea>
                                          <!--label class="upload-file">
                                              <input name="file" type="file">
                                              <i class="fa fa-paperclip"></i>
                                          </label-->
                                          <button id="reply-btn" type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- inbox end -->


                            <div class="tab-pane message-body active" id="welcome-box">
                              <div class="message-top bg-primary">
                                  <!--a class="btn btn btn-success new-message"> <i class="fa fa-envelope"></i> New Message </a-->
                                  <div class="">
                                    <h1 class="text-center text-white">Powered By Hoffenheim Technologies</h1>
                                  </div>
                                </div>

                                <div class="message-chat">
                                    <div id="inbox-chat-body" class="chat-body">
                                      <img class="center" src="{{URL::asset('images/chat.png')}}">
                                    </div>
                                    <!-- conversation end -->
                                    <div class="chat-footer">

                                    </div>
                                </div>
                            </div>

                            <!-- other messages inbox -->
                            <div class="tab-pane message-body" id="activity">
                                <div class="message-top">
                                    <a class="btn btn btn-success new-message"> <i class="fa fa-envelope"></i> New Message </a>

                                    <div class="new-message-wrapper">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Send message to...">
                                            <a class="btn btn-danger close-new-message" href="#"><i class="fa fa-times"></i></a>
                                        </div>

                                        <div class="chat-footer new-message-textarea">
                                            <textarea id="reply" class="send-message-text"></textarea>
                                            <label class="upload-file">
                                                <input type="file" required="">
                                                <i class="fa fa-paperclip"></i>
                                            </label>
                                            <button id="send-reply" type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="message-chat">
                                    <div class="chat-body">

                                        <div class="message my-message">
                                            <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                            <div class="message-body">
                                                <div class="message-body-inner">
                                                    <div class="message-info">
                                                        <h4> Dennis Novac </h4>
                                                        <h5> <i class="fa fa-clock-o"></i> 2:05 PM </h5>
                                                    </div>
                                                    <hr>
                                                    <div class="message-text">
                                                        Hi, I've just finished the stickers you wanted. I'll send them to you in an archive in 10 minutes.
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="message success">
                                            <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                            <div class="message-body">
                                                <div class="message-info">
                                                    <h4> David Beckham </h4>
                                                    <h5> <i class="fa fa-clock-o"></i> 2:11 PM </h5>
                                                </div>
                                                <hr>
                                                <div class="message-text">
                                                    Hello, Dennis. Thanks. Also how's it going with our latest football website. Do you need any additional help or information?
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="message success">
                                            <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                            <div class="message-body">
                                                <div class="message-info">
                                                    <h4> David Beckham </h4>
                                                    <h5> <i class="fa fa-clock-o"></i> 2:24 PM </h5>
                                                </div>
                                                <hr>
                                                <div class="message-text">
                                                    I would like to take a look at it this evening, is it possible ?
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                        <div class="message my-message">
                                            <img alt="" class="img-circle medium-image" src="https://bootdey.com/img/Content/avatar/avatar1.png">

                                            <div class="message-body">
                                                <div class="message-body-inner">
                                                    <div class="message-info">
                                                        <h4> Dennis Novac </h4>
                                                        <h5> <i class="fa fa-clock-o"></i> 2:25 PM </h5>
                                                    </div>
                                                    <hr>
                                                    <div class="message-text">
                                                        It's going well, no need for any other help, thanks. Sure, send me a message when you'll be ready.
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </div>

                                    </div>

                                    <div class="chat-footer">
                                        <textarea class="send-message-text"></textarea>
                                        <label class="upload-file">
                                            <input type="file" required="">
                                            <i class="fa fa-paperclip"></i>
                                        </label>
                                        <button type="button" class="send-message-button btn-info"> <i class="fa fa-send"></i> </button>
                                    </div>
                                </div>
                            </div>

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
