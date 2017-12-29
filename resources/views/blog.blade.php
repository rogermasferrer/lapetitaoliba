@extends('container')

@section('content')
    <div class="row">
        @foreach ($allPosts as $post)
            <div class="col-sm-10 col-offset-1">
                <h3>{{ $post->title }}</h3>
                {{ $post->body }}
                <hr>
            </div>
        @endforeach
	</div>
@endsection

