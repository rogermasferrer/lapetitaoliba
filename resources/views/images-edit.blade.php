@extends('container')

@section('title', 'Edit image');

@section('content')
    @include('notifications')
	<div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
				<div class="panel-heading">Edit image</div>
				<div class="panel-body">
					{{ Form::open(['action' => ['ImagesController@update', $image->id], 'files' => true, 'class' => 'form-horizontal']) }}
        	        <div class="form-group">
	                    {{ Form::label('id', 'Id', ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
	    	                {{ $image->id }}
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('file', 'Image file', ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
							{{ Form::file('file', ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="form-group">
                    	<div class="col-md-2 col-md-offset-2">
	                    	{{ HTML::image($image->path, $image->name, ['class' => 'img-thumbnail']) }}
						</div>
                    </div>
        	        <div class="form-group">
	                    {{ Form::label('name', 'Name', ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
	    	                {{ Form::text('name', $image->name, ['class' => 'form-control']) }}
						</div>
					</div>
                    <div class="form-group">
   	                	{{ Form::label('comment', 'Comment', ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
	        	            {{ Form::textarea('comment', $image->comment, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-6 col-md-offset-2">
                		{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
						{{ HTML::link(URL::previous(), 'Cancel') }}
					</div>
    	        {{ Form::close() }}
			</div>
        </div>
    </div>
@endsection

