@extends('layouts.app')
@section('content')
<div class="row coordinator">

	<div class="col m4">
		@include('coordinator.sidenav')
	</div>

	<div class="col m8">
		<br>
		<div class="card attached">	
			<div class="ui attached message">
				<div class="header">
					<span class="card-title"><i class="fa fa-user" aria-hidden="true"></i> {{$information->firstname}} {{$information->lastname}} - 
					@if($information->enrolled == 1)
						<span class="green-text">Enrolled</span>
					@else
						<span class="red-text">Not Enrolled</span>
					@endif
				</span>
				</div>
			</div>
			<div class="card-content">
				
				 <div class="row">
					    <div class="col s12">
					      <ul class="tabs">
					        <li class="tab col s3"><a href="#information">Information</a></li>
					        <li class="tab col s3"><a href="#subjects">Subjects</a></li>
					        <li class="tab col s3"><a href="#schedules">Schedules</a></li>
					      </ul>
					    </div>
					    <br>
					     <div id="information" class="col s12">
							  <ul class="collection">
							      <li class="collection-item">First Name: {{$information->firstname}} </li>
							      <li class="collection-item">Middle Name: {{$information->middlename}}</li>
							      <li class="collection-item">Last Name: {{$information->lastname}}</li>
							      <li class="collection-item">Gender: {{$information->gender}}</li>
							      <li class="collection-item"><i class="fa fa-calendar" aria-hidden="true"></i> Birthday: {{Date('F d, Y',strtotime($information->date_of_birth))}}</li>
							      <li class="collection-item">Civil Status: {{$information->civil_status}}</li>
							      <li class="collection-item"><i class="fa fa-home" aria-hidden="true"> </i> Home Address: {{$information->home_address}}</li>
							      <li class="collection-item"><i class="fa fa-phone" aria-hidden="true"></i> Phone: {{$information->phone}}</li>
							      <li class="collection-item">Place of Birth: {{$information->place_of_birth}}</li>
							      <li class="collection-item">City: {{$information->city}}</li>
							      <li class="collection-item">Province: {{$information->province}}</li>
							      <li class="collection-item">Country: {{$information->country_name}}</li>
							      <li class="collection-item">Zipcode: {{$information->zipcode}}</li>
							      <li class="collection-item">Guardian: {{$information->guardian}}</li>
							      <li class="collection-item">Guardian Relationship: {{$information->guardian_relationship}}</li>
							      <li class="collection-item"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Basic Education: {{$information->basic_education}}</li>
							      <li class="collection-item"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Secondary Education: {{$information->secondary_education}}</li>
							      <li class="collection-item"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>College Education: {{$information->college_education}}</li>
							      <li class="collection-item">Date Registered: {{Date('F d, Y',strtotime($information->date_enrolled))}}</li>

						    </ul>
					     </div>
					     <div id="subjects" class="col s12">
					     	 <br>
					     	 <ul class="collapsible" data-collapsible="accordion">
							    <li>
							      <div class="collapsible-header"><i class="material-icons">bookmark</i>First Year</div>
							      <div class="collapsible-body">
							      	@if(count($firstyear) > 0)
								            <table class="ui celled padded table">
								              <thead>
								                  <th>Subject</th>
								                  <th>Descriptive title</th>
								                  <th>Lec</th>
								                  <th>Lab</th>
								                  <th>Credit Units</th>
								                  <th>Total hrs / week</th>
								                  <th>Pre-req</th>
								              </thead>
								          
								              <tbody>
								                  @foreach($firstyear as $subject)
								                   <tr>
								                     <td>{{$subject->subject}}</td>
								                     <td>{{$subject->descriptive}}</td>
								                     <td>{{$subject->lec}}</td>
								                     <td>{{$subject->lab}}</td>
								                     <td>{{$subject->credit_units}}</td>
								                     <td>{{$subject->total_hours}}</td>
								                     <td>{{$subject->pre_req}}</td>
								                  </tr>
								                  @endforeach
								              </tbody>
								            </table>
								       
								      @else
								         	<div class="row center">
								         		 <div class="ui warning message">
								         		 	<div class="header">No subjects yet</div>
										  		</div>
								         	</div>				
								      @endif
							      </div>
							    </li>
							    <li>
							      <div class="collapsible-header"><i class="material-icons">bookmark</i>Second Year</div>
							      <div class="collapsible-body">
							      	 @if(count($secondyear) > 0)
								            <table class="ui celled padded table">
								              <thead>
								                  <th>Subject</th>
								                  <th>Descriptive title</th>
								                  <th>Lec</th>
								                  <th>Lab</th>
								                  <th>Credit Units</th>
								                  <th>Total hrs / week</th>
								                  <th>Pre-req</th>
								              </thead>
								          
								              <tbody>
								                  @foreach($secondyear as $subject)
								                   <tr>
								                     <td>{{$subject->subject}}</td>
								                     <td>{{$subject->descriptive}}</td>
								                     <td>{{$subject->lec}}</td>
								                     <td>{{$subject->lab}}</td>
								                     <td>{{$subject->credit_units}}</td>
								                     <td>{{$subject->total_hours}}</td>
								                     <td>{{$subject->pre_req}}</td>
								                  </tr>
								                  @endforeach
								              </tbody>
								            </table>
								       
								      @else
								         	<div class="row center">
								         		 <div class="ui warning message">
								         		 	<div class="header">No subjects yet</div>
										  		</div>
								         	</div>		
								      @endif
							      </div>
							    </li>
							    <li>
							     <div class="collapsible-header"><i class="material-icons">bookmark</i>Third Year</div>
							      <div class="collapsible-body">
							      		 @if(count($thirdyear) > 0)
								            <table class="ui celled padded table">
								              <thead>
								                  <th>Subject</th>
								                  <th>Descriptive title</th>
								                  <th>Lec</th>
								                  <th>Lab</th>
								                  <th>Credit Units</th>
								                  <th>Total hrs / week</th>
								                  <th>Pre-req</th>
								              </thead>
								          
								              <tbody>
								                  @foreach($thirdyear as $subject)
								                   <tr>
								                     <td>{{$subject->subject}}</td>
								                     <td>{{$subject->descriptive}}</td>
								                     <td>{{$subject->lec}}</td>
								                     <td>{{$subject->lab}}</td>
								                     <td>{{$subject->credit_units}}</td>
								                     <td>{{$subject->total_hours}}</td>
								                     <td>{{$subject->pre_req}}</td>
								                  </tr>
								                  @endforeach
								              </tbody>
								            </table>
								       
								      @else
								         	<div class="row center">
								         		 <div class="ui warning message">
								         		 	<div class="header">No subjects yet</div>
										  		</div>
								         	</div>		
								      @endif
							      </div>
							    </li>
							     <li>
							     <div class="collapsible-header"><i class="material-icons">bookmark</i>Fourth Year</div>
							      <div class="collapsible-body">
							      		 @if(count($fourthyear) > 0)
								            <table class="ui celled padded table">
								              <thead>
								                  <th>Subject</th>
								                  <th>Descriptive title</th>
								                  <th>Lec</th>
								                  <th>Lab</th>
								                  <th>Credit Units</th>
								                  <th>Total hrs / week</th>
								                  <th>Pre-req</th>
								              </thead>
								          
								              <tbody>
								                  @foreach($fourthyear as $subject)
								                   <tr>
								                     <td>{{$subject->subject}}</td>
								                     <td>{{$subject->descriptive}}</td>
								                     <td>{{$subject->lec}}</td>
								                     <td>{{$subject->lab}}</td>
								                     <td>{{$subject->credit_units}}</td>
								                     <td>{{$subject->total_hours}}</td>
								                     <td>{{$subject->pre_req}}</td>
								                  </tr>
								                  @endforeach
								              </tbody>
								            </table>
								       
								      @else
								         	<div class="row center">
								         		 <div class="ui warning message">
								         		 	<div class="header">No subjects yet</div>
										  		</div>
								         	</div>		
								      @endif
							      </div>
							    </li>
							  </ul>
					     </div>
					     <div id="schedules" class="col s12">
					     	<br>
					     @if($information->enrolled = 1)	
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
	</div>

</div>

<script>
	 $(document).ready(function() {

	 	 $('.notify').hide();
	 	 $('.buttons').hide();

	 	 var current = $('#current').val();

	 	 $('#standing').val(current);

	 	 $('.reject').click(function(){
	 	 	$('.notify').show();
	 	 	 $('.buttons').hide();
	 	 });

	 	  $('.cancel').click(function(){
	 	 	$('.notify').hide();
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