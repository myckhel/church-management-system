
@extends('layouts.app')

@section('title') Mail Ticket @endsection

@section('content')
<div id="content-container">
	<div id="page-head">


<p>
You received a message from : {{ $Email }}
</p>


 Error Code : {{$ErrorCode }}  ||  Ticket ID : {{$TicketID}}  ||  Error Name : {{$ErrorName }}

<p>
Name: {{$Name}}
</p>

<p>
Email: {{$Email}}
</p>



<p>
Severity: {{$Severity}}
</p>


<p>
Service Level: {{$ServiceLevel}}
</p>

<p>
Time: {{$Time}}
</p>


<p>
Date: {{$Date}}
</p>

<p>
Phone Number: {{$PhoneNumber}}
</p>

<p>
Message: {{$kmessage}}
</p>


	</div>
	<!--===================================================-->
	<!--End page content-->

</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->

@endsection
