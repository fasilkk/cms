<?php namespace Pongo\Cms\Classes;

use App;

class Marker {

	/**
	 * Decode Marker string text
	 * 
	 * @param  string $text Marker code
	 * @return string 		Marker's decoded blade view
	 */
	public function decode($text)
	{		
		$tmp_text = trim($text);

		//con json
		preg_match_all('/\[\$([!?A-Z_]+)\[([^$]+)?\]\]/i', $tmp_text, $matches);

		foreach ($matches[0] as $key => $value) {

			// Original marker string
			$marker_original = $matches[0][$key];

			// Method to execute
			$method = $matches[1][$key];

			// String found
			$found = $matches[2][$key];

			// Check if marker method is IoCed
			if ( App::bound($method) ) {

				// Clean HTML
				$found = strip_tags($found);
				$found = html_entity_decode($found);

				$v = json_decode($found, true);

				if ( ! is_array($v) ) $v = array();

				// Get JSON variables
				$vars = $v;

				$decoded = $this->$method($vars);

			} else {

				return $marker_original;

			}

		}

		return $decoded;
	}

	/**
	 * Marker magic method
	 * 
	 * @param  string $name      Marker tag
	 * @param  array $arguments  Marker arguments
	 * @return string            Marker's decoded blade view
	 */
	protected function __call($name, $arguments)
	{		
		// Instantiate marker class
		$marker = App::make($name);

		// Pass tag name
		$marker->name = $name;

		// Pass arguments as parameters
		$marker->parameters = $arguments;

		// Run instance
		return $marker->run();
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