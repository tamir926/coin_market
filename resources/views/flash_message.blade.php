@if(Session::has("success"))
	<div class="alert alert-success alert-dismissible fade show mb-5" role="alert">
		{{ Session::get("success") }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if(Session::has("error"))
	<div class="alert alert-danger alert-dismissible fade show mb-5" role="alert">
		{{ Session::get("error") }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">&times;</span>
		</button>
	</div>
@endif

@if (count($errors) > 0)
 	<div class="alert alert-danger">
      	<ul>
      	@foreach ($errors->all() as $error)
          	<li>{{ $error }}</li>
      	@endforeach
      	</ul>
  	</div>
@endif
