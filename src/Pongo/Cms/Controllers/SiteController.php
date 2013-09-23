<?php namespace Pongo\Cms\Controllers;

use Config, Render, Theme;

class SiteController extends BaseController {
	
	public function __construct()
	{

	}

	public function renderPage($uri)
	{
		$view = Theme::view('partials.test');
		$view['uri'] = $uri;

		return $view;		
	}

}