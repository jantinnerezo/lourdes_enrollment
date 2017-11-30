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
				<div class="header">
					Name: {{$information->firstname}} {{$information->lastname}}
				</div>
				<div class="header">
					Course: {{$information->course}}-{{$information->year_level}} 
				</div>
			</div>
		
			<div class="card-content">

				<div class="ui attached negative message onenroll">
					  {!! Form::open(['action' => 'AdminController@enroll', 'method' => 'POST'],['id' => 'verify-form']) !!}
						  <div class="header">
						   	Are you sure you want to enroll student?
						  </div>
							<div class="ui form">
							 	<input type="hidden" name="student_email" value="{{$information->email}}">
					        </div>
					        <br>
					        <button type="submit" class="waves-effect waves-light btn green"><i class="material-icons left">check</i>Yes</button> <a class="waves-effect waves-light btn red cancel-enroll"><i class="material-icons left">close</i>No</a> 

					{!! Form::close() !!}
				</div>

				<div class="ui attached negative message onreject">
					  {!! Form::open(['action' => 'AdminController@reject', 'method' => 'POST'],['id' => 'verify-form']) !!}
						  <div class="header">
						   	Are you sure you want to reject enrollment?
						  </div>
						  <p>Please specify the reason: </p>
							<div class="ui form">
							 	<input type="hidden" name="student_email" value="{{$information->email}}">
							 	 <div class="field">
									    <textarea rows="3" name="notification"></textarea>
									  </div>
					        </div>
					        <br>
					        <button type="submit" class="waves-effect waves-light btn green"><i class="material-icons left">check</i>Yes</button> <a class="waves-effect waves-light btn red cancel-reject"><i class="material-icons left">close</i>No</a> 

					{!! Form::close() !!}
				</div>
				<br>
				<div class="row">
					<div class="col s6">
					</div>
					<div class="col s6 right">
						 <a type="submit" class="waves-effect waves-light btn red right reject"><i class="material-icons left">close</i>Reject</a><a type="submit" class="waves-effect waves-light btn green right enroll"><i class="material-icons left">check</i>Enroll</a>
					</div>
				</div>
				
				
				@if(count($schedules) > 0)
						
						<div class="ui attached message">
							<div class="header">
								Total number of subjects: {{count($schedules)}}
							</div>
						</div>
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

	 	var url  = window.location.href;  

	 	var c = localStorage.getItem('course');
	 	var sem = localStorage.getItem('semester');
	 	var y = localStorage.getItem('year')
	 	var url      = window.location.href;  

	 	$('.onenroll').hide();
	 	$('.onreject').hide();

	 	$('.enroll').click(function(){
	 	 	$('.onenroll').show();
	 	 	$('.onreject').hide();
	 	});

	 	$('.reject').click(function(){
	 	 	$('.onenroll').hide();
	 	 	$('.onreject').show();
	 	});

	 	$('.cancel-enroll').click(function(){
	 	 	$('.onenroll').hide();
	 	});

	 	$('.cancel-reject').click(function(){
	 	 	$('.onreject').hide();
	 	});
	 	



	 	if(c != null){
			$( "#course" ).val(c)
		
		}
		else{
			$( "#course" ).val('0')
		}

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

	 	$(".subject").click(function() {
        	var id = $(this).data("subject_id");
        	var subject = $(this).data("subject");
        	$("#subject_id").val(id);
        	$("#sched-title").text(subject + " - schedule");
    	});

	 	 $('.modal').modal();
   		 $('select').material_select();


   		$("#lab").on("change paste keyup", function() {
          	
          	let total_hours = 0;
          	let lec = $("#lec").val();
          	let credit_units = 0;

            let lab = $(this).val();
            
            if(lab >= 1){
            	credit_units = parseInt(lec) + parseInt(lab);
            	total_hours = parseInt(lec) + parseInt(credit_units);
            	$("#credit_units").val(credit_units);
            	$("#total_hours").val(total_hours);
            }else{
            	$("#total_hours").val(parseInt(lec));
            	$("#credit_units").val(parseInt(lec));
            }
         
        });

   	

        $( "#course" ).change(function() {

           var course = $(this).val();        	
           localStorage.setItem('course',course);    	
           window.location.href =	updateQueryStringParameter( url, 'course', course )
            
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