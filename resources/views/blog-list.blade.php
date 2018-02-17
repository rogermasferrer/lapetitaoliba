@extends('container')

@section('content')
	@include('notifications')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-12">{{ ucfirst(__('manage posts')) }} | {{ HTML::link(route('blogpost.add'), ucfirst(__('add new post'))) }}</div>
				</div>
			</div>
			<div class="panel-body">
				<div class="row">
			        @foreach ($allPosts as $post)
			            <div class="col-sm-1">
			                {{ $post->id }}
			            </div>
			            <div class="col-sm-3">
			                {{ $post->title }}
			            </div>
			            <div class="col-sm-5">
				            @php 
								if (strlen(strip_tags($post->body)) > 130) {
				                	$post->body = substr($post->body, 0, 130);
					                $post->body.= '...';
					            }
							@endphp
      		        	        {{ strip_tags($post->body) }}
			            </div>
						<div class="col-sm-1">
			                {{ Form::open(['action' => ['BlogController@view', $post->id], 'method' => 'get']) }}
			                    {{ Form::submit(ucfirst(__('view')), ['class' => 'btn btn-default btn-xs']) }}
			                {{ Form::close() }}
						</div>
			            <div class="col-sm-1">
			                {{ Form::open(['action' => ['BlogController@edit', $post->id], 'method' => 'get']) }}
			                    {{ Form::submit(ucfirst(__('edit')), ['class' => 'btn btn-primary btn-xs']) }}
			                {{ Form::close() }}
					    </div>
			            <div class="col-sm-1">
			                {{ Form::open(['action' => ['BlogController@delete', $post->id]]) }}
			                    {{ Form::submit(ucfirst(__('delete')), ['class' => 'btn btn-danger btn-xs']) }}
			                {{ Form::close() }}
			            </div>
						<div class="clearfix"></div>
			        @endforeach
			    </div>
			</div>
		</div>
	</div>
@endsection

