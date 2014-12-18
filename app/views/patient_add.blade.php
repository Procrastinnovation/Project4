@extends('_master')

@section('title')
	Enroll a new patient
@stop

@section('content')

	<h1>Enroll a new patient</h1>

	{{ Form::open(array('url' => '/enroll/create')) }}
	<!--{{ Form::open(array('url' => '/patient', 'method' => 'GET')) }} -->

		{{ Form::label('name','Please enter patient\'s name') }}

		{{ Form::text('name'); }}

		{{ Form::label('age','Please enter patient\'s age') }}

		{{ Form::text('age'); }}

		{{ Form::label('weight','Please enter patient\'s weight') }}

		{{ Form::text('weight'); }}

		{{ Form::label('gender','Please select patient\'s gender') }}

		{{ Form::label('gender','Male') }}
		{{ Form::radio('gender', 'M', (Input::old('gender') == 'M'), array('id'=>'male', 'class'=>'radio')) }} 
		{{ Form::label('gender','Female') }}
		{{ Form::radio('gender', 'F', (Input::old('gender') == 'F'), array('id'=>'female', 'class'=>'radio')) }} 
		 
		 
		{{ Form::label('reason','Please describe visit reason.') }}

		{{ Form::textarea('visit_reason'); }}


	<!--
    	{{ Form::label('drug_id', 'Drug') }}
		{{ Form::select('drug_id', $drug); }}
-->
		{{ Form::submit('Add'); }}

		
	{{ Form::close() }}

@stop
