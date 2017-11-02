@extends('layouts.app')


@section('content')
	
	<div class="container">

		<div class="card">
			<div class="card-content">

				<span class="card-title center"><i class="fa fa-book" aria-hidden="true"></i> {{session('course')}}-{{session('year')}} schedules  </span>
				<br>
				@include('includes.message')
				<div class="row">
				      <div class="col s4">
				       	   <select id="schedule_day" required>
						      <option value="" disabled selected>Select days</option>
						      <option value="MTH">Monday - Thursday</option>
						      <option value="TF">Tuesday - Friday</option>
						      <option value="WED">Wednesday</option>
						      <option value="SAT">Saturday</option>
							</select>
				      </div>
				      <div class="col s4">
				          <select id="semester">
						      <option value="" disabled selected>Sort by semester</option>
						      <option value="1">1st semester</option>
						      <option value="2">2nd semester</option>
						      <option value="3">summer</option>
						   </select>
				      </div>
				      <div class="col s4">
				           <input placeholder="Search" id="search" type="text" class="validate">
				      </div>
				</div> 

				
				 	<br>

					@if(count($schedules) > 0)
			            <table class="striped">
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
                                    
                                      @if($schedule->status == 0)
                                        <td class="text-light bg-danger">Close</td>
                                      @else
                                        <td class="text-light bg-success">Open</td>
                                      @endif
                                {!! Form::open(['action' => 'StudentController@submit_enrollment', 'method' => 'POST'],['id' => 'verify-form']) !!}
                                   	 	<td id="checkboxes"><p>
									      <input type="checkbox" class="verify-check" id="{{$schedule->schedule_id}}" name="schedule_id[]" value="{{$schedule->schedule_id}}" />
									      <label for="{{$schedule->schedule_id}}"></label>
									   </p></td>
								
                                  </tr>
                              @endforeach
			              </tbody>
			            </table>

			            	<div class="card-action right buttons"><button type="submit" class="waves-effect waves-light btn green"><i class="material-icons left">check</i>Enroll</button></div>
			            	 {!! Form::close() !!}
			       <div class="row center">
			       		{{ $schedules->links() }}
			       </div>
			      @else
			           <div class="row center">
			       					<p><span class="fa fa-search"></span> No schedules posted yet.</p>
			       			</div>
			      @endif
			</div>
		</div>
	
	</div>
<script>
	 $(document).ready(function() {
	 	 $('.buttons').hide();
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

        $( "#semester" ).change(function() {

           var semester = $(this).val();    
           localStorage.setItem('semester',semester);    	
           window.location.href =	updateQueryStringParameter( url, 'semester', semester )
            
        });

         $( "#year" ).change(function() {

           var year = $(this).val();        	
           localStorage.setItem('year',year);    	
           window.location.href =	updateQueryStringParameter( url, 'year', year )
            
        });

         $('#search').keypress(function (e) {
		  if (e.which == 13) {
		   	 window.location.href =	updateQueryStringParameter( url, 'search', $(this).val() )
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