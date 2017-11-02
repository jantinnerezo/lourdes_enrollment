@extends('layouts.app')
@section('content')
<div class="row profile">

	<div class="col s3">
		@include('administrator.sidenav')
	</div>

	<div class="col s9">
		<div class="card">
			<div class="card-content">
				<span class="card-title"><i class="fa fa-line-chart" aria-hidden="true"></i> Dashboard</span>

				 <div class="row dashboard">

				      <div class="col s4">
				       		<i class="fi-torso"></i>
				       		<p>test</p>
				      </div>
				      <div class="col s4">
				        <!-- Promo Content 2 goes here -->
				      </div>
				      <div class="col s4">
				        <!-- Promo Content 3 goes here -->
				      </div>

				 </div>
			</div>
		</div>
	</div>

</div>
@endsection