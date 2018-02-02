@extends('container')

@section('title', 'Add image');

@section('content')
    @include('notifications')
	<div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
				<div class="panel-heading">{{ ucfirst(__('add new image')) }}</div>
				<div class="panel-body">
					{{ Form::open(['action' => 'ImagesController@create', 'files' => true, 'class' => 'form-horizontal']) }}
                    <div class="form-group">
                        {{ Form::label('image', ucfirst(__('image file')), ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-6">
							{{ Form::file('image', ['class' => 'form-control']) }}
						</div>
					</div>
        	        <div class="form-group">
		                {{ Form::label('name', ucfirst(__('name')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
	    	                {{ Form::text('name', null, ['class' => 'form-control']) }}
						</div>
					</div>
                    <div class="form-group">
    	               	{{ Form::label('comment', ucfirst(__('comment')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
	        	            {{ Form::textarea('comment', null, ['class' => 'form-control']) }}
						</div>
					</div>
					<div class="col-md-6 col-md-offset-2">
                		{{ Form::submit(ucfirst(__('save')), ['class' => 'btn btn-primary']) }}
						{{ HTML::link(URL::previous(), ucfirst(__('cancel'))) }}
					</div>
    	        {{ Form::close() }}
			</div>
        </div>
    </div>
@endsection

