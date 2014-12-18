@extends('_master')

@section('title')
	Log into study
@stop

@section('content')

<h1>Log into the study</h1>

{{ Form::open(array('url' => '/login')) }}

    {{ Form::label('email') }}
    {{ Form::text('email','test@hotmail.com') }}

    {{ Form::label('password') }} (6 digits min)
    {{ Form::password('password') }}

    {{ Form::submit('Submit') }}

{{ Form::close() }}

@stop