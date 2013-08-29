<?php namespace Pongo\Cms\Support\Providers;

use Config;
use Illuminate\Support\ServiceProvider;

class MarkerServiceProvider extends ServiceProvider {

	public function register()
	{
		$app = $this->app;

		// Bind Markers according with cms::settings.markers
		foreach (Config::get('cms::settings.markers') as $methodName => $className) {

			$app->bind($methodName, function() use ($className) { return new $className; });

		}

	}

}