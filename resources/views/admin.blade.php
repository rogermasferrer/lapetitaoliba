@extends('container')

@section('title', 'Website management')

@section('content')
    <div class="row">
		<div class="panel panel-default">
			<div class="panel-beading">
				<div class="col-md-12">
					<h2>Website management</h2>
				</div>
			</div>
			<div class="panel-body">
				<div class="col-md-10 col-md-offset-1">
    	        	<h3>Blog</h3>
					<div class="col-md-12 col-offset-1">
						<ul class="list-inline">
							<li>{{ HTML::link(route('blogpost.add'), 'Add new post', ['class' => 'p-25']) }}</li>
							<li>{{ HTML::link(route('blog.list'), 'Manage posts', ['class' => 'p-25']) }}</li>
						</ul>
					</div>
				</div>
				<div class="col-md-10 col-md-offset-1">
    	        	<h3>Images</h3>
					<div class="col-md-12 col-offset-1">
						<ul class="list-inline">
							<li>{{ HTML::link(route('images.add'), 'Add new image', ['class' => 'p-25']) }}</li>
							<li>{{ HTML::link(route('images.list'), 'Manage images', ['class' => 'p-25']) }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

