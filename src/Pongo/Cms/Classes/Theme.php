<?php namespace Pongo\Cms\Classes;

use Config, View;

class Theme {
	
	/**
	 * Default theme name
	 * 
	 * @var string
	 */
	public $name = 'default';

	public function __construct()
	{
		$this->name = Config::get('cms::settings.theme');
	}

	/**
	 * Get a theme config entry
	 * 
	 * @param  string $key
	 * @return mixed
	 */
	public function config($key)
	{
		return Config::get('site::theme.'.$key);
	}	

	/**
	 * Load a theme view from themes/{theme name}
	 * Folder /themes instead /views loaded on boot from SiteServiceProvider
	 * 
	 * @return string
	 */
	public function view($name, array $data = array())
	{
		$view_name = 'site::' . $this->name . '.' . $name;

		// Set to 'default' view if view not found
		if ( ! View::exists($view_name)) {
			$view_name_arr = explode('.', $view_name);
			$view_name = str_replace(end($view_name_arr), 'default', $view_name);
		}

		return View::make($view_name, $data);
	}

	/**
	 * Get active theme name
	 * 
	 * @return string Name of the theme
	 */
	public function className()
	{
		return $this->name;
	}
	
}