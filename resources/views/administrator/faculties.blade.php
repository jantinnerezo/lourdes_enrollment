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
			  	@if(count($faculties) > 0)
					 <i class="fa fa-users" aria-hidden="true"></i> Faculties ({{count($faculties)}})
				@else
					<i class="fa fa-users" aria-hidden="true"></i> Faculties (0)
				@endif
			  </div> 
			  <p>All faculties</p>
			</div>
			<div class="card-content">
				
				@include('includes.message')
				<br>
				<div class="row">
				      <div class="col s4">
				      	 <a class='btn pink modal-trigger' href='#addFaculty' ><i class="material-icons left">person_add</i> Add faculty</a>
				      </div>
				      <div class="col s4">
				       	
				      </div>
				      <div class="col s4">
				           <input placeholder="Search" id="search" type="text" class="validate">
				      </div>
				</div> 

				  @if(count($faculties) > 0)
                     <ul class="collection with-header">

                     	@foreach($faculties as $faculty)

                 		   <li class="collection-item"><div><i class="material-icons left">person</i> {{$faculty->faculty_name}}<a href="{{url('account/registrar/faculties/onremove?faculty_id=')}}{{$faculty->faculty_id}} " class="secondary-content red-text"> <i class="fa fa-trash" aria-hidden="true"></i> Remove</a></div></li>

                     	@endforeach
				     
				     </ul>
                  @else
                       <div class="row center">
		       					<h5><span class="fa fa-search"></span> No faculty found</h5>
		       			</div>
                  @endif
			</div>
		</div>
	</div>

</div>

 <!-- View add faculty -->
 <div id="addFaculty" class="modal">
 {!! Form::open(['action' => 'AdminController@store_faculty', 'method' => 'POST']) !!}
    <div class="modal-content">
      <h5 class="center"><i class="material-icons left">person_add</i> Add Faculty</h5>
      <br>
	    <div class="row">
	        <div class="input-field col s12">
	          <input id="faculty_name" type="text" class="validate" name="faculty_name" required>
	          <label for="faculty_name">Faculty Name</label>
	        </div>
        </div>
    </div>
    <div class="modal-footer">
    	 <button type="submit" class="modal-action modal-close waves-effect waves-green btn green">Add Faculty</button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn red ">Close</a>
    </div>

    {!! Form::close() !!}
 </div>

 


<script>
	 $(document).ready(function() {

		 $('.modal').modal();

		var url      = window.location.href;  
		$('#search').keypress(function (e) {
		  if (e.which == 13) {
		   	 window.location.href =	updateQueryStringParameter( url, 'search', $(this).val())
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