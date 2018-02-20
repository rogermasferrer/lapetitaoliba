@extends('container')

@section('title', ucfirst(__('view product')))

@section('content')
	@include('notifications')
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					@if (isset($image))
						<div class="col-md-5">
							{{ HTML::image($image->path, $image->name, ['class' => 'img-thumbnail']) }}	
						</div>
					@endif
					<div class="col-md-7">
				    	<h3> {{ $product->name }} </h3>
				        {!! $product->description !!}
						<p>{{ ucfirst(__('preu')) }}: {{ $product->price }} &euro;</p>
							@auth
								{{ Form::open(['action' => ['OrderController@send', $product->id], 'class' => 'form-horizontal']) }}
									<div class="form-group">
										<div class="col-md-2">
						                    {{ Form::number('units', 1, ['class' => 'form-control']) }}
										</div>
										<div class="col-md-1 control-label">
											{{ __('units') }}
										</div>
									</div>
									<div class="form-group col-md-2 col-md-offset-1">
										{{ Form::submit(ucfirst(__('add to cart')), ['class' => 'btn btn-primary']) }}
									</div>
								{{ Form::close() }}
							@endauth
							@guest
								{{ HTML::link(route('login'), ucfirst(__('login'))) }} {{ __('or') }} 
								{{ HTML::link(route('register'), ucfirst(__('register'))) }} {{ __('to order') }}
							@endguest
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection

