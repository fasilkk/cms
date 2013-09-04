<?php

/**
 * Print out debug informations
 * @param mixed $value
 * @return string echoed
 */
function D($value)
{
	echo '<pre>' . print_r($value, true) . '</pre>';
}

/**
 * Get config key
 * @param string $config
 * @param string $key
 * @return string
 */
function CONFIG($config, $key)
{
	if($key == '') return array();

	$conf = Config::get($config);

	return $conf[$key];
}

/**
 * Marker helper
 * @param string $marker Marker code to decode
 * @return string
 */
function MARKER($marker)
{
	return Marker::decode($marker);
}

/**
 * LANG
 */

if ( ! function_exists('t'))
{
	/**
	 * Translate the given message accordingly with active locale.
	 *
	 * @param  string  $id
	 * @param  array   $parameters
	 * @return string
	 */
	function t($id, $parameters = array())
	{
		$domain = 'messages';
		
		$locale = Config::get('cms::settings.language');

		$str = "cms::lang.{$id}";

		return app('translator')->trans($str, $parameters, $domain, $locale);
	}
}


/**
 * SYSTEM
 */

if ( ! function_exists('env'))
{
	/**
	 * Get environment
	 * @param string $env
	 * @return string
	 */
	function env($env)
	{
		return app()->env == $env;
	}
}

if ( ! function_exists('public_path'))
{
	/**
	 * Get public path.
	 *
	 * @return string
	 */
	function public_path($path = '')
	{
		return app()->make('path.public').($path ? '/'.$path : $path);
	}
}