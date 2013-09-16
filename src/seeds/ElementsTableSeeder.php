<?php

use Pongo\Cms\Models\Element;

class ElementsTableSeeder extends Seeder {

	public function run()
	{
		// Reset table
		DB::table('elements')->truncate();

		$elements = array(

			array(
				'id' => 1,
				'lang' => 'en',
				'name' => 'element_1',
				'label' => 'Element name 1',
				'text' => 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Maecenas faucibus mollis interdum.',
				'zone' => 1,
				'author_id' => 1,
				'is_valid' => 1
			),

			array(
				'id' => 2,
				'lang' => 'en',
				'name' => 'element_2',
				'label' => 'Element name 2',
				'text' => 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Maecenas faucibus mollis interdum.',
				'zone' => 1,
				'author_id' => 1,
				'is_valid' => 1
			),

			array(
				'id' => 3,
				'lang' => 'en',
				'name' => 'element_3',
				'label' => 'Element name 3',
				'text' => 'Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Cras mattis consectetur purus sit amet fermentum. Donec sed odio dui. Maecenas faucibus mollis interdum.',
				'zone' => 1,
				'author_id' => 1,
				'is_valid' => 1
			),

			array(
				'id' => 4,
				'lang' => 'it',
				'name' => 'element_1_it',
				'label' => 'Nome elemento 1',
				'text' => 'Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue.',
				'zone' => 1,
				'author_id' => 1,
				'is_valid' => 1
			),

			array(
				'id' => 5,
				'lang' => 'it',
				'name' => 'element_2_it',
				'label' => 'Nome elemento 2',
				'text' => 'Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue.',
				'zone' => 1,
				'author_id' => 1,
				'is_valid' => 1
			),

			array(
				'id' => 6,
				'lang' => 'it',
				'name' => 'element_3_it',
				'label' => 'Nome elemento 3',
				'text' => 'Cras mattis consectetur purus sit amet fermentum. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Curabitur blandit tempus porttitor. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nullam id dolor id nibh ultricies vehicula ut id elit. Nulla vitae elit libero, a pharetra augue.',
				'zone' => 1,
				'author_id' => 1,
				'is_valid' => 1
			)

		);
		
		foreach ($elements as $element) {

			// Create single pages
			Element::create($element);

		}

	}

}
