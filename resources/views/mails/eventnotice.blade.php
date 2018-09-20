Hello,
This is to notify you that you have been assigned to an event from <?php \Auth::user()->branchname.' '.\Auth::user()->branchcode ?>.

<p><b>Event Details:</b></p>
<?php

?>
title: {{ $request->get('title') }}
location: {{ $request->get('location') }}
time: {{$request->get('time')}}
assign_to: {{$request->get('title')}}
by_who: {{$request->get('by_who')}}
details: {{$request->get('details')}}

Thank You,
{{ App\Auth::user()->branchname }}
