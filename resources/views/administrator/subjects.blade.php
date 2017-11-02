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
				      <div class="col s4">
				      	 <a class='btn pink modal-trigger' href='#addSubject' ><i class="material-icons left">add</i> Add subject</a>
				      </div>
				      <div class="col s4">
				       	  <select id="course">
						      <option value="" disabled selected>Sort by course</option>
						      @foreach($courses as $course)
						      	<option value="{{$course->course}}">{{$course->course}}</option>
						      @endforeach
						   </select>
				      </div>
				      <div class="col s4">
				           <input placeholder="Search" id="first_name" type="text" class="validate">
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
                                        <button   data-activates="options" class="btn-flat pink-text dropdown-button"
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
                           No subjects found
                      @endif
			</div>
		</div>
	</div>

</div>

  <!-- View unverified student information -->
 <div id="addSubject" class="modal modal-fixed-footer">
 {!! Form::open(['action' => 'AdminController@store_subject', 'method' => 'POST']) !!}
    <div class="modal-content">
      <h5 class="center">Add subject</h5>
      <br>
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
	          <input id="lab" type="number" class="validate" name="lab" required>
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
			      <option value="0" disabled selected>Select subjects</option>
			      <option value="0">None</option>
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
    	 <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat green-text">Add subject</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>

    {!! Form::close() !!}
 </div>


  <!-- Subjects options -->
  <ul id='options' class='dropdown-content'>
    <li><a href="#!">Edit</a></li>
    <li class="divider"></li>
    <li><a href="#!">Remove</a></li>
    <li class="divider"></li>

  </ul>

 @if(session('dialog_success'))
 	<script type="text/javascript">
 		 Materialize.toast('Subject successfully added!', 5000,'green');
 	</script>
 @endif

<script>
	 $(document).ready(function() {

	 	var url  = window.location.href;  

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
          // localStorage.setItem('year',year);    	
           window.location.href =	updateQueryStringParameter( url, 'course', course )
            
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