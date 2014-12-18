@extends('_master')

@section('title')
	Welcome to DWA Clinical Trials
@stop

@section('head')

@stop
@if(Auth::check())
	@section('content')

		{{ Form::open(array('url' => '/enroll', 'method' => 'GET')) }}

			{{ Form::label('query','Search Patient') }}

			{{ Form::text('query'); }}

			{{ Form::submit('Search'); }}

		{{ Form::close() }}

	

	@stop
@endif