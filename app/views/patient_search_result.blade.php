<section>
	<img class='photo' src='{{ $patient['photo'] }}'>

	<h2>{{ $patient['name'] }}</h2>

	<p>
	{{ $patient['drug']->drug_NM }} {{ $patient['name'] }}
	</p>


	<a href='{{ $patient['photo'] }}'>Patient photo...</a>
	<br>
	<a href='/enroll/edit/{{ $patient->id }}'>Edit</a>
</section>