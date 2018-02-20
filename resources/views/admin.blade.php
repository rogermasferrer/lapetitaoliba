@extends('container')

@section('title', 'Website management')

@section('content')
	<div class="panel panel-default">
		<div class="panel-beading">
			<div class="col-md-12">
				<h2>{{ ucfirst(__('website management')) }}</h2>
			</div>
		</div>
		@foreach ($menus as $title => $options)
			<div class="panel-body">
				<div class="col-md-10 col-md-offset-1">
   	    	    	<h3>{{ ucfirst(__($title)) }}</h3>
					<div class="col-md-12 col-offset-1">
						<ul class="list-inline">
							@foreach ($options as $name => $route) 
								<li>{{ HTML::link($route, ucfirst(__($name)), ['class' => 'p-25']) }}</li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
		@endforeach
	</div>
@endsection

