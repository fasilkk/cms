<?php namespace Pongo\Cms\Classes;

class Tool {

	public function __construct()
	{
		
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