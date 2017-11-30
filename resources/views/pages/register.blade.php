@extends('layouts.app')

@section('content')

	<div class="container register">
		<div class="card">
			  <div class="card-action">
               	 <h5><i class="fa fa-file-text-o" aria-hidden="true"></i> Registration Form</h5>
              </div>

          

         
         {!! Form::open(['action' => 'PagesController@submit_form', 'method' => 'POST','enctype' => 'multipart/form-data'],['files' => true]) !!}

			<div class="card-content">
				  @include('includes.message')
				<h1 class="card-title center blue-text">Please Fill-up the form</h1>

				 <div class="row fields">
					 <div class="row">
				        <div class="input-field col m4">
						    <select name="course_id" required>
						      <option value="" disabled selected>Choose your desired course</option>
						      @foreach($courses as $course)
						      	<option value="{{$course->course_id}}">{{$course->course}}</option>
						      @endforeach
						    </select>
						    <label>Course:</label>
						  </div>
				        <div class="input-field col m4">
				        	
					
				  		</div>
				         <div class="input-field col m4">
				        </div>
				      </div>
					</div>

				 <div class="row fields">
					 <div class="row">
				        <div class="input-field col m4">
				          <input type="text" class="validate" name="lastname" required>
				          <label>Last Name</label>
				        </div>
				        <div class="input-field col m4">
				          <input type="text" class="validate" name="firstname" required>
				          <label>First Name</label>
				        </div>
				         <div class="input-field col m4">
				          <input  type="text" class="validate" name="middlename" required>
				          <label >Middle Name</label>
				        </div>
				      </div>
				 </div>


				  <div class="row fields">
					 <div class="row">
				       <div class="input-field col m4">
						    <select name="gender" required>
						      <option value="" disabled selected>Select gender</option>
						      <option value="Male">Male</option>
						      <option value="Female">Female</option>
						    </select>
						    <label>Gender</label>
						 </div>
				        <div class="input-field col m4">
				          <input type="text" class="validate" name="religion" required>
				          <label>Religion</label>
				        </div>
				         <div class="input-field col m4">
				          <input  type="text" class="validate" name="nationality" required>
				          <label>Nationality</label>
				        </div>
				      </div>
				  </div>

				  <div class="row fields">
					 <div class="row">
				        <div class="input-field col m4">
				          <input type="text" class="datepicker" name="date_of_birth" required>
				          <label>Birth Date</label>
				        </div>
				        <div class="input-field col m4">
				          <input type="text" class="validate" name="place_of_birth" required>
				          <label>Place of Birth</label>
				        </div>
				         <div class="input-field col m4">
						    <select name="civil_status" required>
						      <option value="" disabled selected>Select status</option>
						      <option value="Single">Single</option>
						      <option value="Married">Married</option>
						    </select>
						    <label>Civil Status</label>
						 </div>
				      </div>
				  </div>

				   <div class="row fields">
					 <div class="row">
				        <div class="input-field col m4">
				          <input type="text" class="validate" name="home_address" required>
				          <label>Home Address</label>
				        </div>
				        <div class="input-field col m4">
				          <input type="text" class="validate" name="city" required>
				          <label>City</label>
				        </div>
				         <div class="input-field col m4">
				          <input type="text" class="validate" name="province" required>
				          <label>Province</label>
				        </div>
				      </div>
				  </div>



				   <div class="row fields">
					 <div class="row">
				         <div class="input-field col m4">
						    <select name="country_code" required>
						      <option value="" disabled selected>Select Country</option>
						       @foreach($countries as $country)
						      	<option value="{{$country->country_code}}">{{$country->country_name}}</option>
						      @endforeach
						    </select>
						    <label>Country</label>
						 </div>
				        <div class="input-field col m4">
				          <input type="number" class="validate" name="zipcode" required>
				          <label>Zipcode</label>
				        </div>
				         <div class="input-field col m4">
				          <input type="number" placeholder="Optional" class="validate" name="phone">
				          <label>Phone</label>
				        </div>
				      </div>
				  </div>


				  <div class="row fields">
					 <div class="row">
				         <div class="input-field col m4">
				          <input type="text" class="validate" name="guardian" required>
				          <label>Guardian</label>
				        </div>
				        <div class="input-field col m4">
				          <input type="text" class="validate" name="guardian_relationship" required>
				          <label>Guardian Relationship</label>
				        </div>
				         <div class="input-field col m4">
				          <input type="text"  class="validate" name="basic_education" required>
				          <label>Basic Education</label>
				        </div>
				      </div>
				  </div>


				   <div class="row fields">
					 <div class="row">
				         <div class="input-field col m4">
				          <input type="text" class="validate" name="secondary_education" required>
				          <label>Secondary Education</label>
				        </div>
				        <div class="input-field col m4">
				          <input type="text" class="validate" name="college_education" required>
				          <label>College Education</label>
				        </div>
				         <div class="input-field col m4">
					          <input type="email" class="validate" placeholder="Email address is required for login" name="email" required>
					          <label>Valid Email Address</label>
				        </div>
				      </div>
				  </div>



			</div>
			 <div class="card-action center">
               	<button class="large positive ui button" type="submit" name="action"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit Form
  						  </button>
            </div>

            {!! Form::close() !!}
			
		</div>
	</div>


<script>
	 $(document).ready(function() {
   		 $('select').material_select();

   		  $('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 80, // Creates a dropdown of 15 years to control year,
		    today: 'Today',
		    clear: 'Clear',
		    close: 'Ok',
		    closeOnSelect: false // Close upon selecting a date,
		  });
  	});
</script>

@endsection