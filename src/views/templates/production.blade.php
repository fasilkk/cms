<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{$title}}</title>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="" />
	<meta name="description" content="">	
	<meta name="keywords" content="" />
	<meta name="generator" content="" />
	<meta name="robots" content="index,follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="shortcut icon" href="favicon.ico" />
	
	{{Render::asset('styles/main.css')}}
	{{Render::styles('header')}}

	{{Render::asset('scripts/vendor/modernizer.js')}}
	{{Render::scripts('header')}}

</head>
<body>

	<div class="wrapper">

		@section('header')

		@show
		
		@yield('layout')

		@section('footer')			
			<footer>PongoCMS v2.0.0 &copy; Pongoweb.it</footer>
		@show
		
	</div>

	<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
	<script>
		(function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
		function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
		e=o.createElement(i);r=o.getElementsByTagName(i)[0];
		e.src='//www.google-analytics.com/analytics.js';
		r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
		ga('create','UA-XXXXX-X');ga('send','pageview');
	</script>

	{{Render::asset('scripts/main.js')}}
	{{Render::asset('scripts/plugins.js')}}
	{{Render::asset('scripts/vendor/bootstrap.js')}}
	{{Render::scripts('footer')}}

</body>
</html>