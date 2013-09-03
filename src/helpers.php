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
 * PATHS
 */

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