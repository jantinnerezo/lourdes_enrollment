@extends('layouts.app')
@section('content')

   <div class="showcase">
		<div class="card">
			@include('includes.message')
		{!! Form::open(['action' => 'PagesController@executeLogin', 'method' => 'POST']) !!}
			<div class="card-content">
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
               	<button class="btn waves-effect waves-light pink" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Login
  						  </button>
            </div>
         {!! Form::close() !!}
		</div>
	</div>

@endsection