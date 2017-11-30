@extends('layouts.app')
@section('content')
<br>
<div class="row profile">

	<div class="col s3">
		@include('administrator.sidenav')
	</div>

	<div class="col s9">

		<div class="card attached">
		<div class="ui attached message">
		  <div class="header pink-text">
		  	@if(count($all) > 0)
				 <i class="fa fa-users" aria-hidden="true"></i> Students ({{count($all)}})
			@else
				<i class="fa fa-users" aria-hidden="true"></i> Students (0)
			@endif
		  </div> 
		</div>
		
			<div class="card-content">
				 @include('includes.message')

				 <div class="ui negative message confirmation">
								  <div class="header">
								   Are you sure you want to unenroll all students?
								  </div>
							
						        <br>
						        <a href="{{url('unenroll')}}" class="waves-effect waves-light btn green"><i class="material-icons left">check</i>Yes</a> <a class="waves-effect waves-light btn red cancel"><i class="material-icons left">close</i>No</a> 
				 </div>
				  <div class="row">
					    <div class="col s12">
					      <ul class="tabs">
					      	<li class="tab col s3"><a href="#unenrolled">Unenrolled</a></li>
					      	<li class="tab col s3"><a href="#enrolled">Enrolled</a></li>
					        <li class="tab col s3"><a href="#students2">Unverified 
					        	@if(count($unverify) > 0)
					        		<span class="new badge">{{count($unverify)}}</span>
					        	@endif
					        </a></li>
					      </ul>
					    </div>
					     <br>
					    <div id="unenrolled" class="col s12">

					    	 <br>	
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
							       	  <select id="year">
									       <option value="" disabled selected>Sort by year level</option>
									       <option value="1">1st year</option>
									       <option value="2">2nd year</option>
									       <option value="3">3rd year</option>
									       <option value="4">4th year</option>
									   </select>
							      </div>
							      <div class="col s3">
							           <input placeholder="Search" id="search" type="text" class="validate">
							      </div>

							       <div class="col s3">
								      
							          
							      </div>
						    </div> 

					    	@if(count($unenrolled) > 0)

					    		<table class="ui celled padded table attached">
							        <thead>
							          <tr>
							              <th>Full Name</th>
							              <th>Course & Year</th>
							              <th>Email Address</th>
							              <th class="center">Options</th>
							          </tr>
							        </thead>

							        <tbody>
							        	@foreach($unenrolled as $student)
							        	  <tr>
								            <td>{{$student->firstname}} {{$student->middlename}}. {{$student->lastname}}</td>
								            <td>{{$student->course}}-{{$student->year_level}}</td>
								            <td>{{$student->email}}</td>
								            <td class="center"><button class="waves-effect waves-light btn green clickable-row" data-href="{{url('account/registrar')}}/students/{{$student->email}}"><li class="fa fa-eye"></li></button></td>
								          </tr>
							            @endforeach
							        </tbody>
						      	</table>
					    	@else
					    		
					    		<div class="ui attached warning message">
								  	<div class="header center aligned">
								  		@if($search)
								  		   Search for "{{$search}}" no matched found!
								  		@else
								  			No students found
								  		@endif
								  	</div>
								</div>
					    	@endif
					    	 
					    </div>

					    <div id="enrolled" class="col s12">

					    	 <br>	
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
							       	  <select id="year">
									       <option value="" disabled selected>Sort by year level</option>
									       <option value="1">1st year</option>
									       <option value="2">2nd year</option>
									       <option value="3">3rd year</option>
									       <option value="4">4th year</option>
									   </select>
							      </div>
							      <div class="col s3">
							           <input placeholder="Search" id="search" type="text" class="validate">
							      </div>

							       <div class="col s3">
								       	@if(count($enrolled) > 0)
								       		 <a href="#" class="waves-effect waves-green btn red unenroll">Unenroll all</a>
								       	@else

								       	@endif
							          
							      </div>
						    </div> 

					    	@if(count($enrolled) > 0)

					    	
							    @include('includes.message')
					    		<table class="ui celled padded table attached">
							        <thead>
							          <tr>
							              <th>Full Name</th>
							              <th>Course & Year</th>
							              <th>Email Address</th>
							              <th class="center">Options</th>
							          </tr>
							        </thead>

							        <tbody>
							        	@foreach($enrolled as $student)
							        	  <tr>
								            <td>{{$student->firstname}} {{$student->middlename}}. {{$student->lastname}}</td>
								            <td>{{$student->course}}-{{$student->year_level}}</td>
								            <td>{{$student->email}}</td>
								            <td class="center"><button class="waves-effect waves-light btn green clickable-row" data-href="{{url('account/registrar')}}/students/{{$student->email}}"><li class="fa fa-eye"></li></button></td>
								          </tr>
							            @endforeach
							        </tbody>
						      	</table>
					    	@else
					    		
					    		<div class="ui attached warning message">
								  	<div class="header center aligned">
								  		@if($search)
								  		   Search for "{{$search}}" no matched found!
								  		@else
								  			No students found
								  		@endif
								  	</div>
								</div>
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
							  	<div class="ui attached info message">
								  <div class="header">
								   	What will happen after verifying students?
								  </div>
								  <p>Newly verified students will receive an email from the system with their account password.</p>
								</div>
					    		<table class="ui celled padded table attached">
							        <thead>
							          <tr>
							               <th>View</th>
							              <th>Full Name</th>
							              <th>Desired course</th>
							              <th>Email Address</th>
							              <th>Date Registered</th>
							              <th class="center">Action</th>
							          </tr>
							        </thead>

							        <tbody>
							        	@foreach($unverify as $student)
								          <tr>
								          	<td><a class="waves-effect waves-light btn" id="viewInformation" data-email="{{$student->email}}" data-name="{{$student->firstname}} {{$student->lastname}}"
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
                                                data-enrolled="{{Date(('F d, Y'), strtotime($student->date_enrolled))}}" ><i class="material-icons">account_box</i></a></td>
								            <td>{{$student->firstname}} {{$student->middlename}}. {{$student->lastname}}</td>
								            <td>{{$student->course}}</td>
								            <td>{{$student->email}}</td>
								            <td>{{Date(('F d, Y'), strtotime($student->date_enrolled))}}</td>
								            <td id="checkboxes"><p class="center">
										      <input type="checkbox" class="verify-check" id="{{$student->email}}" name="emails[]" value="{{$student->email}}" />
										      <label for="{{$student->email}}"></label>
										    </p></td>
								          </tr>
							            @endforeach
							        </tbody>
						      	</table>
						      	<br>

						      	
						     {!! Form::close() !!}
					    	@else
					    	<br>	
					    		<div class="ui attached warning message">
								  	<div class="header center aligned">No unverified students yet.</div>
								</div>
					    	@endif
					    </div>
					    
				  </div>
				 
			</div>
		</div>
	</div>

</div>


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


		$('.confirmation').hide();
		var url = window.location.href;  
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


		 $("#course" ).change(function() {

           window.location.href =	updateQueryStringParameter( url, 'course', $(this).val() )
            
        });

		 $("#year" ).change(function() {

           window.location.href =	updateQueryStringParameter( url, 'year', $(this).val() )
            
        });

		  $(".unenroll" ).click(function() {

          		$('.confirmation').show();
            
        });

		    $(".cancel" ).click(function() {

          		$('.confirmation').hide();
            
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
    		let basic_education = "Basic Education: " + $(this).data("basic_education");
    		let secondary_education = "Secondary Education: " + $(this).data("secondary_education");
    		let college_education = "College Education: " + $(this).data("college_education");
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