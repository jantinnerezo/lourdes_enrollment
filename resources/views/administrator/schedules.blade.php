@extends('layouts.app')
@section('content')
<div class="row profile">

	<div class="col s3">
		@include('administrator.sidenav')
	</div>

	<div class="col s9">
		<div class="card">	
			<div class="card-content">
		
				<span class="card-title"><i class="fa fa-book" aria-hidden="true"></i> Subjects</span>
				<br>
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
						      <option value="" disabled selected>Sort by school year</option>
						      @foreach($sy as $year)
						      	<option value="{{$year->school_year}}">{{$year->school_year}}</option>
						      @endforeach
						   </select>
				      </div>
				      <div class="col s3">
				          <select id="semester">
						      <option value="" disabled selected>Sort by semester</option>
						      <option value="1">1st semester</option>
						      <option value="2">2nd semester</option>
						      <option value="3">summer</option>
						   </select>
				      </div>
				      <div class="col s3">
				           <input placeholder="Search" id="first_name" type="text" class="validate">
				      </div>
				</div> 

				@if(count($schedules) > 0)
                            <table class="striped">
                              <thead>
                                  <th>Schedule Day</th>
                                  <th>Time</th>
                                  <th>Subject</th>
                                  <th>Room</th>
                                  <th>Faculty</th>
                                  <th>Status</th>
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
                                    
                                   
                                  </tr>
                                  
                                  @endforeach
                              </tbody>
                            </table>
                       		<div class="row center">
			       					{{ $schedules->links() }}
			       			</div>
                      @else
                           <div class="row center">
			       					<h5><span class="fa fa-search"></span> No schedules found.</h5>
			       			</div>
                      @endif
			</div>
		</div>
	</div>

</div>





<script>
	 $(document).ready(function() {

	 	 $('.modal').modal();
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