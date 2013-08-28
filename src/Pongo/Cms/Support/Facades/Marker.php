<?php namespace Pongo\Cms\Support\Facades;

use Illuminate\Support\Facades\Facade;

class Marker extends Facade {

	/**
	 * Get the registred name of the component
	 * 
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'Marker'; }

}