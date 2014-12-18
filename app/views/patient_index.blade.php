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

				<p>
					<a href='/enroll/edit/{{$patient['id']}}'>Edit</a>
				</p>

				<img src='{{ $patient['photo'] }}'>
				<br>

				<p>
					Patient Name: {{$patient['name']}}
				</p>

				<p>
					Patient Age: {{$patient['age']}} years old
				</p>

				<p>
					<b>{{ $patient['drug']['drug_NM'] }}  {{ $patient['dose']}}</b>
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







