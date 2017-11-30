@extends('layouts.app')
@section('content')
<div class="row coordinator">

	<div class="col m4">
		@include('coordinator.sidenav')
	</div>

	<div class="col m8">
		<br>
		
		<div class="ui attached card">
			<div class="ui attached message">
			  <div class="header">
			   <i class="fa fa-exchange" aria-hidden="true"></i> Enrollment Request Feed 
			  </div>
			  <div class="content">
			  	@if(count($notifications) > 0)
						{{count($notifications)}} enrollment request waiting for evaluation.
				@else
				
				@endif
			  </div>
			</div>
			<div class="card-content">
				
				@include('includes.message')
				 <div class="row">
				 	 @if(count($notifications) > 0)
				 	 	  @foreach($notifications as $notification)

				 	 	  	@if($notification->type == 2)

				 	 	  		<div class="ui warning message ">
								  <div class="content">
								    <a class="header" href="{{url('account/coordinator/request')}}/{{$notification->sent_from}}/{{$notification->notification_id}}">
								    	{{$notification->notification}}
								    </a>
								    <p>{{Date('F d, Y - g:i A', strtotime($notification->date_sent))}}</p>
								  </div>
								</div>
								<div class="divider"></div>

				 	 	  	@endif
					   
							   
					    @endforeach

					 @else
					 	<div class="ui attached warning message">
						  <div class="header">
						     No evaluation request yet.
						  </div>
						  <div class="content">
						     Reload page to refresh list.
						  </div>
						</div>
				 	 @endif
				 </div>

				



			</div>
		</div>
	</div>

</div>
@endsection