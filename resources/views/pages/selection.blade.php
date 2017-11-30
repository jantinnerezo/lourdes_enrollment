@extends('layouts.app')
@section('content')

   <div class="form-container">
		<div class="card">
			<div class="card-action center"><span class="card-title center">Enrollment Options</span></div>
			<div class="card-content">
				  
			        <a href="{{url('registration')}}" class="ui large fluid positive button">New Student</a>
			        <br>	
			        <a href="{{url('login')}}" class="ui large fluid negative button">Existing Student</a>
			    
			</div>
			  <div class="card-action center"></div>
		</div>
	</div>

@endsection