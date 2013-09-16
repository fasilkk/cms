<?php

class ElementPageTableSeeder extends Seeder {

	public function run()
	{
		// Reset table
		DB::table('element_page')->truncate();

		$order_id = Config::get('cms::system.default_order');

		DB::table('element_page')->insert(array(

			// En

			array('page_id' => 1, 'element_id' => 1, 'order_id' => $order_id),
			array('page_id' => 1, 'element_id' => 2, 'order_id' => $order_id),
			array('page_id' => 1, 'element_id' => 3, 'order_id' => $order_id),
			array('page_id' => 2, 'element_id' => 1, 'order_id' => $order_id),
			array('page_id' => 2, 'element_id' => 2, 'order_id' => $order_id),
			array('page_id' => 2, 'element_id' => 3, 'order_id' => $order_id),
			array('page_id' => 3, 'element_id' => 1, 'order_id' => $order_id),
			array('page_id' => 3, 'element_id' => 3, 'order_id' => $order_id),

			// It

			array('page_id' => 4, 'element_id' => 1, 'order_id' => $order_id),
			array('page_id' => 4, 'element_id' => 2, 'order_id' => $order_id),
			array('page_id' => 4, 'element_id' => 3, 'order_id' => $order_id),
			array('page_id' => 5, 'element_id' => 1, 'order_id' => $order_id),
			array('page_id' => 5, 'element_id' => 2, 'order_id' => $order_id),
			array('page_id' => 5, 'element_id' => 3, 'order_id' => $order_id),
			array('page_id' => 6, 'element_id' => 1, 'order_id' => $order_id),
			array('page_id' => 6, 'element_id' => 3, 'order_id' => $order_id),

		));

	}

}
