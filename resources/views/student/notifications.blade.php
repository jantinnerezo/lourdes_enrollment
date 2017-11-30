@extends('layouts.app')
@section('content')
<br>
<div class="row profile">

	<div class="col s3">
		@include('student.sidenav')
	</div>

	<div class="col s9">
		
		<div class="card attached notifications">
			<div class="ui attached message ">
				  <div class="content">
				    <div class="header">
				    	<span class="fa fa-rss"></span> Notification Feed
				    </div>
				  </div>
			</div>
			<div class="card-content">
				
				@if(count($notifications) > 0 )

					@foreach($notifications as $notification)

						<div class="ui info message ">
						  <div class="content">
						    <div class="header">
						    	{{$notification->name}}
						    </div>
						    <p class="black-text">{{$notification->notification}}</p>
						    <p>{{Date('F d, Y - g:i A', strtotime($notification->date_sent))}}</p>
						  </div>
						</div>
						<div class="divider"></div>
					@endforeach

				@else

					<div class="ui warning message center">
						  <div class="content">
						     No notifications
						  </div>
					</div>


				@endif
				  
			</div>
		</div>
	</div>

</div>
@endsection