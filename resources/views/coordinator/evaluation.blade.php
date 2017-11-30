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
				<div class="ui breadcrumb">
				  <a class="section" href="{{url('account/coordinator/coordinator')}}"><span class="fa fa-exchange" aria-hidden="true"></span> Enrollment Request Feed</a> 
				  <span class="blue-text">/</span>
				  <a class="active section">{{$information->firstname}} {{$information->lastname}}</a>
				</div>
			</div>
			<div class="card-content">
			
				 <div class="row">
				 	@include('includes.message')
					@if(count($schedules) > 0)
				  {!! Form::open(['action' => 'CoordinatorController@evaluated', 'method' => 'POST'],['id' => 'verify-form']) !!}
						<div class="row">
							<div class="header">{{$information->firstname}} {{$information->lastname}} standing:</div>
							<input type="hidden" id="current" value="{{$information->year_level}}">
							 <select id="standing" name="standing" require>
						       <option value="1">1st year</option>
						       <option value="2">2nd year</option>
						       <option value="3">3rd year</option>
						       <option value="4">4th year</option>
						   </select>
						 </div>

						<div class="ui attached message">
						  <div class="header">
						   	Subject Evaluation
						  </div>
						  <p>Evaluate {{$information->firstname}} {{$information->lastname}}'s selected subjects with schedule for enrollment.  </p>
						</div>
			            <table class="ui celled padded table attached">
		                  <thead>
                              <th>Schedule Day</th>
                              <th>Time</th>
                              <th>Subject</th>
                              <th>Room</th>
                              <th>Faculty</th>
                              <th>Select</th>
                          </thead>
			          
			              <tbody>
			                 @foreach($schedules as $schedule)
                                   <tr>
                                     <td>{{$schedule->schedule_day}}</td>
                                     <td>{{Date('g:i A', strtotime($schedule->start_time))}} - {{Date('g:i A', strtotime($schedule->end_time))}}</td>
                                     <td>{{$schedule->subject}}</td>
                                     <td>{{$schedule->room}}</td>
                                     <td>{{$schedule->faculty_name}}</td>
                                    
                              
                                   	 	<td id="checkboxes" class="center"><p class="center">
									      <input type="checkbox" class="verify-check" id="{{$schedule->schedule_id}}" name="schedule_id[]" value="{{$schedule->schedule_id}}" />
									      <label for="{{$schedule->schedule_id}}"></label>
									   </p></td>
								
                                  </tr>
                              @endforeach
			              </tbody>
			            </table>

			            	<div class="ui attached negative message notify">
								  <div class="header">
								   	Notify {{$information->firstname}} {{$information->lastname}} why selected subjects is rejected:
								  </div>
								 <div class="ui form">
								 	<input type="hidden" name="student_email" value="{{$information->email}}">
								 	<input type="hidden" name="notification_id" value="{{$notification_id}}">
								  <div class="field">
									    <textarea rows="3" name="notification"></textarea>
									  </div>
						        </div>
						        <br>
						        <button type="submit" name="rejected" class="waves-effect waves-light btn green"><i class="material-icons left">send</i>Send</button> <a class="waves-effect waves-light btn red cancel"><i class="material-icons left">close</i>Cancel</a> 
							</div>


							<div class="ui attached negative message confirm">
								  <div class="header">
								   	Are you sure you already evaluated student subjects and want to submit?
								  </div>
								 <div class="ui form">
								 	<input type="hidden" name="student_email" value="{{$information->email}}">
								
						        </div>
						        <br>
						        <button type="submit" name="granted" class="waves-effect waves-light btn green"><i class="material-icons left">check</i>Yes</button> <a class="waves-effect waves-light btn red cancel"><i class="material-icons left">close</i>No</a> 
							</div>

			            	<div class="card-action right buttons"><a   class="waves-effect waves-light btn green submit"><i class="material-icons left">check</i>Submit to registrar</a> <a class="waves-effect waves-light btn red reject"><i class="material-icons left">close</i>Reject selected</a> </div>
			            	 {!! Form::close() !!}
                       		
                      @else
                           <div class="row center">
			       					<h5><span class="fa fa-search"></span> No schedules found.</h5>
			       			</div>
                      @endif
				 </div>
			</div>
		</div>
	</div>

</div>

<script>
	 $(document).ready(function() {

	 	 $('.notify').hide();
	 	  $('.confirm').hide();
	 	 $('.buttons').hide();

	 	 var current = $('#current').val();

	 	 $('#standing').val(current);

	 	 $('.reject').click(function(){
	 	 	$('.notify').show();
	 	 	 $('.buttons').hide();
	 	 });

	 	  $('.submit').click(function(){
	 	 	$('.confirm').show();
	 	 	 $('.buttons').hide();
	 	 });

	 	  $('.cancel').click(function(){
	 	 	$('.notify').hide();
	 	 	$('.confirm').hide();
	 	 	$('.buttons').show();
	 	 });
	 	
   		
   		 var $checkboxes = $('#checkboxes input[type="checkbox"]');

		  $checkboxes.change(function(){
	        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
		      	if(countCheckedCheckboxes > 0) {
			       $('.buttons').show();
			    } else {
			       $('.buttons').hide();
			        $('.notify').hide();
			    }
	    });

     
   		
  
  	});
</script>
@endsection