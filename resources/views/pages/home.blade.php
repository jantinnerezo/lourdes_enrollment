@extends('layouts.app')

@section('content')
 <div class="section no-pad-bot showcase" id="index-banner">
    <div class="container center">
      <br><br>
      <img class="center" src="{{asset('img/logo.png')}}" alt="Lourdes College" width=150> </a>
      <h1 class="header center white-text">Lourdes College</h1>
      <div class="row center">
        <h4 class="header white-text">Business, Accountancy and IT Enrollment System</h4>
      </div>
        @if(session('logged_in'))

        @else
              <div class="row center">
                <a href="{{url('enrollment/options')}}" id="download-button" class="btn-large waves-effect waves-light pink">Enroll Now</a>
             </div>
        @endif
   
      <br><br>

    </div>
  </div>


  <div class="container" >
    <div class="section">

      <div class="row courses">
          <h3 class="center"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Courses Offered</h3>
        <div class="col s12 m4">
          <div class="icon-block center">
              <a href=""><img class="circle" src="{{asset('img/accountancy.jpeg')}}"></a>
              <h5 class="center">Accountancy</h5>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block center">
              <a href=""><img class="circle" src="{{asset('img/it.jpeg')}}"></a>
              <h5 class="center">Information Technology</h5>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block center">
              <a href=""><img class="circle" src="{{asset('img/marketing.jpeg')}}"></a>
              <h5 class="center">Marketing and Finance</h5>
          </div>
        </div>
      </div>

    </div>
    <br><br>
  </div>
@endsection