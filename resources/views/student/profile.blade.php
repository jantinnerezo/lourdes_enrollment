@extends('layouts.app')
@section('content')
<br>
<div class="row profile">

	<div class="col s3">
		@include('student.sidenav')
	</div>

	<div class="col s9">
			<div class="ui info message">
				  <div class="content">
				    <div class="header">
				     	<i class="fa fa-circle green-text" aria-hidden="true"></i>  Welcome {{$information->firstname}} {{$information->lastname}}
				    </div>
				  </div>
				</div>
		<div class="card attached">
			<div class="ui attached message ">
				  <div class="content">
				    <div class="header">
				    	<span class="fa fa-user"></span> Account Information
				    </div>
				  </div>
			</div>
			<div class="card-content">
			
			
				  <ul class="collection attached">
				      <li class="collection-item">First Name: {{$information->firstname}} </li>
				      <li class="collection-item">Middle Name: {{$information->middlename}}</li>
				      <li class="collection-item">Last Name: {{$information->lastname}}</li>
				      <li class="collection-item">Gender: {{$information->gender}}</li>
				      <li class="collection-item"><i class="fa fa-calendar" aria-hidden="true"></i> Birthday: {{Date('F d, Y',strtotime($information->date_of_birth))}}</li>
				      <li class="collection-item">Civil Status: {{$information->civil_status}}</li>
				      <li class="collection-item"><i class="fa fa-home" aria-hidden="true"> </i> Home Address: {{$information->home_address}}</li>
				      <li class="collection-item"><i class="fa fa-phone" aria-hidden="true"></i> Phone: {{$information->phone}}</li>
				      <li class="collection-item">Place of Birth: {{$information->place_of_birth}}</li>
				      <li class="collection-item">City: {{$information->city}}</li>
				      <li class="collection-item">Province: {{$information->province}}</li>
				      <li class="collection-item">Country: {{$information->country_name}}</li>
				      <li class="collection-item">Zipcode: {{$information->zipcode}}</li>
				      <li class="collection-item">Guardian: {{$information->guardian}}</li>
				      <li class="collection-item">Guardian Relationship: {{$information->guardian_relationship}}</li>
				      <li class="collection-item"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Basic Education: {{$information->basic_education}}</li>
				      <li class="collection-item"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Secondary Education: {{$information->secondary_education}}</li>
				      <li class="collection-item"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>College Education: {{$information->college_education}}</li>
				      <li class="collection-item">Date Registered: {{Date('F d, Y',strtotime($information->date_enrolled))}}</li>

			    </ul>
			</div>
		</div>
	</div>

</div>
@endsection