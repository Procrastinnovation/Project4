@extends('_master')

@section('title')
	Log in
@stop

@section('content')
<h1>Sign up</h1>

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/signup')) }}

    {{ Form::label('email') }}
    {{ Form::text('email') }}

    {{ Form::label('password') }}
    {{ Form::password('password') }}
    <small>Min 6 characters</small>
	<br>
	<strong>Will this be a Study Coordinator?</strong>
		{{ Form::label('study_role','Yes') }}
		{{ Form::radio('study_role', '1', (Input::old('study_role') == '0'), array('id'=>'yes', 'class'=>'radio')) }} 
		{{ Form::label('study_role','No') }}
		{{ Form::radio('study_role', '0', (Input::old('study_role') == '1'), array('id'=>'no', 'class'=>'radio')) }} 

    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop