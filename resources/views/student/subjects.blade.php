@extends('layouts.app')


@section('content')
	
	<div class="container">

		<div class="card">
			<div class="card-content">

				<span class="card-title center"><i class="fa fa-book" aria-hidden="true"></i> {{session('course')}}-{{session('year')}} Subjects</span>
				<br>
				<div class="row">
				      <div class="col s4">
				      	  <select id="semester">
						      <option value="0" disabled selected>Sort by semester</option>
						      <option value="1">1st semester</option>
						      <option value="2">2nd semester</option>
						   </select>
				      </div>
				      <div class="col s4">
				       	  <select id="year">
						       <option value="0" disabled selected>Sort by year</option>
						       <option value="1">1st year</option>
						       <option value="2">2nd year</option>
						       <option value="3">3rd year</option>
						       <option value="4">4th year</option>
						   </select>
				      </div>
				      <div class="col s4">
				           <input placeholder="Search" id="first_name" type="text" class="validate">
				      </div>
				</div> 
				<br>
					@if(count($subjects) > 0)
			            <table class="striped">
			              <thead>
			                  <th>Subject</th>
			                  <th>Descriptive title</th>
			                  <th>Lec</th>
			                  <th>Lab</th>
			                  <th>Credit Units</th>
			                  <th>Total hrs / week</th>
			                  <th>Pre-req</th>
			              </thead>
			          
			              <tbody>
			                  @foreach($subjects as $subject)
			                   <tr>
			                     <td>{{$subject->subject}}</td>
			                     <td>{{$subject->descriptive}}</td>
			                     <td>{{$subject->lec}}</td>
			                     <td>{{$subject->lab}}</td>
			                     <td>{{$subject->credit_units}}</td>
			                     <td>{{$subject->total_hours}}</td>
			                     <td>{{$subject->pre_req}}</td>
			                  </tr>
			                  @endforeach
			              </tbody>
			            </table>
			       <div class="row center">
			       		{{ $subjects->links() }}
			       </div>
			      @else
			           No subjects found
			      @endif
			</div>
		</div>
	
	</div>
<script>
	 $(document).ready(function() {

	 	var sem = localStorage.getItem('semester');
	 	var y = localStorage.getItem('year')
	 	var url      = window.location.href;  
		if(sem != null){
			$( "#semester" ).val(sem)
			
		}
		else{
			$( "#semester" ).val('0')
		}

		if(y != null){
			$( "#year" ).val(y)
			
		}
		else{
			$( "#year" ).val('0')
		}

   		$('select').material_select();
   		


        $( "#semester" ).change(function() {

           var semester = $(this).val();    
           localStorage.setItem('semester',semester);    	
           window.location.href =	updateQueryStringParameter( url, 'semester', semester )
            
        });

         $( "#year" ).change(function() {

           var year = $(this).val();        	
           localStorage.setItem('year',year);    	
           window.location.href =	updateQueryStringParameter( url, 'year', year )
            
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