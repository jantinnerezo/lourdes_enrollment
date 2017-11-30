<nav class="light" role="navigation">
    <div class="nav-wrapper"><a id="logo-container" href="#" class="brand-logo"><img src="{{asset('img/busac.svg')}}" width=40></a>
      <ul class="right hide-on-med-and-down">

      
        @if(session('logged_in'))

            @if(session('type') == 1) <!-- Registrar -->

              <li><a id="request" href="#enrollment"><i class="fa fa-bell" aria-hidden="true"></i> Notifications 
                @if(count($request))
                  <span class="badge new">{{count($request)}}</span>
                @endif
               </a></li>

              <li><a class="dropdown-button" href="#!" data-activates="logout"> <span class="fi-torso"></span> {{session('name')}} <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>

               <li><a href="#" class="sy"><span class="fa fa-flag"></span> Semester: {{$semester->semester}} </a></li>

              <li><a href="#" class="sy"><span class="fa fa-calendar"></span> School year: {{$school_year}} </a></li>

            @endif

            @if(session('type') == 2) <!-- Coordinator -->

                <li><a  href="{{url('account/coordinator/coordinator')}}"><i class="fa fa-exchange" aria-hidden="true"></i> Enrollment Request 
               </a></li>

              <li><a class="dropdown-button" href="#!" data-activates="logout"> <span class="fi-torso"></span> {{session('name')}} <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>

               <li><a href="#" class="sy"><span class="fa fa-flag"></span> Semester: {{$semester->semester}} </a></li>

              <li><a href="#" class="sy"><span class="fa fa-calendar"></span> School year: {{$school_year}} </a></li>

            @endif

            @if(session('type') == 3) <!-- Student -->

                <li><a href="{{url('/')}}"><span class="fi-home"></span> Home</a></li>

                <li><a href="{{url('subjects')}}/{{session('course')}}?semester=1&year={{session('year')}}"><i class="fa fa-file-text" aria-hidden="true"></i> Prospectus </a></li>

                <li><a href="{{url('schedules')}}/{{session('course')}}"><i class="fa fa-calendar" aria-hidden="true"></i> Schedules </a></li>

                <li><a class="dropdown-button" href="#!" data-activates="userdrop"> <span class="fi-torso"></span> {{session('name')}} <i class="fa fa-caret-down" aria-hidden="true"></i></a></li>

                <li><a href="#" class="sy"><span class="fa fa-flag"></span> Semester: {{$semester->semester}} </a></li>

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
       <li><a href="{{url('courses')}}/{{$course->course}}?semester=1&year=1">{{$course->course}}</a></li>
      <li class="divider"></li>
  @endforeach
</ul>


<!-- Enrollment Request -->

<div id="enrollment" class="modal modal-fixed-footer">
  <div class="modal-content">
      @if(count($lists) > 0)
        @foreach($lists as $list)

        <div class="card">
          <div class="card-content">
             <div class="card-title">{{$list->firstname}} {{$list->lastname}} </div>
             <div class="card-subtitle">Enrollment Confirmation Request</div>
             <div class="card-subtitle">Date submitted: {{Date('F g, Y',strtotime($list->request_date))}} </div>
          </div>
          <div class="card-action">
               <a href="{{url('account/registrar/confirmation_list/view_subjects')}}/{{$list->student_email}}" class="waves-effect waves-teal btn blue" >View</a>
          </div>
        </div>
         @endforeach
      @else
        <div class="ui warning message">
            <div class="header center">
              No notifications yet
            </div>
        </div>
      @endif
      
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Close</a>
  </div>
</div>


<script>
   $(document).ready(function(){
    // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
    //$('.modal').modal();

    $('#request').click(function(){
         $('#enrollment').modal('open');
    });
  });
</script>

