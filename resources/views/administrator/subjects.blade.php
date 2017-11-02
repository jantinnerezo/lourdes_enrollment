@extends('layouts.app')
@section('content')
<div class="row profile">

	<div class="col s3">
		@include('administrator.sidenav')
	</div>

	<div class="col s9">
		<div class="card">	
			<div class="card-content">
				<div class="row">
					<div class="col s6">
						<span class="card-title"><i class="fa fa-book" aria-hidden="true"></i> Subjects</span> 
					</div>

					<div class="col s6 right">
						 <a href='#addSubject' class="btn-floating btn-large waves-effect waves-light pink right modal-trigger"><i class="material-icons">add</i></a>
					</div>
				</div>
				
				<div class="row">
				      <div class="col s3">
				      	  <select id="course">
						      <option value="" disabled selected>Sort by course</option>
						      @foreach($courses as $course)
						      	<option value="{{$course->course}}">{{$course->course}}</option>
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
				       	 	  <select id="year">
						       <option value="0" disabled selected>Sort by year</option>
						       <option value="1">1st year</option>
						       <option value="2">2nd year</option>
						       <option value="3">3rd year</option>
						       <option value="4">4th year</option>
						   </select>
				      </div>
				      <div class="col s3">
				           <input placeholder="Search" id="search" type="text" class="validate">
				      </div>
				</div> 

				@if(count($subjects) > 0)
                            <table class="striped">
                              <thead>
                                  <th> Subject </th>
                                  <th> Descriptive title </th>
                                  <th> Lec </th>
                                  <th> Lab </th>
                                  <th> Credit Units </th>
                                  <th> Total hrs / week </th>
                                  <th> Pre-req </th>
                                  <th>Course</th>
                                  <th> Slots </th>
                                  <th>Status</th>
                                  <th class="text-center"> Options </th>
                              </thead>
                          
                              <tbody>
                                  @foreach($subjects as $subject)
                                   <tr>
                                     <td>{{$subject->subject}}</td>
                                     <td>{{$subject->descriptive}}</td>
                                     <td>{{$subject->lec}}</td>
                                     <td>{{$subject->lab}}</td>
                                     <td>{{$subject->credit_units}}</td>
                                     <td>{{$subject->total_hours}}</td>
                                     <td>{{$subject->pre_req}}</td>
                                     <td>{{$subject->course}}</td>
                                     <td>{{$subject->availability}}</td>
                                     
                                          @if($subject->status == 0)
                                            <td class="text-light bg-danger">Closed</td>
                                          @else
                                            <td class="text-light bg-success">Open</td>
                                          @endif
                                    
                                     <td class="text-center">
                                        <button   data-activates="options" class="btn-flat pink-text dropdown-button subject"
                                        data-subject_id="{{$subject->subject_id}}"  
                                        data-subject="{{$subject->subject}}" 
                                        data-descriptive="{{$subject->descriptive}}"
                                        data-lec="{{$subject->lec}}"
                                        data-lab="{{$subject->lab}}" 
                                        data-credit_units="{{$subject->credit_units}}" 
                                        data-total_hours="{{$subject->total_hours}}"
                                        data-pre_req="{{$subject->pre_req}}"  
                                        data-availability="{{$subject->availability}}"  
                                        data-course_id="{{$subject->course_id}}"
                                        data-semester="{{$subject->semester}}"  
                                        data-year="{{$subject->year_level}}"    

                                        ><i class="material-icons">more_vert</i></button>
                                 
                                     </td>
                                    
                                  </tr>
                                  
                                  @endforeach
                              </tbody>
                            </table>
                       		<div class="row center">
			       					{{ $subjects->links() }}
			       			</div>
                      @else
                           <div class="row center">
			       					<h5><span class="fa fa-search"></span> No subjects found.</h5>
			       			</div>
                      @endif
			</div>
		</div>
	</div>

</div>

  <!-- View unverified student information -->
 <div id="addSubject" class="modal modal-fixed-footer">
 {!! Form::open(['action' => 'AdminController@store_subject', 'method' => 'POST']) !!}
    <div class="modal-content">
      <h5 class="center"><span class="fa fa-book"></span> Add subject</h5>
      <br>
      <div class="card blue darken-1 white-text">
      	<div class="card-content center">
      		<span class="fa fa-info-circle"></span> Total hours / Week will automatically calculated based on number of lectures, laboratory.
      	</div>
      </div>
	    <div class="row">
	        <div class="input-field col s6">
	          <input id="subject" type="text" class="validate" name="subject" required>
	          <label for="subject">Subject</label>
	        </div>

	         <div class="input-field col s6">
	          <input id="descriptive" type="text" class="validate" name="descriptive" required>
	          <label for="descriptive">Descriptive Title</label>
	        </div>
        </div>

        <div class="row">
	        <div class="input-field col s6">
	          <input id="lec" type="number" class="validate" name="lec" required>
	          <label for="lec">Lecture</label>
	        </div>

	         <div class="input-field col s6">
	          <input id="lab" type="number" class="validate" name="lab" value="0" required>
	          <label for="lab">Laboratory</label>
	        </div>
        </div>

         <div class="row">
	        <div class="input-field col s6">
	          <input id="credit_units" type="number" class="validate" name="credit_units" required>
	          <label for="credit_units">Credit Units</label>
	        </div>

	         <div class="col s6">
	          <label for="total_hours">Total Hours / Week</label>
	          <input id="total_hours" type="number" class="validate" readonly name="total_hours" required>
	        </div>
        </div>

        <div class="row">
	        <div class="input-field col s6">
	           <select name="pre_req" required>
			      <option value="None" disabled selected>Select subjects</option>
			      <option value="None">None</option>
				</select>
	          <label for="pre_req">Pre requisites</label>
	        </div>

	         <div class="input-field col s6">
	          <input id="availability" type="number" class="validate" name="availability" required>
	          <label for="availability">Availability</label>
	        </div>
        </div>

         <div class="row">
	        <div class="input-field col s6">
	           <select name="course_id" required>
			      <option value="" disabled selected>Select course</option>
			       @foreach($courses as $course)
						<option value="{{$course->course_id}}">{{$course->course}}</option>
				   @endforeach
				</select>
	          <label for="course_id">Subject course</label>
	        </div>

	         <div class="input-field col s6">
	           <select name="semester" required>
			      <option value="" disabled selected>Select semester</option>
			      <option value="1">1st semester</option>
			      <option value="2">2nd semester</option>
			      <option value="3">Summer</option>
				</select>
	          <label for="semester">Semester</label>
	        </div>

        </div>

         <div class="row">
	        <div class="input-field col s6">
	           <select name="year_level" required>
			      <option value="" disabled selected>Select year</option>
			      <option value="1">First year</option>
			      <option value="2">Second year</option>
			      <option value="3">Third year</option>
			      <option value="4">Fourth year</option>
				</select>
	          <label for="year_level">Year level</label>
	        </div>

	         <div class="input-field col s6">
	          
	        </div>

        </div>



    </div>
    <div class="modal-footer">
    	 <button type="submit" class="modal-action modal-close waves-effect waves-green btn green">Add subject</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn red ">Close</a>
    </div>

    {!! Form::close() !!}
 </div>





  <!-- View add schedule -->
 <div id="addSchedule" class="modal modal-fixed-footer">
 {!! Form::open(['action' => 'AdminController@store_schedule', 'method' => 'POST']) !!}
    <div class="modal-content">
      <h5 class="center" id="sched-title"></h5>
      <br>
      <input  id="subject_id" name="subject_id" type="hidden" class="validate">
       <div class="card blue darken-1 white-text">
      	<div class="card-content center">
      		<span class="fa fa-info-circle"></span> Schedule will be added in current school year
      	</div>
      </div>
   
	    <div class="row">
	        <div class="input-field col s6">
	         <select name="schedule_day" required>
			      <option value="" disabled selected>Select days</option>
			      <option value="MTH">Monday - Thursday</option>
			      <option value="TF">Tuesday - Friday</option>
			      <option value="WED">Wednesday</option>
			      <option value="SAT">Saturday</option>
				</select>
	          <label for="schedule_day">Schedule day:</label>
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

	         <div class="input-field col s6">
	          <input id="room" type="text" class="validate" name="room" required>
	          <label for="room">Room:</label>
	        </div>
        </div>

         <div class="row">

         	<div class="input-field col s6">
	         <select name="semester" required>
			      <option value="" disabled selected>Select semester</option>
			      <option value="1">1st semester</option>
			      <option value="2">2nd semester</option>
			      <option value="3">summer</option>
				</select>
	          <label for="semester">Semester</label>
	        </div>
	         <div class="input-field col s6">
	           <select name="faculty_id" required>
			      <option value="" disabled selected>Select faculty</option>
			       @foreach($faculties as $faculty)
						<option value="{{$faculty->faculty_id}}">{{$faculty->faculty_name}}</option>
				   @endforeach
				</select>
	          <label for="course_id">Assign faculty</label>
	        </div>
        </div>

   
    </div>
    <div class="modal-footer">
    	 <button type="submit" class="modal-action modal-close waves-effect waves-green btn green">Add schedule</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn red ">Close</a>
    </div>

    {!! Form::close() !!}
 </div>


  <!-- Subjects options -->
  <ul id='options' class='dropdown-content'>
  	<li><a href='#addSchedule'  class="green-text center modal-trigger"><span class="fa fa-calendar-plus-o"></span></a></li>
    <li class="divider"></li>
    <li><a href="#!" class="blue-text center"><span class="fa fa-pencil"></span></a></li>
    <li class="divider"></li>
    <li><a href="#!" class="red-text center"><span class="fa fa-trash"></span></a></li>
    <li class="divider"></li>
  </ul>

 @if(session('success_subject'))
 	<script type="text/javascript">
 		 Materialize.toast('Subject successfully added!', 5000,'green');
 	</script>
 @endif

  @if(session('error_subject'))
 	<script type="text/javascript">
 		 Materialize.toast('Subject not added successfully', 5000,'red');
 	</script>
 @endif


 @if(session('success_schedule'))
 	<script type="text/javascript">
 		 Materialize.toast('Schedule successfully added!', 5000,'green');
 	</script>
 @endif

  @if(session('error_schedule'))
 	<script type="text/javascript">
 		 Materialize.toast('Schedule not added successfully', 5000,'red');
 	</script>
 @endif

  @if(session('conflict_schedule'))
 	<script type="text/javascript">
 		 Materialize.toast('Schedule not added, conflict with another schedule.', 5000,'red');
 	</script>
 @endif



<script>
	 $(document).ready(function() {

	 	var url  = window.location.href;  

	 	var c = localStorage.getItem('course');
	 	var sem = localStorage.getItem('semester');
	 	var y = localStorage.getItem('year')
	 	var url      = window.location.href;  

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

   		$("#credit_units").on("change paste keyup", function() {
          	
          	let total_hours = 0;
          	let lec = $("#lec").val();
          	let credit_units = $(this).val();

            let lab = $("#lab").val();
            
            if(lab > 0){
            	total_hours = parseInt(lec) + parseInt(credit_units);
            	$("#total_hours").val(total_hours);
            }else{
            	$("#total_hours").val(parseInt(lec));
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