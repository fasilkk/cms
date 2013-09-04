@extends('cms::layouts.page')

@section('header')
	@parent
	{{link_to_route('logout', 'Logout')}}
@stop

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

	{{ROLENAME}}
	{{LEVEL}}

@stop