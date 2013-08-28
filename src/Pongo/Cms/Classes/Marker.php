<?php namespace Pongo\Cms\Classes;

use App;

class Marker {

	/*protected $content;

	public function __construct($content_text)
	{
		$this->content = $content_text;
	}*/

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

			if ( App::bound($method) ) {

				// Clean HTML
				$found = strip_tags($found);
				$found = html_entity_decode($found);

				$v = json_decode($found, true);

				if(!is_array($v)) $v = array();

				// Get JSON variables
				$vars = $v;

				$decoded = $this->$method($vars);

			} else {

				return $marker_original;

			}

		}

		return $decoded;

	}

	protected function __call($name, $arguments)
	{
		
		$marker = App::make($name);

		$content = $marker->run();

		return $content;

	}

}