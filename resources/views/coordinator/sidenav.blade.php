<ul class="collection with-header">
    <li class="collection-header center"><img src="{{asset('img/faculty.png')}}" alt="" class="circle responsive-img"></li>
     <li class="collection-item center"><strong>{{session('name')}}</strong></li>
    <li class="collection-item center"><strong>{{session('course')}} {{session('type_long')}}</strong></li>
</ul>

 <ul class="collection student with-header">
    
    @foreach($course_studs as $student)
   
    <a class="collection-item avatar">
      <img src="{{asset('img/avatar.png')}}" alt="" class="circle">
      <span class="title">{{$student->firstname}} {{$student->lastname}}</span>
      <p>{{$student->course}}-{{$student->year_level}}</p>
    </a>

    @endforeach
   
</ul>