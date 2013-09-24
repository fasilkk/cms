<?php namespace Pongo\Cms\Controllers;

use Pongo\Cms\Classes\Pongo;
use Pongo\Cms\Support\Repositories\PageRepositoryEloquent as Page;
use Config, Render, Theme;

class SiteController extends BaseController {
	
	public $slug_first;

	public $slug_full;	

	public $slug_last;

	public $slug_prev;

	public function __construct(Page $page, Pongo $pongo)
	{
		$this->page = $page;
		$this->pongo = $pongo;

		$this->slug = $this->pongo->getUrl();
		$this->slug_first = $this->slug['first'];
		$this->slug_full = $this->slug['full'];
		$this->slug_last = $this->slug['last'];
		$this->slug_prev = $this->slug['prev'];
	}

	public function renderPage($uri)
	{
		
		// STEPS:
		// Check full slug (if / -> Repository homePage())
		// Check prev slug (and then Blogs or Products last slugs - depends on wrapper_id)

		$page = $this->page->getPageBySlug($this->slug_full);

		$view = Theme::view('partials.test');
		$view['uri_first'] = $this->slug_first;
		$view['uri_full'] = $this->slug_full;
		$view['uri_last'] = $this->slug_last;
		$view['uri_prev'] = $this->slug_prev;
		$view['page'] = $page;

		return $view;
	}

	/**
	 * Detect the right page to render
	 * @return mixed Page object
	 */
	private function detectPage()
	{

	}

}