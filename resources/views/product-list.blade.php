@extends('container')

@section('content')
	@include('notifications')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-12">{{ ucfirst(__('manage products')) }} | {{ HTML::link(route('product.add'), ucfirst(__('add new product'))) }}</div>
					</div>
				</div>
				<div class="panel-body">
					<div class="row">
			    	    @foreach ($allProducts as $product)
			        	    <div class="col-sm-1">
			            	    {{ $product->id }}
				            </div>
				            <div class="col-sm-3">
				                {{ $product->name }}
				            </div>
			    	        <div class="col-sm-5">
				    	        @php 
									if (strlen(strip_tags($product->description)) > 130) {
				            	    	$product->description = substr($product->description, 0, 130);
					            	    $product->description .= '...';
						            }
								@endphp
      			        	        {{ strip_tags($product->description) }}
				            </div>
							<div class="col-sm-1">
			        	        {{ Form::open(['action' => ['ProductController@view', $product->id], 'method' => 'get']) }}
			            	        {{ Form::submit(ucfirst(__('view')), ['class' => 'btn btn-default btn-xs']) }}
			                	{{ Form::close() }}
							</div>
				            <div class="col-sm-1">
				                {{ Form::open(['action' => ['ProductController@edit', $product->id], 'method' => 'get']) }}
				                    {{ Form::submit(ucfirst(__('edit')), ['class' => 'btn btn-primary btn-xs']) }}
			    	            {{ Form::close() }}
						    </div>
			            	<div class="col-sm-1">
				                {{ Form::open(['action' => ['ProductController@delete', $product->id]]) }}
				                    {{ Form::submit(ucfirst(__('delete')), ['class' => 'btn btn-danger btn-xs']) }}
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

