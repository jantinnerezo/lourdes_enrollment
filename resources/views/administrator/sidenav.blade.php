<ul class="collection with-header sidenav">
		<li class="collection-header center"><img src="{{asset('img/faculty.png')}}" alt="" class="circle responsive-img"></li>
		<li class="collection-item center"><strong>{{session('name')}}</strong></li>
		<li class="collection-item center"><strong>{{session('type_long')}}</strong></li>
        <a href="{{url('account/registrar')}}/students" class="collection-item"><i class="fa fa-users" aria-hidden="true"></i> Students</a>
        <a href="{{url('account/registrar')}}/subjects" class="collection-item"><i class="fa fa-book" aria-hidden="true"></i> Subjects </a>
	     <a href="{{url('account/registrar')}}/schedules" class="collection-item"><i class="fa fa-calendar" aria-hidden="true"></i> Schedules </a>
         <a href="{{url('account/registrar')}}/faculties" class="collection-item"><i class="fa fa-users" aria-hidden="true"></i> Faculty </a>
          <a href="{{url('login')}}" class="collection-item"><i class="fa fa-users" aria-hidden="true"></i> Users </a>
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