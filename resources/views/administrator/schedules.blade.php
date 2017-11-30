@extends('layouts.app')
@section('content')
<br>
<div class="row profile">

	<div class="col s3">
		@include('administrator.sidenav')
	</div>

	<div class="col s9">
		<div class="card">	
		   <div class="ui attached message">
			  <div class="header pink-text">
			  	@if(count($schedules) > 0)
					 <i class="fa fa-calendar" aria-hidden="true"></i> Schedules ({{count($schedules)}})
				@else
					<i class="fa fa-users" aria-hidden="true"></i> Schedules (0)
				@endif
			  </div> 
			  <p>School year {{$school_year}} and {{$semester->description}} schedules. </p>
			</div>
			<div class="card-content">
				<div class="row">
				      <div class="col s3">
				      	  <select id="schedule_day" required>
						      <option value="" disabled selected>Select days</option>
						      <option value="MTH">Monday - Thursday</option>
						      <option value="TF">Tuesday - Friday</option>
						      <option value="WED">Wednesday</option>
						      <option value="SAT">Saturday</option>
							</select>
				      </div>
				      <div class="col s3">
				       	  <select id="school_year">
						      <option value="" disabled>Sort by school year</option>
						      @foreach($sy as $year)
						      	<option value="{{$year->school_year}}">{{$year->school_year}}</option>
						      @endforeach
						   </select>
				      </div>
				      <div class="col s3">
				          <select id="semester">
				          
						      <option value="" disabled>Sort by semester</option>
						      <option value="1">1st semester</option>
						      <option value="2">2nd semester</option>
						      <option value="3">summer</option>
						   </select>
				      </div>
				      <div class="col s3">
				           <input placeholder="Search" id="search" type="text" class="validate">
				      </div>


				      <input type="hidden" id="sem" value="{{$semester->semester}}">
				      <input type="hidden" id="sy" value="{{$school_year}}">
				</div> 

					@include('includes.message')
				@if(count($schedules) > 0)
						
								<div class="ui warning message onremove">
						      <div class="header">
						        Are you sure you want to remove schedule?
						      </div>
						    {!! Form::open(['action' => 'AdminController@remove_schedule', 'method' => 'POST']) !!}
						     <div class="ui form">
						      <input type="hidden" name="schedule_id" id="schedule_id">
						        <button type="submit" name="rejected" class="waves-effect waves-light btn green">Yes</button> <a href="{{url('account/registrar/schedules')}}" class="waves-effect waves-light btn red cancel">No</a> 
						      </div>
						      {!! Form::close() !!}
						  </div>
                            <table class="ui celled padded table attached">
                              <thead>
                                  <th>Schedule Day</th>
                                  <th>Time</th>
                                  <th>Subject</th>
                                  <th>Room</th>
                                  <th>Faculty</th>
                                  <th>Slots</th>
                                  <th>Status</th>
                                  <th class="center">Actions</th>
                              </thead>
                          
                              <tbody>
                                  @foreach($schedules as $schedule)
                                   <tr>
                                     <td>{{$schedule->schedule_day}}</td>
                                     <td>{{Date('g:i A', strtotime($schedule->start_time))}} - {{Date('g:i A', strtotime($schedule->end_time))}}</td>
                                     <td>{{$schedule->subject}}</td>
                                     <td>{{$schedule->room}}</td>
                                     <td>{{$schedule->faculty_name}}</td>
                                     <td>{{$schedule->slots}}</td>
                                      @if($schedule->status == 0)
                                        <td class="white-text red">Close</td>
                                      @else
                                        <td class="white-text green">Open</td>
                                      @endif
                                     <td> <button data-activates="options" class="btn-flat pink-text dropdown-button schedule"
                                        data-schedule_id="{{$schedule->schedule_id}}"  
                                        data-schedule_day="{{$schedule->schedule_day}}"
                                        data-start_time="{{$schedule->start_time}}"
                                        data-end_time="{{$schedule->end_time}}"
                                        data-subject_id="{{$schedule->subject_id}}"
                                        data-room="{{$schedule->room}}"
                                        data-faculty_id="{{$schedule->faculty_id}}"
                                        data-slots="{{$schedule->slots}}"
                                 

                                        ><i class="material-icons">more_vert</i></button></td>
                                   
                                  </tr>
                                  
                                  @endforeach
                              </tbody>
                            </table>
                       		<div class="row center">
			       					{{ $schedules->links() }}
			       			</div>
                      @else
                           <div class="row center">
		       					 <div class="ui message warning">
								  <div class="content">
								    <div class="header">
								        Searching for "{{$results}}" no matched found.
								    </div>
								  </div>
								</div>
			       			</div>
                      @endif
			</div>
		</div>
	</div>

</div>

 <!-- Edit schedule -->
 <div id="editSchedule" class="modal modal-fixed-footer">
 {!! Form::open(['action' => 'AdminController@edit_schedule', 'method' => 'POST']) !!}
    <div class="modal-content">
      <h5 class="center" id="sched-title"> Edit Schedule</h5>
      <br>
      <input  id="schedule_id" name="schedule_id" type="hidden" class="validate">
      <div class="ui attached info message">
		  <p><span class="fa fa-info-circle"></span> Schedule will be added in current school year and semester.</p>
		</div>
   	<br>
   
	    <div class="row">
	        <div class="col s6">
	        <label for="schedule_day">Schedule day:</label>
	         <select name="schedule_day" id="schedule_day" required>
			      <option value="MTH">Monday - Thursday</option>
			      <option value="TF">Tuesday - Friday</option>
			      <option value="WED">Wednesday</option>
			      <option value="SAT">Saturday</option>
				</select>
	        </div>

	        <div class="col s6">
	          <label for="start_time">Start time:</label>
	          <input id="start_time" type="time" class="validate" name="start_time" required>
	        </div>
        </div>

        <div class="row">
	         <div class="col s6">
	          <label for="end_time">End time:</label>
	          <input id="end_time" type="time" class="validate" name="end_time" required>
	        </div>

	         <div class="col s6">
	          <label for="room">Room:</label>
	          <input  id="room" type="text" class="validate" name="room" required>
	        </div>
        </div>

         <div class="row">

         	<div class="col s6">
         	 <label for="course_id">Assign faculty</label>
	          <select name="faculty_id" id="faculty_id" required>
			       @foreach($faculties as $faculty)
						<option value="{{$faculty->faculty_id}}">{{$faculty->faculty_name}}</option>
				   @endforeach
				</select>
	          
	        </div>
	         <div class="col s6">
	         	<label for="slots">Available slots:</label>
		        <input id="slots" type="number" class="validate" name="slots" required>
	        </div>
        </div>

   
    </div>
    <div class="modal-footer">
    	 <button type="submit" class="modal-action modal-close waves-effect waves-green btn green">Save schedule</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn red ">Close</a>
    </div>

    {!! Form::close() !!}
 </div>



  <!-- Subjects options -->
  <ul id='options' class='dropdown-content'>
  
    <li><a href="#editSchedule" class="blue-text center modal-trigger"><span class="fa fa-pencil"></span></a></li>
    <li class="divider"></li>
    <li><a href="#" class="red-text center delete"><span class="fa fa-trash"></span></a></li>
    <li class="divider"></li>

  </ul>


<script>
	 $(document).ready(function() {

	 	 $('.modal').modal();
	 	 $('select').material_select();

	 	 // Defaults sem and school year
	 	 var sem = $('#sem').val();
	 	 var sy = $('#sy').val();

	 	 var url      = window.location.href;  
	 	 $('#semester').val('1');
	 	 $('#school_year').val(sy);
                                 
	 	  	$('.onremove').hide();
	 	 $(".schedule").click(function() {

        
      		
          	var schedule_id 	= $(this).data("schedule_id");
          	var schedule_day 	= $(this).data("schedule_day");
          	var start_time 		= $(this).data("start_time");
          	var end_time 		= $(this).data("end_time");
          	var subject_id 		= $(this).data("subject_id");
          	var room 			= $(this).data("room");
          	var faculty_id 		= $(this).data("faculty_id");
          	var slots 			= $(this).data("slots");

          	$("#schedule_id").val(schedule_id);
			$("#schedule_day").val(schedule_day);
			$("#start_time").val(start_time);
			$("#end_time").val(end_time);
			$("#subject_id").val(subject_id);
			$("#room").val(room);
			$("#faculty_id").val(faculty_id);
			$("#slots").val(slots);

    	});


	 	 	$('.delete').click(function(){
			$('.onremove').show();
		});

	 	$( "#schedule_day" ).change(function() {
           window.location.href =	updateQueryStringParameter( url, 'schedule_day', $(this).val())
            
        });


        $( "#semester" ).change(function() {
           window.location.href =	updateQueryStringParameter( url, 'semester', $(this).val())
            
        });

         $( "#school_year" ).change(function() {
           window.location.href =	updateQueryStringParameter( url, 'school_year', $(this).val())
            
        });

	 	 $('#search').keypress(function (e) {
		  if (e.which == 13) {
		   	 window.location.href =	updateQueryStringParameter( url, 'search', $(this).val())
		  }
		});

        function updateQueryStringParameter(uri, key, value) {
			  var re = new RegExp("([?&])" + key + "=.*?(&|#|$)", "i");
			  if( value === undefined ) {
			  	if (uri.match(re)) {
					return uri.replace(re, '$1$2');
				} else {
					return uri;
				}
			  } else {
			  	if (uri.match(re)) {
			  		return uri.replace(re, '$1' + key + "=" + value + '$2');
				} else {
			    var hash =  '';
			    if( uri.indexOf('#') !== -1 ){
			        hash = uri.replace(/.*#/, '#');
			        uri = uri.replace(/#.*/, '');
			    }
			    var separator = uri.indexOf('?') !== -1 ? "&" : "?";    
			    return uri + separator + key + "=" + value + hash;
			  }
			  }  
		}
  
  	});
</script>
@endsection