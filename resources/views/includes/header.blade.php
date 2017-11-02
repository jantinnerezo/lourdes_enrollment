<nav class="light" role="navigation">
    <div class="nav-wrapper"><a id="logo-container" href="#" class="brand-logo"><img src="{{asset('img/busac.svg')}}" width=40></a>
      <ul class="right hide-on-med-and-down">

        

        @if(session('logged_in'))

            @if(session('type') == 1) <!-- Registrar -->

              <li><a class="dropdown-button" href="#!" data-activates="logout"> <span class="fi-torso"></span> {{session('name')}} <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>

              <li><a href="#" class="sy"><span class="fa fa-calendar"></span> School year: {{$school_year}} </a></li>

            @endif

            @if(session('type') == 2) <!-- Coordinator -->

              <li><a class="dropdown-button" href="#!" data-activates="logout"> <span class="fi-torso"></span> {{session('name')}} <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>

              <li><a href="#" class="sy"><span class="fa fa-calendar"></span> School year: {{$school_year}} </a></li>

            @endif

            @if(session('type') == 3) <!-- Student -->

                <li><a href="{{url('/')}}"><span class="fi-home"></span> Home</a></li>

                <li><a href="{{url('subjects')}}/{{session('course')}}"><i class="fa fa-book" aria-hidden="true"></i> Subjects Offered </a></li>

                <li><a href="{{url('schedules')}}/{{session('course')}}"><i class="fa fa-calendar" aria-hidden="true"></i> Schedules </a></li>
                
                <li><a class="dropdown-button" href="#!" data-activates="userdrop"> <span class="fi-torso"></span> {{session('name')}} <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>

                <li><a href="#" class="sy"><span class="fa fa-calendar"></span> School year: {{$school_year}} </a></li>

            @endif


          

        @else


            <li><a href="{{url('/')}}"><span class="fi-home"></span> Home</a></li>

             <li><a href="{{url('enrollment/options')}}"><span class="fi-clipboard-pencil"></span> Enrollment </a></li>

              <li><a class="dropdown-button" href="#!" data-activates="courses"> <i class="fa fa-graduation-cap" aria-hidden="true"></i> Courses offers <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>

            <li><a href="{{url('login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Login </a></li>

        @endif

       

        

       



      </ul>

      <ul id="nav-mobile" class="side-nav">
        
        <li><a href="#"><span class="fi-home"></span> Home</a></li>

        <li><a href="#"><span class="fi-clipboard-pencil"></span> Enrollment </a></li>

        <li><a href="#"><span class="fi-list"></span> Courses offered </a></li>

      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
</nav>

<!-- Logout Structure -->
<ul id="userdrop" class="dropdown-content">
  <li><a href="{{url('account/student/profile')}}/{{session('urlname')}}">Profile</a></li>
  <li class="divider"></li>
  <li><a href="{{url('logout')}}">Logout</a></li>
</ul>

<!-- Logout Structure 2 -->
<ul id="logout" class="dropdown-content">
  <li><a href="{{url('logout')}}">Logout</a></li>
</ul>

<!-- Logout Structure 2 -->
<ul id="courses" class="dropdown-content">
  @foreach($courses as $course)
       <li><a href="#!">{{$course->course}}</a></li>
      <li class="divider"></li>
  @endforeach
</ul>

