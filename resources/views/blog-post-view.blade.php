@extends('container')

@section('title', 'View blog post');

@section('content')
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				Post id: {{ $post->id }}
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-12">
					    	<h3> {{ $post->title }} </h3>
						</div>
						<div class="col-md-12">
	                        <p class="small">
    	                        Created: {{ $post->created_at }}<br />
        	                    Updated: {{ $post->updated_at }}
            	            </p>
						</div>
						@if (isset($image))
							<div class="col-md-12">
								{{ HTML::image($image->path, $image->name, ['class' => 'img-thumbnail']) }}	
							</div>
						@endif
						<div class="col-md-12">
					        {!! html_entity_decode($post->body) !!}
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection


