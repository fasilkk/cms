<?php namespace Pongo\Cms\Classes;

class Pongo {
	
	public function __construct()
	{
		
	}

	public function addServiceProvider($provider, $app_providers) {

		$provider_path = 'Pongo\Cms\Support\Providers\\' . $provider;

		array_push($app_providers, $provider_path);

	}

}