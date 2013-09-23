<?php

return array(

	/**
	 * PongoCMS :: Locales
	 */
	
	'locale' => array(
		
		'en' => 'en_US',

		'it' => 'it_IT',
	),

	/**
	 * PongoCMS :: Date and time format
	 */
	
	'date_format' => 'm/d/Y',
	'time_format' => 'H:i',

	/**
	 * Default order_id
	 */
	
	'default_order' => 1000,

	/**
	 * Pongo CMS minimum role access to interface
	 */
	
	'min_access' => 'editor',

	/**
	 * Pongo CMS startup roles and levels
	 */

	'roles' => array(
		
		'admin' 	=> 50,

		'manager' 	=> 40,

		'editor' 	=> 30,

		'user' 		=> 1,

		'guest' 	=> 0,
	),

	/**
	 * PongoCMS :: Notification alert template
	 */
	
	'alert_tpl' => '<div class="alert-msg :key">:message</div>',

	/**
	 * Custom Service Providers
	 *
	 * PongoServiceProvider loaded on runtime by /app/config/app.php
	 * Loaded on boot by PongoServiceProvider -> loadServiceProviders()
	 */

	'providers' => array(

		'MarkerServiceProvider',

		// Dependency providers

		'Teepluss\Asset\AssetServiceProvider',
		'Prologue\Alerts\AlertsServiceProvider',

	),

	/**
	 * Custom Facades
	 *
	 * Loaded on boot by PongoServiceProvider -> activateFacades()
	 */

	'facades' => array(

		'Pongo' => array(

			'class' => 'Pongo\Cms\Classes\Pongo',
			'alias' => 'Pongo\Cms\Support\Facades\Pongo'

		),

		'Marker' => array(

			'class' => 'Pongo\Cms\Classes\Marker',
			'alias' => 'Pongo\Cms\Support\Facades\Marker'

		),

		'Render' => array(

			'class' => 'Pongo\Cms\Classes\Render',
			'alias' => 'Pongo\Cms\Support\Facades\Render'

		),

		'Theme' => array(

			'class' => 'Pongo\Cms\Classes\Theme',
			'alias' => 'Pongo\Cms\Support\Facades\Theme'

		),

		'Tool' => array(

			'class' => 'Pongo\Cms\Classes\Tool',
			'alias' => 'Pongo\Cms\Support\Facades\Tool'

		),

		// Dependency facades

		'Asset' => array(

			'class' => 'Teepluss\Asset\Asset',
			'alias' => 'Teepluss\Asset\Facades\Asset'

		),

		'Alert' => array(

			'class' => 'Prologue\Alerts\Alert',
			'alias' => 'Prologue\Alerts\Facades\Alert'

		),

	),

	/**
	 * IoC repository binds
	 *
	 * Loaded on boot by PongoServiceProvider -> bindRepositories()
	 */
	
	'repositories' => array(

		'user' => array(

			'method'		=> 'singleton',
			'interface' 	=> 'Pongo\Cms\Support\Repositories\UserRepositoryInterface',
			'repository' 	=> 'Pongo\Cms\Support\Repositories\UserRepositoryEloquent'

		),

		'page' => array(

			'method'		=> 'singleton',
			'interface' 	=> 'Pongo\Cms\Support\Repositories\PageRepositoryInterface',
			'repository' 	=> 'Pongo\Cms\Support\Repositories\PageRepositoryEloquent'

		),

	),

	/**
	 * Custom Artisan pongo:<command>
	 *
	 * Loaded on boot by PongoServiceProvider -> bootCommands()
	 */
	
	'commands' => array(

		'pongo:import_asset' 		=> 'Pongo\Cms\Commands\ImportAssetCommand',
		'pongo:change_auth_model' 	=> 'Pongo\Cms\Commands\ChangeAuthModelCommand',
		'pongo:create_migration'	=> 'Pongo\Cms\Commands\CreateMigrationCommand',

	),

);