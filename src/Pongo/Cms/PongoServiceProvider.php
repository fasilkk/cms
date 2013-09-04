<?php namespace Pongo\Cms;

use Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader as AliasLoader;

class PongoServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Get an instance of AliasLoader
	 * 
	 * @return instance
	 */
	protected $aliasLoader;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('pongo/cms');

		// Inclusions
		require __DIR__.'/../../start.php';
		require __DIR__.'/../../helpers.php';
		require __DIR__.'/../../routes.php';
		require __DIR__.'/../../filters.php';
		require __DIR__.'/../../composers.php';

		// Instantiate AliasLoader
		$this->aliasLoader = AliasLoader::getInstance();

		// Run accessor methods
		$this->loadServiceProviders();
		$this->bindRepositories();
		$this->activateFacades();
		$this->bootCommands();		
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		
		$app = $this->app;

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

	/**
	 * Bind repositories
	 *
	 * @return void
	 */
	protected function bindRepositories()
	{		
		$app = $this->app;

		$repositories = Config::get('cms::system.repositories');

		foreach ($repositories as $repo) {
			
			$app->$repo['method']($repo['interface'], $repo['repository']);

		}
	}

	/**
	 * Activate custom Facades
	 *
	 * @return void
	 */
	protected function activateFacades()
	{
		$app = $this->app;

		$facades = Config::get('cms::system.facades');

		foreach ($facades as $facade => $path) {
			
			// Share facade name
			$app[$facade] = $app->share(function($app) use ($path) {
				return new $path['class'];
			});

			// Alias facade
			$app->booting(function() use ($facade, $path) {
				$this->aliasLoader->alias($facade, $path['alias']);
			});
			
		}
	}

	/**
	 * Load custom service providers
	 *
	 * @return void
	 */
	protected function loadServiceProviders()
	{
		$app = $this->app;

		$providers = Config::get('cms::system.providers');

		$provider_path = 'Pongo\Cms\Support\Providers\\';		

		foreach ($providers as $provider) {

			if (substr_count($provider, '\\')>0) $provider_path = '';

			$provider_name = "{$provider_path}{$provider}";

			$app->register($provider_name);
		}
	}

	/**
	 * Load custom Artisan commands
	 *
	 * @return void
	 */
	protected function bootCommands()
	{
		$app = $this->app;

		$commands = Config::get('cms::system.commands');

		foreach ($commands as $command => $class) {
			
			$this->app[$command] = $this->app->share(function($app) use ($class) {
				return new $class;
			});

			$reg_commands[] = $command;
		}

		$this->commands($reg_commands);
	}

}