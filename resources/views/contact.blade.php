@extends('container')

@section('title', ucfirst(__('contact us')));

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
                {{ ucfirst(__(Session::get('success'))) }}
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
				<div class="panel-heading">{{ ucfirst(__('contact us')) }}</div>
				<div class="panel-body">
					{{ Form::open(['action' => 'ContactEmailController@send', 'files' => true, 'class' => 'form-horizontal']) }}
        	        <div class="form-group">
		                {{ Form::label('from', ucfirst(__('your email')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
							@auth
	    	                	{{ Form::text('from', Auth::user()->email, ['class' => 'form-control']) }}
							@endauth
							@guest
	    	                	{{ Form::text('from', null, ['class' => 'form-control']) }}
							@endguest
						</div>
					</div>
        	        <div class="form-group">
		                {{ Form::label('name', ucfirst(__('your name')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
							@auth
	    	                	{{ Form::text('name', Auth::user()->name, ['class' => 'form-control']) }}
							@endauth
							@guest
	    	                	{{ Form::text('name', null, ['class' => 'form-control']) }}
							@endguest
						</div>
					</div>
        	        <div class="form-group">
		                {{ Form::label('subject', ucfirst(__('subject')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-6">
	    	               	{{ Form::text('subject', null, ['class' => 'form-control']) }}
						</div>
					</div>
                    <div class="form-group">
    	               	{{ Form::label('message', ucfirst(__('message')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-8">
	        	            {{ Form::textarea('message', null, ['id' => 'textarea', 'class' => 'form-control']) }}
							<script>
								CKEDITOR.replace('textarea');
							</script>
						</div>
					</div>
<!--					<div class="form-group">
						{{ Form::label('attachment', ucfirst(__('attachment')), ['class' => 'col-md-2 control-label']) }}
						<div class="col-md-1">
							{{ Form::file('attachment', null, ['class' => 'form-control']) }}
						</div>
					</div>-->
					<div class="col-md-6 col-md-offset-2">
	                	{{ Form::submit(ucfirst(__('send')), ['class' => 'btn btn-primary']) }}
						{{ HTML::link(URL::previous(), ucfirst(__('cancel'))) }}
					</div>
    	        {{ Form::close() }}
			</div>
        </div>
    </div>
@endsection

