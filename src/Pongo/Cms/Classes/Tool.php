<?php namespace Pongo\Cms\Classes;

use Config;

class Tool {

	public function __construct()
	{

	}

	/**
	 * Create array of admin roles
	 * 
	 * @param  array  	$roles   	Roles array of object
	 * @param  boolean 	$reverse 	Reverse result array
	 * @return array           		Admin roles array
	 */
	public function adminRoles($roles, $reverse = false)
	{
		$min_access = Config::get('cms::system.min_access');
		$role_access = Config::get('cms::system.roles.'.$min_access);

		$admin_roles = array();

		foreach ($roles as $role) {
			if($role->level >= $role_access) {
				$admin_roles[$role->name] = $role->level;	
			}			
		}

		return $reverse ? array_reverse($admin_roles) : $admin_roles;
	}

	/**
	 * Print out class=active if true
	 * 
	 * @param  string $var 
	 * @param  string $fix 
	 * @return bool
	 */
	public function isActive($var, $fix)
	{
		return ($var == $fix) ? ' class="active"' : '';
	}

	/**
	 * Print out checked=checked if true
	 * 
	 * @param  string $var 
	 * @param  string $fix 
	 * @return bool
	 */
	public function isChecked($var, $fix)
	{
		return ($var == $fix) ? ' checked="checked"' : '';
	}

	/**
	 * Print out selected=selected if true
	 * 
	 * @param  string $var 
	 * @param  string $fix 
	 * @return bool
	 */
	public function isSelected($var, $fix)
	{
		return ($var == $fix) ? ' selected="selected"' : '';
	}

	/**
	 * Print icon homepage
	 * 
	 * @param  string $is_valid
	 * @return string
	 */
	public function isHome($is_home)
	{
		return ($is_home) ? '<i class="icon-home" style="display: visible"></i>' : '<i class="icon-home" style="display: none"></i>';
	}

	/**
	 * Print icon checked/unchecked
	 * 
	 * @param  string $is_valid
	 * @return string
	 */
	public function unChecked($is_valid)
	{
		return ($is_valid) ? '<i class="icon-check check"></i>' : '<i class="icon-unchecked check"></i>';
	}

	/**
	 * Reduce slug chunks
	 * 
	 * @param  string  $url  
	 * @param  integer $back Chunks to subtract
	 * @return string        Partial slug
	 */
	public function slugBack($url, $back = 0)
	{
		if($back > 0) {

			$segments = explode('/', $url);

			if(is_array($segments)) {

				$n_segments = count($segments) - $back;

				$tmp_url = '';

				for ($i=1; $i < $n_segments; $i++) {

					$tmp_url .= '/' . $segments[$i];
				}

				return $tmp_url;
			}

		}

		return $url;
	}
	
	/**
	 * Slice a slug in chunks
	 * 
	 * @param  string  $url
	 * @param  integer $back
	 * @return mixed	back = 1 string || back > 1 array
	 */
	public function slugSlice($url, $back = 0)
	{
		if($back > 0) {

			$segments = array_reverse(explode('/', $url));

			array_pop($segments);

			if(is_array($segments)) {

				if($back == 1) {

					return $segments[0];
				}

				return $segments;
			}

		}

		return $url;
	}

	/**
	 * Get Class name back
	 * 
	 * @return string Name of the class
	 */
	public function className()
	{
		return get_class($this);
	}

}