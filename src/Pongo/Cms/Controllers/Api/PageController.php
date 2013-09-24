<?php namespace Pongo\Cms\Controllers\Api;

use Pongo\Cms\Support\Repositories\PageRepositoryEloquent as Page;
use Pongo\Cms\Support\Repositories\ElementRepositoryEloquent as Element;
use Pongo\Cms\Support\Validators\Page\SettingsValidator as SettingsValidator;
use Alert, Config, Input, Pongo, Redirect, Session, Str;

class PageController extends ApiController {

	public function __construct(Page $page, Element $element)
	{
		parent::__construct();

		$this->page = $page;
		$this->element = $element;
	}

	/**
	 * Set the new LANG constant
	 * 
	 * @return string json encoded object
	 */
	public function changeLang()
	{
		if(Input::has('lang')) {

			$lang = Input::get('lang');
			$label = Config::get('cms::settings.languages.'.$lang);

			Session::put('LANG', $lang);

			$response = array(
				'status' 	=> 'info',
				'msg'		=> t('alert.info.page_lang', array('lang' => $label))
			);

		} else {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.page_lang')
			);

		}

		return json_encode($response);
	}

	/**
	 * Create a new page
	 * 
	 * @return string json encoded object
	 */
	public function createPage()
	{
		if(Input::has('lang')) {

			$lang = Input::get('lang');
			$name = t('template.page.new', array(), $lang);

			$page_arr = array(
				'parent_id' => 0,
				'lang' => $lang,
				'name' => $name,
				'slug' => '/' . Str::slug($name),
				'title' => $name,
				'author_id' => USERID,
				'access_level' => 0,				
				'role_level' => LEVEL,
				'order_id' => Config::get('cms::system.default_order'),
				'is_valid' => 0
			);

			$page = $this->page->createPage($page_arr);

			$response = array(
				'status' 	=> 'success',
				'msg'		=> t('alert.success.page_created'),
				'id'		=> $page->id,
				'name'		=> $name,
				'url'		=> route('page.settings', array('id' => $page->id)),
				'cls'		=> 'new',
				'lang'		=> $lang
			);

		} else {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.page_created')
			);

		}

		return json_encode($response);
	}

	/**
	 * Re-order pages on Nestable drag&drop
	 * 
	 * @return string json encoded object
	 */
	public function orderPages()
	{
		if(Input::has('pages')) {

			$pages = json_decode(Input::get('pages'), true);

			// Recursive update
			$this->updateOrderRecursivePage($pages, 0);

			$response = array(
				'status' 	=> 'success',
				'msg'		=> t('alert.success.page_order')
			);

		} else {

			$response = array(
				'status' 	=> 'error',
				'msg'		=> t('alert.error.page_order')
			);

		}		

		return json_encode($response);
	}

	/**
	 * Reorder recursive pages
	 * 
	 * @param  array $pages
	 * @param  int $parent
	 * @return void
	 */
	protected function updateOrderRecursivePage($pages, $parent)
	{
		foreach ($pages as $key => $page_arr) {

			// Get page ID
			$pid = $page_arr['id'];

			// Update pages 1st level
			$page = $this->page->getPage($pid);
			$page->parent_id = $parent;
			$page->order_id = $key + 1;
			$this->page->savePage($page);

			$page->slug = Pongo::pageTree($page->id, 'slug', '/');
			$this->page->savePage($page);

			// Recursive update
			if(array_key_exists('children', $page_arr)) {
				$this->updateOrderRecursivePage($page_arr['children'], $pid);
			}

		}
	}

	public function pageSettingsClone()
	{
		$response = array(
			'status' 	=> 'error',
			'msg'		=> t('alert.error.page_order')
		);

		return json_encode($response);
	}

	/**
	 * Delete a page after a form submission
	 * 
	 * @return void
	 */
	public function pageSettingsDelete()
	{
		if(Input::has('page_id')) {

			$pid = Input::get('page_id');

			$elements = $this->page->getPageElements($pid);

			$subpages = $this->page->getSubPages($pid);

			// Check if NOT force delete page

			if(!Input::has('force_delete')) {

				// Has elements

				if(!is_empty($elements)) {

					Alert::error(t('alert.error.page_has_elements'))->flash();

					return Redirect::route('page.settings', array('id' => $pid));

				// Has subpages

				} elseif(!is_empty($subpages)) {

					Alert::error(t('alert.error.page_has_subpages'))->flash();

					return Redirect::route('page.settings', array('id' => $pid));

				// It's OK, ready to delete

				} else {

					if($this->deletePage($pid)) {

						Alert::success(t('alert.success.page_deleted'))->flash();

						return Redirect::route('page.deleted');
					}

				}

			// Check if IS force delete page checked

			} else {

				// Has subpages

				if(!is_empty($subpages)) {

					Alert::error(t('alert.error.page_has_subpages'))->flash();

					return Redirect::route('page.settings', array('id' => $pid));

				// It's OK, ready to delete

				} else {

					// Loop over elements linked to page
				
					foreach ($elements as $element) {
						
						// Detach element from page
						
						$this->page->deletePageElements($element);

						// Count element owner pages

						$n = $this->element->countElements($element, $element->id);

						// If count = 0, delete element

						if($n == 0) $this->element->getElement($element->id)->delete();

					}

					// Delete page

					if($this->deletePage($pid)) {

						Alert::success(t('alert.success.page_deleted'))->flash();

						return Redirect::route('page.deleted');
					}

				}

			}

		} else {

			Alert::error(t('alert.error.page_cant_delete'))->flash();

			return Redirect::route('page.settings', array('id', $pid));	
		}

	}

	/**
	 * Delete a page
	 * 
	 * @param  int   $page_id page id
	 * @return bool
	 */
	protected function deletePage($page_id)
	{
		$page = $this->page->getPage($page_id);

		//DELETE FILES ASSOCIATION
		// $page->files()->delete();

		//DELETE BLOG ASSOCIATIONS
		// $page->blogs()->delete();

		//DELETE PAGE RELATIONS
		// $page->pagerels()->delete();

		//DELETE MENU RELATIONS
		// $page->menus()->delete();

		//DELETE PAGE
		$page->delete();

		return true;
	}

	/**
	 * Save page settings form
	 * 
	 * @return string json encoded object
	 */
	public function pageSettingsSave()
	{
		$input = Input::all();

		$v = new SettingsValidator();

		if($v->passes()) {

			extract($input);
			
			$page = $this->page->getPage($page_id);

			// Author can edit the page
			if(is_array($unauth = Pongo::grantEdit($page->role_level)))
				return json_encode($unauth);
			
			$full_slug = $slug_base . '/' . Str::slug($slug_last);
			$home = isset($is_home) ? 1 : 0;
			$valid = isset($is_valid) ? 1 : 0;

			// Disable all home pages in lang
			if($home == 1) {
				$this->page->resetHomePage();
			}

			$page->name 		= $name;
			$page->slug 		= $full_slug;
			$page->author_id 	= USERID;
			$page->access_level = $access_level;			
			$page->role_level 	= $role_level;
			$page->wrapper_id 	= $wrapper_id;
			$page->is_home 		= $home;
			$page->is_valid 	= $valid;

			$this->page->savePage($page);

			$response = array(
				'status' 	=> 'success',
				'msg'		=> t('alert.success.save'),
				'page'		=> array(
										'id' 		=> $page_id,
										'lang'		=> LANG,
										'name'		=> $name,
										'slug'		=> $full_slug,
										'checked' 	=> $valid,
										'home'		=> $home
							   )
			);


		} else {

			return json_encode($v->formatErrors());

		}

		return json_encode($response);		
	}

}