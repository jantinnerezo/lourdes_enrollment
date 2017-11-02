<ul class="collection with-header sidenav">
		<li class="collection-header center"><img src="{{asset('img/marketing.jpeg')}}" alt="" class="circle responsive-img"></li>
		<li class="collection-item center"><strong>{{session('name')}}</strong></li>
		<li class="collection-item center"><strong>{{session('course')}}-{{session('year')}}</strong></li>
        <a href="{{url('account/student/profile')}}/{{session('urlname')}}" class="collection-item"><i class="fa fa-user" aria-hidden="true"></i> Account Information</a>
        <a href="{{url('login')}}" class="collection-item"><i class="fa fa-book" aria-hidden="true"></i> Subjects </a>
	     <a href="{{url('login')}}" class="collection-item"><i class="fa fa-paper-plane" aria-hidden="true"></i> Requested Subjects </a>
         <a href="{{url('login')}}" class="collection-item"><i class="fa fa-envelope" aria-hidden="true"></i> Notifications </a>
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