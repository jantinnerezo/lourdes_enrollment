@extends('layouts.app')


@section('content')
	
	<div class="container mtop">
		
		<div class="card attached">
			<div class="ui attached message">
		  <div class="header pink-text">
		   	<i class="fa fa-book" aria-hidden="true"></i> {{session('course')}}-{{session('year')}} schedules 
		  </div>
		  <p>Schedules are automatically filtered depending on your course and year to limit the data shown on the table.</p>
		</div>
			<div class="card-content">
				

				<div class="row">
				      <div class="col s4">
				       	   <select id="day" required>
						      <option value="" disabled selected>Select days</option>
						      <option value="MTH">Monday - Thursday</option>
						      <option value="TF">Tuesday - Friday</option>
						      <option value="WED">Wednesday</option>
						      <option value="SAT">Saturday</option>
							</select>
				      </div>
				      <div class="col s4">
				         
				      </div>
				      <div class="col s4">
				           <input placeholder="Search" id="search" type="text" class="validate">
				      </div>
				</div> 
				@include('includes.message')
					@if(count($schedules) > 0)

					
						<br>
						<div class="ui attached message">
						  <div class="header">
						   	How to enroll?
						  </div>
						  <p>Simply check the checkboxes of the choosen schedules and click the enroll button</p>
						</div>
			            <table class="ui celled padded table attached">
		                  <thead>
                              <th>Schedule Day</th>
                              <th>Time</th>
                              <th>Subject</th>
                              <th>Room</th>
                              <th>Faculty</th>
                              <th>Status</th>
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
                                    
                                      @if($schedule->slots > 0)
                                        <td class="white-text green">Open</td>
                                      @else
                                        <td class="white-text red">Close</td>
                                      @endif
                                {!! Form::open(['action' => 'StudentController@submit_enrollment', 'method' => 'POST'],['id' => 'verify-form']) !!}

                                	  @if($schedule->slots > 0)
                                	  	 <td id="checkboxes" class="center-align"><p class="center-align">
									      <input type="checkbox" class="verify-check center-align" id="{{$schedule->schedule_id}}" name="schedule_id[]" value="{{$schedule->schedule_id}}" />
									      <label for="{{$schedule->schedule_id}}"></label>
									   </p></td>
                                	  @else
                                	  	<td>
                                	  		<h5 class="red-text center-align"><span class="fa fa-ban"></span></h5>
									   </td>
                                	  @endif
                                   	 	
								
                                  </tr>
                              @endforeach
			              </tbody>
			            </table>
			            	<div class="ui negative message confirmation">
								  <div class="header">
								   	Are you sure you want to submit subjects?
								  </div>
							
						        <br>
						        <button type="submit" name="rejected" class="waves-effect waves-light btn green"><i class="material-icons left">check</i>Yes</button> <a class="waves-effect waves-light btn red cancel"><i class="material-icons left">close</i>Cancel</a> 
						</div>
			            	<div class="card-action right buttons"><a  class="waves-effect waves-light btn green submit"><i class="material-icons left">check</i>Submit</a></div>
			            	 {!! Form::close() !!}
			       <div class="row center">
			       		{{ $schedules->links() }}
			       </div>
			      @else
			           <div class="row center">
			         		 <div class="ui warning message">
  									<p><i class="fa fa-search" aria-hidden="true"></i> No schedules posted yet.</p>
					  		</div>
			         	</div>	
			      @endif
			</div>
		</div>
	
	</div>
<script>
	 $(document).ready(function() {
	 	 $('.buttons').hide();
	 	 $('.confirmation').hide();

	 	$( ".submit" ).click(function() {

         	$('.confirmation').show();
         	$('.submit').hide();
            
        });

        $( ".cancel" ).click(function() {

         	$('.confirmation').hide();
         	$('.submit').show();
            
        });
	 	var sem = localStorage.getItem('semester');
	 	var y = localStorage.getItem('year')
	 	var url      = window.location.href;  
		if(sem != null){
			$( "#semester" ).val(sem)
			
		}
		else{
			$( "#semester" ).val('0')
		}

		if(y != null){
			$( "#year" ).val(y)
			
		}
		else{
			$( "#year" ).val('0')
		}

   		$('select').material_select();
   		
   		 var $checkboxes = $('#checkboxes input[type="checkbox"]');

		  $checkboxes.change(function(){
	        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
		      	if(countCheckedCheckboxes > 0) {
			       $('.buttons').show();
			    } else {
			       $('.buttons').hide();
			    }
	    });

        $( "#day" ).change(function() {

           window.location.href = "?day=" + $(this).val();
            
        });


         $('#search').keypress(function (e) {
		  if (e.which == 13) {

		  	 window.location.href = "?search=" + $(this).val();
		   	
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