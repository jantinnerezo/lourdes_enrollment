<br>
<div class="ui positive message">
  <div class="header">
    <strong>{{session('name')}}</strong>
  </div>
  <p>{{session('course')}} {{session('type_long')}}</p>
</div>

<div class="ui attached message">
  <div class="header">
    <span class="fa fa-users"></span> {{session('course')}} Students

  </div>
 <br>
    <div class="ui form">
       <div class="field">
           <textarea rows="1" id="search" placeholder="Search students"></textarea>
       </div>
    </div>

</div>
<div class="ui attached items  student-list">

  @if(count($course_studs) > 0)

     @foreach($course_studs as $student)
      <div class="item">
        <a class="ui mini image" >
          <img class="ui avatar image" src="{{asset('img/avatar.png')}}">
        </a>
        <div class="content">
         
          <a href="{{url('account/coordinator/student')}}/{{$student->email}}"> <div class="ui tiny header">{{$student->firstname}} {{$student->lastname}}</div>
          <div class="description">
            <p>{{$student->course}}-{{$student->year_level}}</p>
          </div></a>
        </div>
        @if($student->enrolled == 1)
          <p class="green-text">Enrolled</p>
        @else
          <p class="red-text">Not enrolled</p>
        @endif
      </div>
       @endforeach

  @else
      <br>
      <div class="center">
        <p>No students found.</p>
      </div>

  @endif
 
</div>


<script>
   $(document).ready(function() {

    var url  = window.location.href;  

  $('#search').keypress(function (e) {
      if (e.which == 13) {
         window.location.href = updateQueryStringParameter( url, 'search', $(this).val() )
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

 