@extends('layouts.app')
@section('content')
<div class="row coordinator">

	<div class="col s4">
		@include('coordinator.sidenav')
	</div>

	<div class="col s8">
		<div class="card">
			<div class="card-content">
				<span class="card-title"><i class="fa fa-exchange" aria-hidden="true"></i> Evaluation Request Feed @if(count($notifications) > 0)
					<span class="new badge" data-badge-caption="">{{count($notifications)}}</span>
					@endif
				<br>
				<br>
				 <div class="row">
				 	 <ul class="collection with-header">
					    @foreach($notifications as $notification)
					   
					    <li class="collection-item avatar teal lighten-5">
					      <img src="{{asset('img/document.png')}}" alt="" class="circle">
					      <p >{{$notification->notification}}</p>
					      <span>{{Date('F d, Y - g:i A', strtotime($notification->date_sent))}} </span>
					      <a href="" class="secondary-content"> Evaluate</a>
					    </li>

					    @endforeach
						</ul>
				 </div>
			</div>
		</div>
	</div>

</div>
@endsection