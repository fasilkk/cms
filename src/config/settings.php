<?php

return array(

	/**
	 * Custom Service Providers
	 *
	 * Loaded on boot by PongoServiceProvider -> loadServiceProviders()
	 */

	'providers' => array(

		'MarkerServiceProvider',
		'ToolServiceProvider',

	),

	/**
	 * Custom Facades
	 *
	 * Loaded on boot by PongoServiceProvider -> activateFacades()
	 */

	'facades' => array(

		'Marker' => array(

			'class' => 'Pongo\Cms\Classes\Marker',
			'alias' => 'Pongo\Cms\Support\Facades\Marker'

		),

		'Tool' => array(

			'class' => 'Pongo\Cms\Classes\Tool',
			'alias' => 'Pongo\Cms\Support\Facades\Tool'

		),

	),

);