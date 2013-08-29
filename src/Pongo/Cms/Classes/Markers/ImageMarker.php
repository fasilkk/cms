<?php namespace Pongo\Cms\Classes\Markers;

class ImageMarker {
	
	/**
	 * Marker tag name
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * Marker parameters
	 * 
	 * @var array
	 */
	public $parameters = array();

	/**
	 * Execute marker
	 * 
	 * @return string Marker's blade view
	 */
	public function run()
	{
		return D($this->parameters) . $this->name . ' is running!';
	}

}