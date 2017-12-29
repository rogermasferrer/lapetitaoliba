@extends('layouts.blank')

@section('container')
    <div class="row">
        @foreach ($allPosts as $post)
            <div class="col-sm-1">
                {{ $post->id }}
            </div>
            <div class="col-sm-3">
                {{ $post->title }}
            </div>
            <div class="col-sm-6">
                {{ $post->body }}
            </div>
            <div class="col-sm-1">
                {{ Form::open(['action' => ['BlogController@edit', $post->id], 'method' => 'get']) }}
                    {{ Form::submit('Edit') }}
                {{ Form::close() }}
	    </div>
            <div class="col-sm-1">
                {{ Form::open(['action' => ['BlogController@delete', $post->id]]) }}
                    {{ Form::submit('Delete') }}
                {{ Form::close() }}
            </div>
        @endforeach
    </div>
@endsection

