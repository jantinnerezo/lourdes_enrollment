@extends('layouts.app')
@section('content')

   <div class="showcase">
		<div class="card">
			<div class="card-action center"><span class="card-title center">Enrollment Options</span></div>
			<div class="card-content">
				  <ul class="collection with-header">
			        <a href="{{url('registration')}}" class="collection-item"><i class="fa fa-chevron-right" aria-hidden="true"></i> New Student</a>
			        <a href="{{url('login')}}" class="collection-item"><i class="fa fa-chevron-right" aria-hidden="true"></i> Existing Student</a>
			      </ul>
			</div>
			  <div class="card-action center"></div>
		</div>
	</div>

@endsection