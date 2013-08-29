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

		// Instantiate AliasLoader
		$this->aliasLoader = AliasLoader::getInstance();

		// Run accessor methods
		$this->loadServiceProviders();
		$this->activateFacades();

		// Inclusions
		require __DIR__.'/../../helpers.php';
		require __DIR__.'/../../routes.php';
		require __DIR__.'/../../filters.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{		
		// Run accessor methods
		$this->bindRepositories();
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

		// User Repository Interface
		$app->singleton(
			'Pongo\Cms\Support\Repositories\UserRepositoryInterface',
			'Pongo\Cms\Support\Repositories\UserRepositoryEloquent'
		);

		// Pongo class
		$app->bind('Pongo', function() {
			return new Classes\Pongo;
		});
	}

	/**
	 * Activate custom Facades
	 *
	 * @return void
	 */
	protected function activateFacades()
	{
		$app = $this->app;

		$facades = Config::get('cms::settings.facades');

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

		$providers = Config::get('cms::settings.providers');

		$provider_path = 'Pongo\Cms\Support\Providers\\';		

		foreach ($providers as $provider) {

			$provider_name = "{$provider_path}{$provider}";

			$app->register($provider_name);
		}
	} 

}