@extends('container')

@section('title', ucfirst(__('edit product')));

@section('content')
    @include('notifications')
	<div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
				<div class="panel-heading">{{ ucfirst(__('edit product')) }}</div>
				<div class="panel-body">
					{{ Form::open(['action' => ['ProductController@update', $product->id], 'files' => true, 'class' => 'form-horizontal']) }}
					<div class="form-group">
						{{ Form::label('id_lbl', 'Id', ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
							{{ Form::label('id_value', $product->id, ['class' => 'control-label']) }}
						</div>
					</div>
        	        <div class="form-group">
		                {{ Form::label('name', ucfirst(__('name')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
	    	                {{ Form::text('name', $product->name, ['class' => 'form-control']) }}
						</div>
					</div>
                    <div class="form-group">
    	               	{{ Form::label('description', ucfirst(__('description')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-8">
	        	            {{ Form::textarea('description', $product->description, ['id' => 'textarea','class' => 'form-control']) }}
                            <script>
                                CKEDITOR.replace('textarea');
                            </script>
						</div>
					</div>
        	        <div class="form-group">
		                {{ Form::label('price', ucfirst(__('price')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-2">
	    	                {{ Form::number('price', $product->price, ['class' => 'form-control']) }}
						</div>
						<div class="col-md-0.5">
							{{ Form::label('currency', '&euro;', ['class' => 'control-label']) }}
						</div>
					</div>
					 <div class="form-group">
                        {{ Form::label('published', ucfirst(__('published')), ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-2">
                            {{ Form::checkbox('published', 1) }}
                        </div>
                    </div>
        	        <div class="form-group">
		                {{ Form::label('image', ucfirst(__('image')), ['class' => 'col-md-2 control-label']) }}
                        <div class="col-md-1">
							@if (isset($image))
								{{ Form::number('image', $image->id, ['class' => 'form-control']) }}
							@else
								{{ Form::number('image', ['class' => 'form-control']) }}
							@endif
						</div>
						@if (isset($image))
							<div class="clearfix"></div>
							<div class="col-md-2 col-md-offset-2">
								{{ HTML::image($image->path, $image->name, ['class' => 'img-thumbnail']) }}
							</div>
						@endif
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

