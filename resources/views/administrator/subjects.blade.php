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
			  	@if(count($subjects) > 0)
					 <i class="fa fa-book" aria-hidden="true"></i> Subjects ({{count($subjects)}})
				@else
					<i class="fa fa-book" aria-hidden="true"></i> Subjects (0)
				@endif
			   
			  </div> 
			</div>
		
			<div class="card-content">
				<div class="row">
					<div class="col s6">
						
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

					<div class="ui warning message onremove">
				      <div class="header">
				        Are you sure you want to remove subject?
				      </div>
				    {!! Form::open(['action' => 'AdminController@remove_subject', 'method' => 'POST']) !!}
				     <div class="ui form">
				      <input type="hidden" name="subject_id" id="subject_id">
				        <button type="submit" name="rejected" class="waves-effect waves-light btn green">Yes</button> <a href="{{url('account/registrar/subjects')}}" class="waves-effect waves-light btn red cancel">No</a> 
				      </div>
				      {!! Form::close() !!}
				  </div>

							@include('includes.message')
                            <table class="ui celled padded table attached">
                              <thead>
                                  <th> Subject </th>
                                  <th> Descriptive title </th>
                                  <th> Lec </th>
                                  <th> Lab </th>
                                  <th> Credit Units </th>
                                  <th> Total hrs / week </th>
                                  <th> Pre-req </th>
                                  <th>Course</th>
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
                                     <td class="text-center">
                                        <button data-activates="options" class="btn-flat pink-text dropdown-button subject"
                                        data-subject_id="{{$subject->subject_id}}"  
                                        data-subject="{{$subject->subject}}" 
                                        data-descriptive="{{$subject->descriptive}}"
                                        data-lec="{{$subject->lec}}"
                                        data-lab="{{$subject->lab}}" 
                                        data-credit_units="{{$subject->credit_units}}" 
                                        data-total_hours="{{$subject->total_hours}}"
                                        data-pre_req="{{$subject->pre_req}}"  
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
      <div class="ui attached info message">
		  <p><span class="fa fa-info-circle"></span> Total hours / Week will automatically calculated based on number of lectures, laboratory.</p>
		</div>
     
	    <div class="row">
	        <div class="input-field col s6">
	          <input  type="text" class="validate" name="subject" required>
	          <label for="subject">Subject</label>
	        </div>

	         <div class="input-field col s6">
	          <input  type="text" class="validate" name="descriptive" required>
	          <label for="descriptive">Descriptive Title</label>
	        </div>
        </div>

        <div class="row">
	        <div class="input-field col s6">
	          <input  type="number" class="validate lec" name="lec" required>
	          <label for="lec">Lecture</label>
	        </div>

	         <div class="input-field col s6">
	          <input  type="number" class="validate lab" name="lab" required >
	          <label for="lab">Laboratory</label>
	        </div>
        </div>
   
         <div class="row">
	        <div class="col s6">
	        <label for="credit_units">Credit Units</label>
	          <input  type="number" class="validate credit_units" name="credit_units" required readonly>
	        </div>

	         <div class="col s6">
	          <label for="total_hours">Total Hours / Week</label>
	          <input type="number" class="validate total_hours" readonly name="total_hours" required readonly>
	        </div>
        </div>

        <div class="row">
	        <div class="input-field col s6">
	           <input  type="text" class="validate pre_req" name="pre_req" required>
	          <label for="pre_req">Pre requisites</label>
	        </div>

	          <div class="input-field col s6">
	           <select name="course_id" required>
			      <option value="" disabled selected>Select course</option>
			       @foreach($courses as $course)
						<option value="{{$course->course_id}}">{{$course->course}}</option>
				   @endforeach
				</select>
	          <label for="course_id">Subject course</label>
	        </div>
        </div>

         <div class="row">
	      

	         <div class="input-field col s6">
	           <select name="semester" required>
			      <option value="" disabled selected>Select semester</option>
			      <option value="1">1st semester</option>
			      <option value="2">2nd semester</option>
			      <option value="3">Summer</option>
				</select>
	          <label for="semester">Semester</label>
	        </div>

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

        </div>

         <div class="row">
	      

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


   <!-- View unverified student information -->
 <div id="editSubject" class="modal modal-fixed-footer">
 {!! Form::open(['action' => 'AdminController@edit_subject', 'method' => 'POST']) !!}
    <div class="modal-content">
      <h5 class="center"><span class="fa fa-book"></span> Edit subject</h5>
      <br>
      <div class="ui attached info message">
		  <p><span class="fa fa-info-circle"></span> Total hours / Week will automatically calculated based on number of lectures, laboratory.</p>
		</div>
     
	    <div class="row">

	    
	        <input id="subjectid" type="hidden" class="validate" name="subject_id" required>
	      
	        <div class="col s6">
	          <label for="subject">Subject</label>
	          <input id="subject" type="text" class="validate" name="subject" required>
	        </div>

	         <div class="col s6">
	         <label for="descriptive">Descriptive Title</label>
	          <input id="descriptive" type="text" class="validate" name="descriptive" required>
	        </div>
        </div>

        <div class="row">
	        <div class="col s6">
	          <label for="lec">Lecture</label>
	          <input id="lec" type="number" class="validate" name="lec" required>
	        </div>

	         <div class="col s6">
	         <label for="lab">Laboratory</label>
	          <input id="lab" type="number" class="validate" name="lab" required >
	        </div>
        </div>

         <div class="row">
	        <div class="col s6">
	        <label for="credit_units">Credit Units</label>
	          <input id="credit_units" type="number" class="validate" name="credit_units" required readonly>
	        </div>

	         <div class="col s6">
	          <label for="total_hours">Total Hours / Week</label>
	          <input id="total_hours" type="number" class="validate" readonly name="total_hours" required readonly>
	        </div>
        </div>

        <div class="row">
	       <div class="col s6">
	       	 <label for="pre_req">Pre requisites</label>
	       	  <input  type="text" class="validate" id="pre_req" name="pre_req" required>
	         
	        </div>

	          <div class="col s6">
	          	<label for="course_id">Subject course</label>
	           <select name="course_id" id="course_id" required>
			       @foreach($courses as $course)
						<option value="{{$course->course_id}}">{{$course->course}}</option>
				   @endforeach
				</select>
	         
	        </div>
        </div>

         <div class="row">
	      

	         <div class="col s6">
	         	<label for="semester">Semester</label>
	           <select name="semester" id="semester" required>
			      <option value="1">1st semester</option>
			      <option value="2">2nd semester</option>
			      <option value="3">Summer</option>
				</select>
	          
	        </div>

	          <div class="col s6">
	          	<label for="year_level">Year level</label>
	           <select name="year_level" id="year_level" required>
			      <option value="1">First year</option>
			      <option value="2">Second year</option>
			      <option value="3">Third year</option>
			      <option value="4">Fourth year</option>
				</select>
	          
	        </div>

        </div>

         <div class="row">
	      

	         <div class="input-field col s6">
	          
	        </div>

        </div>



    </div>
    <div class="modal-footer">
    	 <button type="submit" class="modal-action modal-close waves-effect waves-green btn green">Save changes</button>
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
      <input  id="subjectid2" name="subject_id" type="hidden" class="validate">
      <div class="ui attached info message">
		  <p><span class="fa fa-info-circle"></span> Schedule will be added in current school year and semester.</p>
		</div>
   	<br>
   
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
	          <select name="faculty_id" required>
			      <option value="" disabled selected>Select faculty</option>
			       @foreach($faculties as $faculty)
						<option value="{{$faculty->faculty_id}}">{{$faculty->faculty_name}}</option>
				   @endforeach
				</select>
	          <label for="course_id">Assign faculty</label>
	        </div>
	         <div class="input-field col s6">
		          <input id="slots" type="number" class="validate" name="slots" required>
		          <label for="slots">Available slots:</label>
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
    <li><a href="#editSubject" class="blue-text center modal-trigger"><span class="fa fa-pencil"></span></a></li>
    <li class="divider"></li>
    <li><a href="#" class="red-text center delete"><span class="fa fa-trash"></span></a></li>
    <li class="divider"></li>
  </ul>

 


<script>
	 $(document).ready(function() {

	 	var url  = window.location.href;  

	 	var c = localStorage.getItem('course');
	 	var sem = localStorage.getItem('semester');
	 	var y = localStorage.getItem('year')
	 	var url = window.location.href;  

	 	$('.onremove').hide();


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

		$('.delete').click(function(){
			$('.onremove').show();
		});

	 	$(".subject").click(function() {

        	var id = $(this).data("subject_id");
        	var subject = $(this).data("subject");
        	$("#subject_id").val(id);
        	$("#subjectid").val(id);
        	$("#subjectid2").val(id);
        	$("#sched-title").text(subject + " - schedule");
        	
      		
          	var subject = $(this).data("subject");
          	var descriptive = $(this).data("descriptive");
          	var lec = $(this).data("lec");
          	var lab = $(this).data("lab");
          	var credit_units = $(this).data("credit_units");
          	var total_hours = $(this).data("total_hours");
          	var pre_req = $(this).data("pre_req");
          	var course_id = $(this).data("course_id");
          	var semester = $(this).data("semester");
          	var year = $(this).data("year");

          	$("#subject").val(subject);
			$("#descriptive").val(descriptive);
			$("#lec").val(lec);
			$("#lab").val(lab);
			$("#credit_units").val(credit_units);
			$("#total_hours").val(total_hours);
			$("#pre_req").val(pre_req);
			$("#course_id").val(course_id);
			$("#semester").val(semester);
			$("#year_level").val(year);

			console.log(id);



          	

    	});


	 	 $('.modal').modal();
   		 $('select').material_select();


   		$(".lab").on("change paste keyup", function() {
          	
          	let total_hours = 0;
          	let lec = $(".lec").val();
          	let credit_units = 0;

            let lab = $(this).val();
            
            if(lab >= 1){
            	credit_units = parseInt(lec) + parseInt(lab);
            	total_hours = parseInt(lec) + parseInt(credit_units);
            	$(".credit_units").val(credit_units);
            	$(".total_hours").val(total_hours);
            	
            }else{
            	$(".total_hours").val(parseInt(lec));
            	$(".credit_units").val(parseInt(lec));
            	
            }
           console.log(lab);
         
        });

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
           console.log(lab);
         
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