<div class="ui positive message">
  <div class="header">
    <strong>{{session('name')}}</strong>
  </div>
  <p>{{session('course')}}-{{session('year')}}</p>
</div>

<ul class="collection with-header attached">

  
        @if(session('enrolled') == 1)
            <li class="collection-header center green white-text">Enrolled</li>
        @else
            <li class="collection-header center red white-text">Not enrolled</li>
        @endif
        
        <a href="{{url('account/student/profile')}}/{{session('urlname')}}" class="collection-item"><i class="fa fa-user" aria-hidden="true"></i> Account Information</a>
        <a href="{{url('account/student/my_subjects')}}/{{session('urlname')}}" class="collection-item"><i class="fa fa-book" aria-hidden="true"></i> My Subjects </a>
        <a href="{{url('account/student/my_schedules')}}/{{session('urlname')}}" class="collection-item"><i class="fa fa-calendar" aria-hidden="true"></i>  My schedules </a>
	     <a href="{{url('account/student/request')}}/{{session('urlname')}}" class="collection-item"><i class="fa fa-exchange" aria-hidden="true"></i>  Enrollment Request </a>
          <a href="{{url('account/student/notifications')}}/{{session('urlname')}}" class="collection-item"><i class="fa fa-rss" aria-hidden="true"></i>  Notification Feed </a>
        
</ul>



<script>
    $(document).ready(function () {
        var url = window.location;
        $('collection a[href="'+ url +'"]').parent().addClass('active');
        $('collection a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 