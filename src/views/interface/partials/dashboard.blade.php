@extends('cms::interface.layouts.page')

@section('content')

	<h1>Dashboard</h1>

	{{Tool::name()}}
	<br>
	{{Marker::name()}}
	<br>
	{{Page::name()}}
	<br>
	{{Pongo::name()}}
	<br>
	{{MARKER('[$BACK[]]')}}

	{{MARKER('[$IMAGE[{
		"name":"file.jpg",
		"w":"200",
		"h":"50"
	}]]')}}

	{{Auth::guest()}}

@stop