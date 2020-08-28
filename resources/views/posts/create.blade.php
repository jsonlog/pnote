@extends('layouts.app')

@section('title', '| Add Role')

@section('content')

<div class='col-lg-4 col-lg-offset-4'>

    <h1><i class='fa fa-key'></i> Add Post</h1>
    <hr>

    {{ Form::open(array('url' => 'posts')) }}

    <div class="form-group">
        {{ Form::label('name', 'title') }}
        {{ Form::text('title', null, array('class' => 'form-control')) }}
    </div>
    <div class="form-group">
        {{ Form::label('name', 'body') }}
        {{ Form::text('body', null, array('class' => 'form-control')) }}
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>

@endsection
