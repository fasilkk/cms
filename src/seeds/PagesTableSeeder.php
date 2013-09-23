<?php

use Pongo\Cms\Models\Page;

class PagesTableSeeder extends Seeder {

	public function run()
	{
		// Reset table
		DB::table('pages')->truncate();

		$pages = array(

			// EN pages

			array(
				'id' => 1,
				'parent_id' => 0,
				'lang' => 'en',
				'name' => 'Home page',
				'slug' => '/home-page',
				'title' => 'Title for home page',
				'template' => 'default',
				'header' => 'default',
				'layout' => 'default',
				'footer' => 'default',				
				'author_id' => 1,
				'access_level' => 0,
				'role_level' => Config::get('cms::system.roles.admin'),
				'order_id' => Config::get('cms::system.default_order'),
				'is_home' => 1,
				'is_valid' => 1
			),

			array(
				'id' => 2,
				'parent_id' => 0,
				'lang' => 'en',
				'name' => 'Test page 1',
				'slug' => '/test-page-1',
				'title' => 'Title for test page 1',
				'template' => 'default',
				'header' => 'default',
				'layout' => 'default',
				'footer' => 'default',
				'author_id' => 1,
				'access_level' => 0,
				'role_level' => Config::get('cms::system.roles.admin'),
				'order_id' => Config::get('cms::system.default_order'),
				'is_home' => 0,
				'is_valid' => 1
			),

			array(
				'id' => 3,
				'parent_id' => 0,
				'lang' => 'en',
				'name' => 'Test page 2',
				'slug' => '/test-page-2',
				'title' => 'Title for test page 2',
				'template' => 'default',
				'header' => 'default',
				'layout' => 'default',
				'footer' => 'default',
				'author_id' => 1,
				'access_level' => 0,
				'role_level' => Config::get('cms::system.roles.admin'),
				'order_id' => Config::get('cms::system.default_order'),
				'is_home' => 0,
				'is_valid' => 1
			),

			array(
				'id' => 4,
				'parent_id' => 2,
				'lang' => 'en',
				'name' => 'Test page 3',
				'slug' => '/test-page-1/test-page-3',
				'title' => 'Title for test page 3',
				'template' => 'default',
				'header' => 'default',
				'layout' => 'default',
				'footer' => 'default',
				'author_id' => 1,
				'access_level' => 0,
				'role_level' => Config::get('cms::system.roles.admin'),
				'order_id' => Config::get('cms::system.default_order'),
				'is_home' => 0,
				'is_valid' => 1
			),

			// IT pages
			
			array(
				'id' => 5,
				'parent_id' => 0,
				'lang' => 'it',
				'name' => 'Home page',
				'slug' => '/home-page',
				'title' => 'Titolo per home page',
				'template' => 'default',
				'header' => 'default',
				'layout' => 'default',
				'footer' => 'default',
				'author_id' => 1,
				'access_level' => 0,
				'role_level' => Config::get('cms::system.roles.admin'),
				'order_id' => Config::get('cms::system.default_order'),
				'is_home' => 1,
				'is_valid' => 1
			),

			array(
				'id' => 6,
				'parent_id' => 0,
				'lang' => 'it',
				'name' => 'Pagina test 1',
				'slug' => '/pagina-test-1',
				'title' => 'Titolo per pagina test 1',
				'template' => 'default',
				'header' => 'default',
				'layout' => 'default',
				'footer' => 'default',
				'author_id' => 1,
				'access_level' => 0,
				'role_level' => Config::get('cms::system.roles.admin'),
				'order_id' => Config::get('cms::system.default_order'),
				'is_home' => 0,
				'is_valid' => 1
			),

			array(
				'id' => 7,
				'parent_id' => 6,
				'lang' => 'it',
				'name' => 'Pagina test 2',
				'slug' => '/pagina-test-1/pagina-test-2',
				'title' => 'Titolo per pagina test 2',
				'template' => 'default',
				'header' => 'default',
				'layout' => 'default',
				'footer' => 'default',
				'author_id' => 1,
				'access_level' => 0,
				'role_level' => Config::get('cms::system.roles.admin'),
				'order_id' => Config::get('cms::system.default_order'),
				'is_home' => 0,
				'is_valid' => 1
			),

			array(
				'id' => 8,
				'parent_id' => 6,
				'lang' => 'it',
				'name' => 'Pagina test 3',
				'slug' => '/pagina-test-1/pagina-test-3',
				'title' => 'Titolo per pagina test 3',
				'template' => 'default',
				'header' => 'default',
				'layout' => 'default',
				'footer' => 'default',
				'author_id' => 1,
				'access_level' => 0,
				'role_level' => Config::get('cms::system.roles.admin'),
				'order_id' => Config::get('cms::system.default_order'),
				'is_home' => 0,
				'is_valid' => 1
			),

		);
		
		foreach ($pages as $page) {

		// 	// Create single pages
			Page::create($page);

		}

	}

}
