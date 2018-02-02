@extends('container')

@section('content')
    <div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12">{{ ucfirst(__('manage images')) }} |	{{ HTML::link(route('images.add'), ucfirst(__('add new image'))) }}</div>
					</div>
				<div class="panel-body">
					<div class="row">
				        @foreach ($allImages as $image)
    	        			<div class="col-md-4">
								<div class="row">
									{{ HTML::image($image->path, $image->path, ['class' => 'img-thumbnail']) }}
								</div>
								<div class="row">
									<div class="col-md-9">
										<strong>{{ ucfirst(__('name')) }}:</strong> {{ $image->name }}
									</div>
									<div class="col-md-3 text-right">
										<strong>{{ ucfirst(__('id')) }}:</strong> {{ $image->id }}
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<strong>{{ ucfirst(__('comment')) }}:</strong> {{ $image->comment }}
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<strong>{{ ucfirst(__('path')) }}:</strong> {{ $image->path }}
									</div>
								</div>
								<div class="row">	
						            <div class="col-md-3">
						                {{ Form::open(['action' => ['ImagesController@edit', $image->id], 'method' => 'get']) }}
						                    {{ Form::submit(ucfirst(__('edit')), ['class' => 'btn btn-primary']) }}
						                {{ Form::close() }}
						            </div>
						            <div class="col-md-3">
						                {{ Form::open(['action' => ['ImagesController@delete', $image->id]]) }}
						                    {{ Form::submit(ucfirst(__('delete')), ['class' => 'btn btn-danger']) }}
						                {{ Form::close() }}
						            </div>
								</div>
            				</div>
				        @endforeach
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection

