@extends('container')

@section('title', 'Add blog post');

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
        <div class="col-xs-12">
            <div class="panel panel-default">
				<div class="panel-heading">{{ ucfirst(__('add blog post')) }}</div>
				<div class="panel-body">
					{{ Form::open(['action' => 'BlogController@create', 'files' => true, 'class' => 'form-horizontal']) }}
        	        <div class="form-group">
		                {{ Form::label('title', ucfirst(__('title')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
	    	                {{ Form::text('title', null, ['class' => 'form-control']) }}
						</div>
					</div>
                    <div class="form-group">
    	               	{{ Form::label('body', ucfirst(__('body')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-8">
	        	            {{ Form::textarea('body', null, ['id' => 'textarea', 'class' => 'form-control']) }}
							<script>
								CKEDITOR.replace('textarea');
							</script>
						</div>
					</div>
					<div class="form-group">
						{{ Form::label('image', ucfirst(__('image')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-1">
							{{ Form::number('image', null, ['class' => 'form-control']) }}
						</div>
					</div>
                    <div class="form-group">
    	                {{ Form::label('published', ucfirst(__('published')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-2">
		                    {{ Form::checkbox('published', 1) }}
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

