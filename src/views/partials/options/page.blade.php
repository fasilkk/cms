<div class="option-bar">
				
	<div class="option-body">
		
		<header>
			
			<h2>{{t('heading.option.bar_title')}}</h2>

		</header>
		
		<ul class="options list-unstyled">
			<li{{active('settings', $section)}}>
				<a href="{{route('page.settings', array('id' => $id))}}">Settings</a>
			</li>
			<li{{active('layout', $section)}}>
				<a href="{{route('page.layout', array('id' => $id))}}">Layout</a>
			</li>
			<li{{active('seo', $section)}}>
				<a href="{{route('page.seo', array('id' => $id))}}">Seo</a>
			</li>
			<li{{active('media', $section)}}>
				<a href="{{route('page.media', array('id' => $id))}}">Media</a>
			</li>
			<li{{active('link', $section)}}>
				<a href="{{route('page.link', array('id' => $id))}}">Linked pages</a>
			</li>
		</ul>

	</div>

</div>