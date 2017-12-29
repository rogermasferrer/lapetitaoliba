@extends('layouts.blank')

@section('title', 'Add blog post');

@section('container')
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
            {{ Form::open(['action' => 'BlogController@create']) }}
                <div>
                    {{ Form::label('title_lbl', 'Title') }}
                    {{ Form::text('title', null) }}
                </div>
                <div>
                    {{ Form::label('body_lbl', 'Body') }}
                    {{ Form::textarea('body', null) }}
                </div>
                <div>
                    {{ Form::checkbox('published', 1) }}
                    {{ Form::label('published_lbl', 'Published') }}
               </div>
               <div>
                   {{ Form::submit('Save') }}
               </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection

