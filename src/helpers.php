<?php

/**
 * Print out debug informations
 * @param mixed $value
 * @param bool  $stop
 * @return string echoed
 */
function D($value, $stop = false)
{
	echo '<pre>' . print_r($value, true) . '</pre>';

	if($stop) die();
}

/**
 * Print out debug informations for JavaScript
 * @param mixed $value
 * @return string
 */
function DJ($value)
{
	return '<pre>' . print_r($value, true) . '</pre>';

	die();
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
	function t($id, $parameters = array(), $locale = null)
	{
		$domain = 'messages';
		
		$locale = is_null($locale) ? Config::get('cms::settings.language') : $locale;

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

/**
 * TOOLS
 */

if ( ! function_exists('array_min_key'))
{
	/**
	 * Reduce an array with minimal key
	 * 
	 * @param  array 	$array
	 * @param  mixed 	$min_key
	 * @return array
	 */
	function array_min_key($array, $min_key)
	{
		
		$min_val = $array[$min_key];

		foreach ($array as $key => $value) {
			if($value >= $min_val) {
				$tmp_array[$key] = $value;
			}
		}

		return $tmp_array;
	}
}

if ( ! function_exists('active'))
{
	/**
	 * Print out class=active if true
	 * 
	 * @param  string $var 
	 * @param  string $fix 
	 * @return bool
	 */
	function active($var, $fix)
	{
		return Tool::isActive($var, $fix);
	}
}

if ( ! function_exists('checked'))
{
	/**
	 * Print out checked=checked if true
	 * 
	 * @param  string $var 
	 * @param  string $fix 
	 * @return bool
	 */
	function checked($var, $fix)
	{
		return Tool::isChecked($var, $fix);
	}
}

if ( ! function_exists('is_empty'))
{
	/**
	 * Check object is empty
	 * 
	 * @param  string $var 
	 * @return bool
	 */
	function is_empty($var)
	{
		return (count($var) === 0) ? true : false;
	}
}

if ( ! function_exists('link_to_cms'))
{
	/**
	 * Link to cms route
	 * 
	 * @param  string $var 
	 * @param  string $fix 
	 * @return bool
	 */
	function link_to_cms($link, $title, $attributes = array(), $secure = null)
	{
		return link_to('cms/' . $link, $title, $attributes, $secure);
	}
}

if ( ! function_exists('selected'))
{
	/**
	 * Print out selected=selected if true
	 * 
	 * @param  string $var 
	 * @param  string $fix 
	 * @return bool
	 */
	function selected($var, $fix)
	{
		return Tool::isSelected($var, $fix);
	}
}