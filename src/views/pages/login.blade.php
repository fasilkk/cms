@extends('cms::templates.default')

@section('layout')

	<div id="login" class="wrapper">

		<div class="row">
			<div id="login-panel" class="col-xs-12 col-sm-12 col-md-9 col-lg-7">

				<h1>Pongo<span>CMS</span> <small>v2</small></h1>

				{{Form::open(array('route' => 'post.login', 'id' => 'login-form', 'class' => 'form-inline'))}}
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" name="username" autocorrect="off" autocapitalize="off" placeholder="Enter your username">
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter your password">
					</div>
					<button type="submit" class="btn btn-primary btn-block">login</button>
				{{Form::close()}}

			</div>
		</div>

	</div>

@stop