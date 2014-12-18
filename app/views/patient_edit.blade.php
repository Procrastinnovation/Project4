@extends('_master')

@section('title')
	Edit
@stop

@section('head')

@stop

@section('content')

	<h1>Edit</h1>
	<h2>{{{ $patient['name'] }}}</h2>

	{{---- EDIT -----}}
	{{ Form::open(array('url' => '/enroll/edit')) }}

		{{ Form::hidden('id',$patient['id']); }}

		<div class='form-group'>
			{{ Form::label('name','Name') }}
			{{ Form::text('name',$patient['name']); }}
		</div>

		<div class='form-group'>
			{{ Form::label('age','Age') }}
			{{ Form::text('age',$patient['age']); }}
		</div>
		<!--{{ print_r($patient) }} -->

		<div class='form-group'>
			{{ Form::label('drug_id','Drug dose') }}

		 {{ Form::select('drug_id', array(
		'Dose' => array('drug_id' => '','','1','2','3','4','5','6'),)) }}

			<!--{{ Form::text('drug_id',$patient['drug_id']); }}
			<small>Please enter 1 to 6</small>-->
		</div>

		<!--{{ print_r($doses) }}-->
	
		{{ Form::submit('Save'); }}

	{{ Form::close() }}

	<div>
		{{---- DELETE -----}}
		{{ Form::open(array('url' => '/enroll/delete')) }}
			{{ Form::hidden('id',$patient['id']); }}
			<button onClick='parentNode.submit();return false;'>Delete</button>
		{{ Form::close() }}
	</div>

	<div>
		{{---- Cancel -----}}
		{{ link_to(URL::previous(), 'Cancel', ['class' => 'btn btn-default']) }}
	</div>
@stop