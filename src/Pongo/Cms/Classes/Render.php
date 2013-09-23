<?php namespace Pongo\Cms\Classes;

use Asset, HTML;

class Render {
	
	/**
	 * Asset base path
	 * 
	 * @var string
	 */
	private $asset_path = 'packages/pongocms/cms/';

	/**
	 * Asset Development base path
	 * 
	 * @var string
	 */
	private $development_path = 'dev/app/';

	/**
	 * Asset shortcut
	 * 
	 * @param  string $source Asset path
	 * @param  array  $attributes
	 * @return string         Asset path
	 */
	public function asset($source = null, $attributes = array())
	{		
		if ( ! is_null($source)) {
			$type = (pathinfo($source, PATHINFO_EXTENSION) == 'css') ? 'style' : 'script';

			$path = env('local') ? $this->development_path : $this->asset_path;

			return HTML::$type($path . $source, $attributes);
		} 
	}

	/**
	 * Append asset to container
	 * @param  string $container  Container name
	 * @param  string $name       Asset name
	 * @param  string $source     Asset source
	 * @param  string $dependency Asset dependency (comes after)
	 * @return string             Print out the asset
	 */
	public function assetAdd($container = 'default', $name = 'asset', $source = '', $dependency = null)
	{
		$path = env('local')  ? $this->development_path : $this->asset_path;

		return Asset::container($container)->add($name, $path . $source, $dependency);
	}

	/**
	 * Bootstrap virtual asset
	 * 
	 * @param  string $source
	 * @return string
	 */
	public function bootJs($source)
	{
		return HTML::script($source);
	}

	/**
	 * Asset container wrapper for scripts
	 * 
	 * @param  string $name Container name
	 * @return string       Asset string
	 */
	public function scripts($name = 'default')
	{
		return Asset::container($name)->scripts();
	}

	/**
	 * Asset container wrapper for styles
	 * 
	 * @param  string $name Container name
	 * @return string       Asset string
	 */
	public function styles($name = 'default')
	{
		return Asset::container($name)->styles();
	}

	/**
	 * Get class name
	 * 
	 * @return string Name of the class
	 */
	public function className()
	{
		return get_class($this);
	}
	
}