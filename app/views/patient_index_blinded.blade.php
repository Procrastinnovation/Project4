@extends('_master')

@section('title')
	Patients
@stop

@section('content')

	<h1>Patient</h1>

	<div>
		View as:
		<a href='/enroll/?format=json' target='_blank'>JSON</a> |
		<a href='/enroll/?format=pdf' target='_blank'>PDF</a>
	</div>


	@if($query)
		<h2>You've searched for {{{ $query }}}</h2>
		<p>This user is not a Study Coordinator. No drug information will be available or to edit.<br> If you wish to update any information, please contact your study Coordinator.</p>
	@endif

	@if(sizeof($patients) == 0)
		No results found!
		<br>
		{{ link_to(URL::previous(), 'Back', ['class' => 'btn btn-default']) }}
	@else
	<!--<?php print_r($patients) ?>-->
	
		@foreach($patients as $patient)
			<section class='patient'>
			
				<h2>{{ $patient['name'] }}</h2>

				<img src='{{ $patient['photo'] }}'>
				<br>

				<p>
					Patient Name: {{$patient['name']}}
				</p>

				<p>
					Patient Age: {{$patient['age']}} years old
				</p>

				<p>
					Patient's Weight: {{$patient['weight']}}
				</p>
				<p>
					----------------------------------------
				</p>
				
			</section>
		@endforeach

	@endif

@stop







