@extends('container')

@section('content')
	</script>
	<div class="panel panel-default">
		<div class="panel-beading">
			<div class="col-md-12">
				<h2>{{ ucfirst(__('product catalog')) }}</h2>
			</div>
		</div>
		<div class="panel-body">
	        @foreach ($allProducts as $product)
				@if ($product->published == 1)
	        	    <div class="col-md-2">
						@if (isset($product->image))
							{{ HTML::image($product->image->path, $product->image->name, ['class' => 'img-thumbnail']) }}
						@endif
   		        	    <p>
							{{ HTML::link("product/$product->id", $product->name) }}<br />
							{{ $product->price }} &euro;
						</p>
   	    	    	</div>
				@endif
        	@endforeach
		</div>
	</div>
@endsection

