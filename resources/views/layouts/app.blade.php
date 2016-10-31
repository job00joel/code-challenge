
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="URL Shortener.">
	<meta name="author" content="Job Wong">

	<title>URL Shortened</title>

	<!-- Google-Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Michroma|Poiret+One" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<script type="text/javascript" src="http://www.chartjs.org/assets/Chart.js"></script>

	{!! Html::style('css/app.css') !!}
	{!! Html::style('css/styles.css') !!}

	<script type="text/javascript">
		var APP_URL = '{!! URL::to('/') !!}';
	</script>

	<script src="{{ asset('js/app.js') }}"></script>
	<script src="//cdn.jsdelivr.net/jquery.color-animation/1/mainfile"></script>

	
</head>


<body>
	<center><h1>URL SHORTENER</h1></center>
	<div class="slogan">Make it shorter!</div>
	<div class="container-fluid">
		@yield('content')
	</div>

	

	<script src="{{ asset('js/scripts.js') }}"></script>

	@yield('scripts')
</body>
</html>
