@extends('layouts.app')
@section('content')
<div class="row profile">

	<div class="col s3">
		@include('administrator.sidenav')
	</div>

	<div class="col s9">
		<div class="card">	
			<div class="card-content">
				<span class="card-title"><i class="fa fa-user" aria-hidden="true"></i> {{$information->firstname}} {{$information->lastname}} - 
					@if($information->enrolled == 1)
						<span class="green-text">Enrolled</span>
					@else
						<span class="red-text">Not Enrolled</span>
					@endif
				</span>
				 <div class="row">
					    <div class="col s12">
					      <ul class="tabs">
					        <li class="tab col s3"><a href="#information">Information</a></li>
					        <li class="tab col s3"><a href="#subjects">Subjects</a></li>
					        <li class="tab col s3"><a href="#schedules">Schedules</a></li>
					      </ul>
					    </div>
					    <br>
					     <div id="information" class="col s12">
							  <ul class="collection">
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
					     <div id="subjects" class="col s12">
					     </div>
					     <div id="schedules" class="col s12">
					     </div>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection