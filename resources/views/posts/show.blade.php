@extends('layouts.app')

@section('title', '| Edit Role')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-key'></i> Edit Post: {{$post->title}}</h1>
    <hr>

    <div class="form-group">
        {{ Form::label('name', 'title') }}
        {{ Form::text('title', $post->title, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'body') }}
        {{ Form::text('body', $post->body, array('class' => 'form-control')) }}
    </div>


    <br>
    <a href="{{ URL::to('posts') }}" class="btn btn-success">Go Posts</a>

</div>

@endsection
