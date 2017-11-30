@extends('layouts.app')
@section('content')
<br>	
<div class="row profile">

	<div class="col s3">
		@include('administrator.sidenav')
	</div>

	<div class="col s9">
		<div class="card attached">	
			<div class="ui attached message">
			  <div class="header pink-text">
			  	@if(count($users) > 0)
					 <i class="fa fa-users" aria-hidden="true"></i> Users ({{count($users)}})
				@else
					<i class="fa fa-users" aria-hidden="true"></i> Users (0)
				@endif
			  </div> 
			  <p>All Users</p>
			</div>
			<div class="card-content">
				
				@include('includes.message')
				<br>
				<div class="row">
				      <div class="col s4">
				      	 <a class='btn pink modal-trigger' href='#addFaculty' ><i class="material-icons left">person_add</i> Add User</a>
				      </div>
				      <div class="col s4">
				       	
				      </div>
				      <div class="col s4">
				           <input placeholder="Search" id="search" type="text" class="validate">
				      </div>
				</div> 

				  @if(count($users) > 0)
                     <ul class="collection with-header">
                     {!! Form::open(['action' => 'AdminController@remove_user', 'method' => 'POST']) !!}	
                     	@foreach($users as $user)


                     	   <input type="hidden" name="username" value="{{$user->username}}">
                 		   <li class="collection-item"><div><i class="material-icons left">person</i> {{$user->name}}<button type="submit" class="secondary-content btn-flat red-text"> <i class="fa fa-trash" aria-hidden="true"></i> Remove</button></div></li>

                     	@endforeach
				     
				     </ul>
				     {!! Form::close() !!}
                  @else
                       <div class="row center">
		       					<h5><span class="fa fa-search"></span> No users found</h5>
		       			</div>
                  @endif

			</div>
		</div>
	</div>

</div>

 <!-- View add faculty -->
 <div id="addFaculty" class="modal">
 {!! Form::open(['action' => 'AdminController@store_user', 'method' => 'POST']) !!}
    <div class="modal-content">
      <h5 class="center"><i class="material-icons left">person_add</i> Add User</h5>
      <br>
	    <div class="row">
	        <div class="input-field col s12">
	          <input id="username" type="text" class="validate" name="username" required>
	          <label for="username">Username</label>
	        </div>
	          <div class="input-field col s12">
	          <input id="name" type="text" class="validate" name="name" required>
	          <label for="name">Name</label>
	        </div>
	         <div class="input-field col s12">
	          <input id="password" type="text" class="validate" name="password" required>
	          <label for="password">Password</label>
	        </div>
	         <div class="col s12">
	         	 <select id="user_type" name="user_type">
				      <option value="" disabled selected>User Type</option>
				      <option value="1">Registrar</option>
				      <option value="2">Coordinator</option>
				</select>
	        </div>

        </div>

       <div class="row" id="course_id">
       	
	        <div class="col s12">
	         	 <select  name="course_id">
				      <option value="4" disabled selected>Coordinator course</option>
				      <option value="1">BSA</option>
				      <option value="2">BSIT</option>
				      <option value="3">BSBA</option>
				</select>
	        </div>
       </div>
    </div>
    <div class="modal-footer">
    	 <button type="submit" class="modal-action modal-close waves-effect waves-green btn green">Add User</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn red ">Close</a>
    </div>

    {!! Form::close() !!}
 </div>



<script>
	 $(document).ready(function() {

		 $('.modal').modal();

		 $('#course_id').hide();

		var url      = window.location.href;  
		$('#search').keypress(function (e) {
		  if (e.which == 13) {
		   	 window.location.href =	updateQueryStringParameter( url, 'search', $(this).val())
		  }
		});


        $( "#user_type" ).change(function() {

         
          		if($(this).val() == '1'){

          			 $('#course_id').hide();

          		}else{

          			 $('#course_id').show();

          		}
         
            
        });


        function updateQueryStringParameter(uri, key, value) {
			  var re = new RegExp("([?&])" + key + "=.*?(&|#|$)", "i");
			  if( value === undefined ) {
			  	if (uri.match(re)) {
					return uri.replace(re, '$1$2');
				} else {
					return uri;
				}
			  } else {
			  	if (uri.match(re)) {
			  		return uri.replace(re, '$1' + key + "=" + value + '$2');
				} else {
			    var hash =  '';
			    if( uri.indexOf('#') !== -1 ){
			        hash = uri.replace(/.*#/, '#');
			        uri = uri.replace(/#.*/, '');
			    }
			    var separator = uri.indexOf('?') !== -1 ? "&" : "?";    
			    return uri + separator + key + "=" + value + hash;
			  }
			  }  
		}
  
  	});
</script>
@endsection