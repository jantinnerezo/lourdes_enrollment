@extends('layouts.app')
@section('content')
<div class="row profile">

	<div class="col s3">
		@include('administrator.sidenav')
	</div>

	<div class="col s9">
		<div class="card">
			
			<div class="card-content">
				<span class="card-title"><i class="fa fa-users" aria-hidden="true"></i> Students</span>
				  <div class="row">
					    <div class="col s12">
					      <ul class="tabs">
					        <li class="tab col s3"><a href="#students">Verified </a></li>
					        <li class="tab col s3"><a href="#students2">Unverify 
					        	@if(count($unverify) > 0)
					        		<span class="new badge">{{count($unverify)}}</span>
					        	@endif
					        </a></li>
					      </ul>
					    </div>
					     <br>
					    <div id="students" class="col s12">

					    	@if(count($verified) > 0)
					    	  	<div class="row">

							      <div class="col s4">
							       	
							      </div>
							      <div class="col s4">
							        <!-- Promo Content 2 goes here -->
							      </div>
							      <div class="col s4">
							        <!-- Promo Content 3 goes here -->
							      </div>

							    </div>
					    		<table class="highlight">
							        <thead>
							          <tr>
							              <th>Full Name</th>
							              <th>Course & Year</th>
							              <th>Email Address</th>
							              <th>Enrolled</th>
							          </tr>
							        </thead>

							        <tbody>
							        	@foreach($verified as $student)
							        	  <tr class="clickable-row" data-href="{{url('account/registrar')}}/students/{{$student->email}}">
								            <td>{{$student->firstname}} {{$student->middlename}}. {{$student->lastname}}</td>
								            <td>{{$student->course}}-{{$student->year_level}}</td>
								            <td>{{$student->email}}</td>

								            @if($student->enrolled)
								            	<td class="green-text">Yes</td>
								            @else
								            	<td class="red-text">No</td>
								            @endif
								          </tr>
							            @endforeach
							        </tbody>
						      	</table>
					    	@else
					    		<br>
					    		<div class="card-subtitle gray-text center">No verified students found.</div>
					    	@endif
					    	 
					    </div>
					    <div id="students2" class="col s12">
					    	@if(count($unverify) > 0)
					    		<div class="row">

							      <div class="col s4">
							       		
							      </div>
							      <div class="col s4">
							        <!-- Promo Content 2 goes here -->
							      </div>
							      <div class="col s4">
							        <!-- Promo Content 3 goes here -->
							      </div>

							    </div>



							  {!! Form::open(['action' => 'AdminController@verify_students', 'method' => 'POST'],['id' => 'verify-form']) !!}

							  	<div class="card-action right buttons"><button class="waves-effect waves-light btn-flat green-text"><i class="material-icons left">check</i> Verify Selected</button> <a class="waves-effect waves-light btn-flat red-text"><i class="material-icons left">clear</i> Remove selected</a></div>

					    		<table class="highlight">
							        <thead>
							          <tr>
							              <th>Full Name</th>
							              <th>Desired course</th>
							              <th>Email Address</th>
							              <th>Date Registered</th>
							              <th class="center">Action</th>
							          </tr>
							        </thead>

							        <tbody>
							        	@foreach($unverify as $student)
								          <tr id="viewInformation" data-email="{{$student->email}}" data-name="{{$student->firstname}} {{$student->lastname}}"
                                                data-lastname="{{$student->lastname}}"  
                                                data-firstname="{{$student->firstname}}" 
                                                data-middlename="{{$student->middlename}}"
                                                data-course="{{$student->course}}"
                                                data-year="{{$student->year_level}}" 
                                                data-gender="{{$student->gender}}" 
                                                data-religion="{{$student->religion}}"
                                                data-nationality="{{$student->nationality}}"  
                                                data-date_of_birth="{{Date('F d, Y', strtotime($student->date_of_birth))}}"  
                                                data-place_of_birth="{{$student->place_of_birth}}"  
                                                data-civil_status="{{$student->civil_status}}"  
                                                data-email="{{$student->email}}"  
                                                data-address="{{$student->home_address}}"  
                                                data-city="{{$student->city}}"  
                                                data-province="{{$student->province}}"  
                                                data-country="{{$student->country_name}}"  
                                                data-zipcode="{{$student->zipcode}}"  
                                                data-phone="{{$student->phone}}"  
                                                data-guardian="{{$student->guardian}}"  
                                                data-guardian_relationship="{{$student->guardian_relationship}}"  
                                                data-basic_education="{{$student->basic_education}}"  
                                                data-secondary_education="{{$student->secondary_education}}"  
                                                data-college_education="{{$student->college_education}}"  
                                                data-enrolled="{{Date(('F d, Y'), strtotime($student->date_enrolled))}}" >

								            <td>{{$student->firstname}} {{$student->middlename}}. {{$student->lastname}}</td>
								            <td>{{$student->course}}</td>
								            <td>{{$student->email}}</td>
								            <td>{{Date(('F d, Y'), strtotime($student->date_enrolled))}}</td>
								            <td id="checkboxes"><p>
										      <input type="checkbox" class="verify-check" id="{{$student->email}}" name="emails[]" value="{{$student->email}}" />
										      <label for="{{$student->email}}">Verify</label>
										    </p></td>
								          </tr>
							            @endforeach
							        </tbody>
						      	</table>
						      	<br>

						      	
						     {!! Form::close() !!}
					    	@else
					    		<br>
					    		<div class="card-subtitle gray-text center">No unverified students found.</div>
					    	@endif
					    </div>
					    
				  </div>
				 
			</div>
		</div>
	</div>

</div>

@if(session('success'))
 	<script type="text/javascript">
 			Materialize.toast('Verification successful, Password is successfully emailed', 5000,'green');
 	</script>
@endif

@if(session('success'))
 	<script type="text/javascript">
 		 Materialize.toast('Verification unsuccessful, there is no internet connection to send password to email', 5000,'red');
 	</script>
@endif

 <!-- View unverified student information -->
 <div id="information" class="modal modal-fixed-footer">
    <div class="modal-content">
      <h5>Unverified Registration</h5>
	    <ul class="collection">
	      <li class="collection-item" id="firstname"></li>
 		  <li class="collection-item" id="middlename"></li>
 		  <li class="collection-item" id="lastname"></li>
 		  <li class="collection-item" id="gender"></li>
 		  <li class="collection-item" id="date_of_birth"></li>
 		  <li class="collection-item" id="civil_status"></li>
 		  <li class="collection-item" id="address"></li>
 		  <li class="collection-item" id="phone"></li>
 		  <li class="collection-item" id="place_of_birth"></li>
 		  <li class="collection-item" id="city"></li>
 		  <li class="collection-item" id="province"></li>
 		  <li class="collection-item" id="country"></li>
 		  <li class="collection-item" id="zipcode"></li>
 		  <li class="collection-item" id="guardian"></li>
 		  <li class="collection-item" id="guardian_relationship"></li>
 		  <li class="collection-item" id="basic_education"></li>
 		  <li class="collection-item" id="secondary_education"></li>
 		  <li class="collection-item" id="college_education"></li>
 		  <li class="collection-item" id="date_enrolled"></li>

	     
	    </ul>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
    </div>
 </div>


<script type="text/javascript">
	$(document).ready(function(){


		$('.modal').modal();
		$('.buttons').hide();

		 var $checkboxes = $('#checkboxes input[type="checkbox"]');

		  $checkboxes.change(function(){
	        var countCheckedCheckboxes = $checkboxes.filter(':checked').length;
		      	if(countCheckedCheckboxes > 0) {
			       $('.buttons').show();
			    } else {
			       $('.buttons').hide();
			    }
	    });

	
		
		$('#verify-form').submit(function() {
   			 var c = confirm("Click OK to continue?");
    		 return c; //you can just return c because it will be true or false
		});


		$(".clickable-row").click(function() {
        	window.location = $(this).data("href");
    	});

    	$("#viewInformation").click(function() {


    		// Get
    		let firstname = "First Name: " + $(this).data("firstname");
    		let middlename = "Middle Name: " + $(this).data("middlename");
    		let lastname = "Last Name: " + $(this).data("lastname");
    		let gender = "Gender: " + $(this).data("gender");
    		let date_of_birth = "Birthday: " + $(this).data("date_of_birth");
    		let civil_status = "Civil Status: " + $(this).data("civil_status");
    		let address = "Home Address: " + $(this).data("address");
    		let phone = "Phone: " + $(this).data("phone");
    		let place_of_birth = "Place of Birth: " + $(this).data("place_of_birth");
    		let city = "City: " + $(this).data("city");
    		let province = "Province: " + $(this).data("province");
    		let country = "Country: " + $(this).data("country");
    		let zipcode = "Zipcode: " + $(this).data("zipcode");
    		let guardian = "Guardian: " + $(this).data("guardian");
    		let guardian_relationship = "Guardian Relationship" + $(this).data("guardian_relationship");
    		let basic_education = "Basic Education" + $(this).data("basic_education");
    		let secondary_education = "Secondary Education" + $(this).data("secondary_education");
    		let college_education = "College Education" + $(this).data("college_education");
    		let date_enrolled = "Date Registered: " + $(this).data("enrolled");
    		// Set
    		$('#firstname').text(firstname);
    		$('#middlename').text(middlename);
    		$('#lastname').text(lastname);
    		$('#gender').text(gender);
    		$('#date_of_birth').text(date_of_birth);
    		$('#civil_status').text(civil_status);
    		$('#address').text(address);
    		$('#phone').text(phone);
    		$('#place_of_birth').text(place_of_birth);
    		$('#city').text(city);
    		$('#province').text(province);
    		$('#country').text(country);
    		$('#zipcode').text(zipcode);
    		$('#guardian').text(guardian);
    		$('#guardian_relationship').text(guardian_relationship);
    		$('#basic_education').text(basic_education);
    		$('#secondary_education').text(secondary_education);
    		$('#college_education').text(college_education);
    		$('#date_enrolled').text(date_enrolled);

    		


        	$('#information').modal('open');
    	});
	})
</script>
@endsection