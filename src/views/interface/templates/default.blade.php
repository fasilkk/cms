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
	
	{{Pongo::asset('styles/main.css')}}
	{{Pongo::styles('header')}}

	{{Pongo::asset('scripts/vendor/modernizer.js')}}
	{{Pongo::scripts('header')}}

</head>
<body>

	<div class="container">

		@section('header')

		@show
		
		@yield('layout')

		@section('footer')

		@show
		
	</div>

	{{Pongo::asset('scripts/main.js')}}
	{{Pongo::asset('scripts/vendor/bootstrap.js')}}
	{{Pongo::scripts('footer')}}

</body>
</html>