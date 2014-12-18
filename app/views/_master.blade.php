<!DOCTYPE html>
<html>
<head>

	<title>@yield('title','P4 Clinical Trial')</title>
	<meta charset='utf-8'>

	<link href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/flatly/bootstrap.min.css" rel="stylesheet">
	<link rel='stylesheet' href='/css/clinicaltrial.css' type='text/css'>

	@yield('head')


</head>
<body>
<h1>Welcome to DWA Clinical Trial!</h1>
	@if(Session::get('flash_message'))
		<div class='flash-message'>{{ Session::get('flash_message') }}</div>
	@endif

	<a href='/'><img class='logo' src='/images/clinical-trial.jpg' alt='clinical-trial logo'></a>

  <nav>
		<ul>
		@if(Auth::check())
			<li><a href='/logout'>Log out {{ Auth::user()->email; }}</a></li>
      <li><a href='/'>Main</a></li>
			<li><a href='/enroll/create'>Enroll a Patient</a></li>
    	<li><a href='/debug/routes'>Routes</a></li>
		@else
      <p>Please log in as a Study Coordinator to register a Patient.</p>
          <li><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></li>
		@endif
		</ul>
	</nav>

	<a href='/'>View on Github</a>

    @yield('content')
 
  @yield('/body')

</body>
</html>





