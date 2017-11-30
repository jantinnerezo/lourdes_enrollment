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
				    	<span class="fa fa-calendar"></span> My Schedules
				    </div>
				    <p>List of your schedules for this sem.</p>
				  </div>
			</div>
			<div class="card-content">
				
				@include('includes.message')

				@if($information->enrolled == 1)
					@if(count($schedules) > 0)
			            <table class="ui celled padded table attached">
		                  <thead>
                              <th>Schedule Day</th>
                              <th>Time</th>
                              <th>Subject</th>
                              <th>Room</th>
                              <th>Faculty</th>
                          </thead>
			          
			              <tbody>
			                 @foreach($schedules as $schedule)
                                   <tr>
                                     <td>{{$schedule->schedule_day}}</td>
                                     <td>{{Date('g:i A', strtotime($schedule->start_time))}} - {{Date('g:i A', strtotime($schedule->end_time))}}</td>
                                     <td>{{$schedule->subject}}</td>
                                     <td>{{$schedule->room}}</td>
                                     <td>{{$schedule->faculty_name}}</td>
                                  </tr>
                              @endforeach
			              </tbody>
			            </table>

			 
			      	@else
			           <div class="ui warning message ">
					  		<div class="content">
					   			 <div class="header center">
					    			<span class="fa fa-frown-o"></span> You've no schedule added for this semester and school year.
					   			 </div>
					  		</div>
						</div>
			      	@endif
				@else
					<div class="ui warning message ">
					  <div class="content">
					    <div class="header">
					    	<span class="fa fa-frown-o"></span> You are currently not enrolled.
					    </div>
					  </div>
					</div>
				@endif

			</div>
		</div>
	</div>

</div>
@endsection