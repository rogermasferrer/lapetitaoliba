@extends('container')

@section('title', 'Edit blog post');

@section('content')
    @include('notifications')
	<div class="row">
	    <div class="col-xs-12">
    	    <div class="panel panel-default">
        	    <div class="panel-heading">Edit blog post</div>
        		    <div class="panel-body">
		        	    {{ Form::open(['action' => ['BlogController@update', $post->id], 'class' => 'form-horizontal']) }}
                    	    <div class="form-group">
								{{ Form::label('id_lbl', 'Id', ['class' => 'col-md-2 control-label']) }}
       		                	<div class="col-md-6">
									{{ $post->id }}
								</div>
							</div>
	        	            <div class="form-group">
		        	            {{ Form::label('title_lbl', 'Title', ['class' => 'col-md-2 control-label']) }}
       		        	        <div class="col-md-6">
									{{ Form::text('title', $post->title, ['class' => 'form-control']) }}
				                </div>
							</div>
	    	                <div class="form-group">
            	   				{{ Form::label('body_lbl', 'Body', ['class' => 'col-md-2 control-label']) }}
       		    	            <div class="col-md-8">
	                	            {{ Form::textarea('body', $post->body, ['id' => 'textarea', 'class' => 'form-control']) }}
        	            	        <script>
   	        	            	        CKEDITOR.replace('textarea');
       	        	            	</script>
	                			</div>
							</div>
	    	                <div class="form-group">
           			            {{ Form::label('image', 'Image', ['class' => 'col-md-2 control-label']) }}
	            	            <div class="col-md-1">
									@if (isset($image))
        		        	            {{ Form::number('image', $image->id, ['class' => 'form-control']) }}
									@else
										{{ Form::number('image', ['class' => 'form-control']) }}
									@endif
    	           		        </div>
								<div class="clearfix"></div>
								@if (isset($image))
									<div class="col-md-2 col-md-offset-2">
										{{ HTML::image($image->path, $image->name, ['class' => 'img-thumbnail']) }}
									</div>
								@endif
		                    </div>
		                    <div class="form-group">
       			                <div class="col-md-2 text-right">
            	   				    {{ Form::checkbox('published', 1, $post->published) }}
	            	            </div>
       		        	        <div class="col-md-6">
			            	        {{ Form::label('published_lbl', 'Published') }}
               					</div>
							</div>
							<div class="col-md-6 col-md-offset-2">
	    	    	           	{{ Form::submit('Save', ['class' => 'btn btn-primary']) }}
								{{ HTML::link(URL::previous(), 'Cancel') }}
							</div>
						</div>
					</div>
				{{ Form::close() }}
			</div>a
		</div>
	</div>
@endsection

