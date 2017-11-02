@if(session('success'))
     <div class="container">
        <div class="card-panel green">
			     <span class="white-text">{{session('success')}}</span>
       </div>
    </div>
@endif

@if(session('error'))
    <div class="container">
        <div class="card-panel red">
			<span class="white-text">{{session('error')}}</span>
       </div>
    </div>
@endif