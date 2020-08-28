@extends('layouts.app')

@section('title', '| Edit Role')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>
    <h1><i class='fa fa-key'></i> Edit Post: {{$post->title}}</h1>
    <hr>

    {{ Form::model($post, array('route' => array('posts.update', $post->id), 'method' => 'PUT')) }}

    <div class="form-group">
        {{ Form::label('name', 'title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'body') }}
        {{ Form::text('body', null, array('class' => 'form-control')) }}
    </div>


    <br>
    {{ Form::submit('Edit', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}
</div>

@endsection
