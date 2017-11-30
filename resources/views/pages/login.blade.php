@extends('layouts.app')
@section('content')

   <div class="form-container">
   	
		<div class="card">
			
		
			<div class="card-content">
				<h1 class="card-title center"><i class="fi-torso" aria-hidden="true"></i> Login </h1>
				<ul class="tabs center">
			        <li class="tab col s3"><a href="#students">Students</a></li>
			        <li class="tab col s3"><a href="#administrators">Administrators</a></li>
				</ul>

				<div id="students">
					{!! Form::open(['action' => 'PagesController@executeLogin', 'method' => 'POST']) !!}
						<br>
						@include('includes.message')
						<input type="hidden" class="validate" name="user" value="student" required readonly>
				
						<div class="input-field">
					        <input type="text" class="validate" name="email" required>
							<label>Email Address</label>
						 </div>
						 <div class="input-field">
					        <input type="password" class="validate" name="password" required>
							<label>Password</label>
						 </div>
				
						  <div class="card-action center">
			               	<button class="large fluid positive ui button" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Login
			  						  </button>
			              </div>

					{!! Form::close() !!}	
				</div>

				<div id="administrators">
					{!! Form::open(['action' => 'PagesController@executeLogin', 'method' => 'POST']) !!}
						<br>
						@include('includes.message')
						<input type="hidden" class="validate" name="user" value="r_c" required readonly>
						
						<div class="input-field">
					        <input type="text" class="validate" name="username" required>
							<label>Username</label>
						 </div>
						 <div class="input-field">
					        <input type="password" class="validate" name="password" required>
							<label>Password</label>
						 </div>
				
						  <div class="card-action center">
			               	<button class="large fluid positive ui button" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Login
			  						  </button>
			              </div>

					{!! Form::close() !!}	
				</div>
				
				
		</div>
	</div>
</div>

@endsection