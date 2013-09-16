<div class="row">
	<nav class="navbar navbar-inverse" role="navigation">
		<button type="button" class="toggle page-toggle">
			<i class="icon-file-text"></i>
		</button>
		<button type="button" class="toggle menu-toggle" data-toggle="collapse" data-target=".menu-collapse">
			<i class="icon-reorder"></i>
		</button>
		<div class="navbar-header">
			<a class="navbar-brand" href="{{route('dashboard')}}">Pongo<span>CMS</span> <small>v2</small></a>	
		</div>

		<div class="collapse navbar-collapse menu-collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Link</a></li>
				<li><a href="#">Link</a></li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><a href="#">Action</a></li>
						<li><a href="#">Another action</a></li>
						<li><a href="#">Something else here</a></li>
						<li><a href="#">Separated link</a></li>
						<li><a href="#">One more separated link</a></li>
					</ul>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-user"></i>
						admin <b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li>{{link_to_route('logout', 'Logout')}}</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</div>