<?php namespace Pongo\Cms\Classes;

class Tool {

	public function __construct()
	{
		
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
	 * Print icon checked/unchecked
	 * 
	 * @param  string $is_valid
	 * @return string
	 */
	public function unChecked($is_valid)
	{
		return ($is_valid == 1) ? '<i class="icon-check"></i>' : '<i class="icon-unchecked"></i>';
	}

	/**
	 * Get Class name back
	 * 
	 * @return string Name of the class
	 */
	public function name()
	{
		return get_class($this);
	}

}