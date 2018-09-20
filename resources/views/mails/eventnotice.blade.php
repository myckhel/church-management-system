Hello,
This is to notify you that you have been assigned to an event from
<?php echo ucwords(\Auth::user()->branchname.' '.\Auth::user()->branchcode); ?>.

<h2><b>Event Details:</b></h2>
<?php

?>
<p>title: {{ $request->get('title') }}</p>
<p>location: {{ $request->get('location') }}</p>
<p>time: {{$request->get('time')}}</p>
<p>assign_to: {{$request->get('title')}}</p>
<p>by_who: {{$request->get('by_who')}}</p>
<p>details: {{$request->get('details')}}</p>

<h3>Thank You</h3>
{{ Auth::user()->branchname }}
