@extends('layouts.app')


@section('content')
<br>
<div class="row profile">

	<div class="col s3">
		@include('student.sidenav')
	</div>

	<div class="col s9">

		<div class="card attached">
			<div class="ui message attached">
				  <div class="content">
				    <div class="header">
				      <i class="fa fa-exchange" aria-hidden="true"></i> Enrollment Request 
				    </div>
				  </div>
				</div>
			<div class="card-content">

					@include('includes.message')
					@if(count($schedules) > 0)
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
                                   {!! Form::open(['action' => 'StudentController@cancel_request', 'method' => 'POST'],['id' => 'verify-form']) !!}
                                    
                                   	 	<td id="checkboxes"><p class="center">
									      <input type="checkbox" class="verify-check" id="{{$schedule->request_id}}" name="request_id[]" value="{{$schedule->request_id}}" />
									      <label for="{{$schedule->request_id}}"></label>
									   </p></td>
                                  </tr>
                              @endforeach
			              </tbody>
			            </table>

			            	<div class="card-action right buttons"><button type="submit" class="waves-effect waves-light btn red"><i class="material-icons left">check</i>Cancel selected</button></div>
			            {!! Form::close() !!}
			       <div class="row center">
			       		{{ $schedules->links() }}
			       </div>
			      @else
			          <div class="ui message warning">
					  <div class="content">
					    <div class="header">
					      No Enrollment Request yet
					    </div>
					  </div>
					</div>
			      @endif
			</div>
		</div>
	

	</div>

</div>
	


<script>
	 $(document).ready(function() {

	 	 $('.buttons').hide();
	 	
	 	var url      = window.location.href;  

	 	 var $checkboxes = $('#checkboxes input[type="checkbox"]');

		  $checkboxes.change(function(){
	        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
		      	if(countCheckedCheckboxes > 0) {
			       $('.buttons').show();
			    } else {
			       $('.buttons').hide();
			    }
	    });

		

   		$('select').material_select();
   		

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