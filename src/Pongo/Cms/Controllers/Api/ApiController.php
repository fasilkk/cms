<?php namespace Pongo\Cms\Controllers\Api;

use Controller;

class ApiController extends Controller {

	public function __construct()
	{
		$this->beforeFilter('pongo.auth.api');
	}

}