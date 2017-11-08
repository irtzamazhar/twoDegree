

@if(session('success'))
<div class="alert alert-success my-message">
		{{session('success')}}
	</div>
@endif
@if(session('danger'))
<div class="alert alert-danger my-message">
		{{session('danger')}}
	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger">
		{{session('error')}}
	</div>
@endif