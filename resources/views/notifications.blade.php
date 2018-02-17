<div id="notifications">
	@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ ucfirst(__($error)) }}</li>
				@endforeach
			</ul>
		</div>
	@elseif (Session::has('success'))
		<div class="alert alert-success">
			{{ ucfirst(__(Session::get('success'))) }}
		</div>
	@endif
</div>

