@if(session('success'))
	<div class="row center">
      <div class="ui positive message">
        <p>{{session('success')}}</p>
      </div>
     </div>

@endif

@if(session('error'))
	<div class="row center">
		 <div class="ui negative message">
        <p>{{session('error')}}</p>
      </div>
	</div>
@endif

@if(session('delete_faculty'))
    <div class="ui attached warning message">
      <div class="header">
        Are you sure you want to remove faculty? Delete also faculty records?
      </div>
    {!! Form::open(['action' => 'AdminController@remove_faculty', 'method' => 'POST']) !!}
     <div class="ui form">
      <input type="hidden" name="faculty_id" value="{{session('delete_faculty')}}">
        <button type="submit" name="rejected" class="waves-effect waves-light btn green">Yes</button> <a href="{{url('account/registrar/faculties')}}" class="waves-effect waves-light btn red cancel">No</a> 
      </div>
      {!! Form::close() !!}
  </div>

@endif



