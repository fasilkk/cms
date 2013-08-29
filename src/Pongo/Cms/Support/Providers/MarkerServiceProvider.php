<?php namespace Pongo\Cms\Support\Providers;

use Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader as AliasLoader;

class MarkerServiceProvider extends ServiceProvider {

	/**
	 * Register this service provider
	 * 
	 * @return void
	 */
	public function register()
	{
		$app = $this->app;

		// Bind Markers according with cms::settings.markers
		foreach (Config::get('cms::markers') as $methodName => $className) {

			$app->bind($methodName, function() use ($className) { return new $className; });

		}
	}

}