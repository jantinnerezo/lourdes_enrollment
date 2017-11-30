<div class="ui positive message">
  <div class="header">
    <strong>{{session('name')}}</strong>
  </div>
  <p>{{session('course')}} {{session('type_long')}}</p>
</div>

<ul class="collection with-header">
     <a href="{{url('account/registrar')}}/students" class="collection-item"><i class="fa fa-users" aria-hidden="true"></i> Students</a>
     <a href="{{url('account/registrar')}}/subjects" class="collection-item"><i class="fa fa-book" aria-hidden="true"></i> Subjects </a>
	   <a href="{{url('account/registrar')}}/schedules?semester={{$semester->semester}}&school_year={{$school_year}}" class="collection-item"><i class="fa fa-calendar" aria-hidden="true"></i> Schedules </a>
    <a href="{{url('account/registrar')}}/faculties" class="collection-item"><i class="fa fa-users" aria-hidden="true"></i> Faculty </a>
    <a href="{{url('account/registrar/users')}}" class="collection-item"><i class="fa fa-users" aria-hidden="true"></i> Users </a>
    <a href="#changeSemester" class="collection-item modal-trigger"><span class="fa fa-flag"></span> Change semester </a>
</ul>

  <!-- View unverified student information -->
 <div id="changeSemester" class="modal">
 {!! Form::open(['action' => 'AdminController@update_semester', 'method' => 'POST']) !!}
    <div class="modal-content">
      <h5 class="center"><span class="fa fa-flag"></span> Change Semester</h5>
      <br>
     
      <div class="row">

         <div class="col s4">
              
            </div>
            <div class="col s4">
              <label for="sem">Semester</label>
               <select name="sem" id="sem" required>
                  <option value="1">First semester</option>
                  <option value="2">Second semester</option>
                  <option value="3">Summer</option>
                </select>
            </div>

              <div class="col s4">
              
            </div>

        </div>


    </div>
    <div class="modal-footer">
       <button type="submit" class="modal-action modal-close waves-effect waves-green btn green">Change </button>
        <a href="#!" class="modal-action modal-close waves-effect waves-green btn red ">Close</a>
    </div>

    {!! Form::close() !!}
 </div>


<script>
    $(document).ready(function () {

       $('.modal').modal();
        var url = window.location;
        $('collection a[href="'+ url +'"]').parent().addClass('active');
        $('collection a').filter(function() {
             return this.href == url;
        }).parent().addClass('active');
    });
</script> 