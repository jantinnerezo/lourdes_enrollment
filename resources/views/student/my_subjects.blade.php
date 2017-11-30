@extends('layouts.app')
@section('content')
<br>
<div class="row profile">

	<div class="col s3">
		@include('student.sidenav')
	</div>

	<div class="col s9">
		
		<div class="card attached notifications">
			<div class="ui attached message ">
				  <div class="content">
				    <div class="header">
				    	<span class="fa fa-book"></span> My Subjects
				    </div>
				    <p>List of your subjects taken on each year.</p>
				  </div>
			</div>
			<div class="card-content">
				
				@include('includes.message')

				 <ul class="collapsible" data-collapsible="accordion">
							    <li>
							      <div class="collapsible-header"><i class="material-icons">bookmark</i>First Year</div>
							      <div class="collapsible-body">
							      	@if(count($firstyear) > 0)
								            <table class="ui celled padded table">
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
								                  @foreach($firstyear as $subject)
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
								       
								      @else
								         	<div class="row center">
								         		 <div class="ui warning message">
								         		 	<div class="header">No subjects yet</div>
										  		</div>
								         	</div>				
								      @endif
							      </div>
							    </li>
							    <li>
							      <div class="collapsible-header"><i class="material-icons">bookmark</i>Second Year</div>
							      <div class="collapsible-body">
							      	 @if(count($secondyear) > 0)
								            <table class="ui celled padded table">
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
								                  @foreach($secondyear as $subject)
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
								       
								      @else
								         	<div class="row center">
								         		 <div class="ui warning message">
								         		 	<div class="header">No subjects yet</div>
										  		</div>
								         	</div>		
								      @endif
							      </div>
							    </li>
							    <li>
							     <div class="collapsible-header"><i class="material-icons">bookmark</i>Third Year</div>
							      <div class="collapsible-body">
							      		 @if(count($thirdyear) > 0)
								            <table class="ui celled padded table">
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
								                  @foreach($thirdyear as $subject)
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
								       
								      @else
								         	<div class="row center">
								         		 <div class="ui warning message">
								         		 	<div class="header">No subjects yet</div>
										  		</div>
								         	</div>		
								      @endif
							      </div>
							    </li>
							     <li>
							     <div class="collapsible-header"><i class="material-icons">bookmark</i>Fourth Year</div>
							      <div class="collapsible-body">
							      		 @if(count($fourthyear) > 0)
								            <table class="ui celled padded table">
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
								                  @foreach($fourthyear as $subject)
								                   <tr>
								                     <td>{{$subject->subject}}</td>
								                     <td>{{$subject->descriptive}}</td>
								                     <td>{{$subjectt->lec}}</td>
								                     <td>{{$subject->lab}}</td>
								                     <td>{{$subject->credit_units}}</td>
								                     <td>{{$subject->total_hours}}</td>
								                     <td>{{$subject->pre_req}}</td>
								                  </tr>
								                  @endforeach
								              </tbody>
								            </table>
								       
								      @else
								         	<div class="row center">
								         		 <div class="ui warning message">
								         		 	<div class="header">No subjects yet</div>
										  		</div>
								         	</div>		
								      @endif
							      </div>
							    </li>
							  </ul>

			</div>
		</div>
	</div>

</div>
@endsection