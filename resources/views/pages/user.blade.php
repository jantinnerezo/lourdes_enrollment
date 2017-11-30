@extends('layouts.app')
@section('content')

   <div class="form-container">
		<div class="card">
		{!! Form::open(['action' => 'PagesController@executeLogin', 'method' => 'POST']) !!}
			<div class="card-content">
				@include('includes.message')
				<input type="hidden" class="validate" name="user" value="r_c" required readonly>
				<h1 class="card-title center"><i class="fi-torso" aria-hidden="true"></i> Login </h1>
				<div class="input-field">
			        <input type="text" class="validate" name="username" required>
					<label>Username</label>
				 </div>
				 <div class="input-field">
			        <input type="password" class="validate" name="password" required>
					<label>Password</label>
				 </div>
			  </div>
			  <div class="card-action center">
               	<button class="large fluid positive ui button" type="submit"><i class="fa fa-sign-in" aria-hidden="true"></i> Login
  						  </button>
           	  </div>
         {!! Form::close() !!}
		</div>
	</div>

@endsection