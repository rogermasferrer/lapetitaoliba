@extends('container')

@section('content')
    <div id="notifications">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
               </ul>
           </div>
        @elseif (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
    </div>
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12">Manage posts | {{ HTML::link(route('blogpost.add'), 'Add new post') }}</div>
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
				                    {{ Form::submit('View', ['class' => 'btn btn-default btn-xs']) }}
				                {{ Form::close() }}
							</div>
				            <div class="col-sm-1">
				                {{ Form::open(['action' => ['BlogController@edit', $post->id], 'method' => 'get']) }}
				                    {{ Form::submit('Edit', ['class' => 'btn btn-primary btn-xs']) }}
				                {{ Form::close() }}
						    </div>
				            <div class="col-sm-1">
				                {{ Form::open(['action' => ['BlogController@delete', $post->id]]) }}
				                    {{ Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) }}
				                {{ Form::close() }}
				            </div>
							<div class="clearfix"></div>
				        @endforeach
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

