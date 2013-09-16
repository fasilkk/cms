<div class="option-bar">
				
	<div class="option-body">
		
		<header>
			
			<h2>{{t('heading.option.bar_title')}}</h2>

		</header>
		
		<ul class="options list-unstyled">
			<li class="active">
				<a href="{{route('page.settings', array('id' => $id))}}">Settings</a>
			</li>
			<li>
				<a href="{{route('page.layout', array('id' => $id))}}">Layout</a>
			</li>
			<li>
				<a href="{{route('page.seo', array('id' => $id))}}">Seo</a>
			</li>
			<li>
				<a href="{{route('page.media', array('id' => $id))}}">Media</a>
			</li>
			<li>
				<a href="{{route('page.link', array('id' => $id))}}">Linked pages</a>
			</li>
		</ul>

	</div>

</div>