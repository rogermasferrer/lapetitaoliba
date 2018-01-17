@extends('container')

@section('content')
    <div class="row">
		<div class="panel panel-default">
			<div class="panel-beading">
				<div class="col-md-12">
					<h2>Blog</h2>
				</div>
			</div>
			<div class="panel-body">
		        @foreach ($allPosts as $post)
					@if ($post->published == 1)
						@php $readMore = false @endphp
		        	    <div class="col-md-10 col-md-offset-1">
    		        	    <h3>{{ $post->title }}</h3>
							<p class="small">
								Created: {{ $post->created_at }}<br />
								Updated: {{ $post->updated_at }}
							</p>
							@if (isset($post->image))
								{{ HTML::image($post->image->path, $post->image->name, ['class' => 'img-thumbnail']) }}
							@endif
				            @php
								if (strlen(strip_tags($post->body)) > 150) {
									$readMore = true;
	                				$post->body = substr($post->body, 0, 150);
					                $post->body.= '... ';
					            }
							@endphp
    		   	    	    {!! html_entity_decode($post->body) !!}
							@if ($readMore === true)
								{{ HTML::link(route('blog.view', ['id' => $post->id]), 'Read more') }}
							@endif
	    	    	        <hr>
    	    	    	</div>
					@endif
	        	@endforeach
			</div>
		</div>
	</div>
@endsection

