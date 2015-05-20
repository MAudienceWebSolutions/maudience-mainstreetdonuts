<?php

Carbon_Container::factory('custom_fields', __('Middle Content Options', 'crb'))
	->show_on_post_type('page')
	->show_on_template('templates/home.php')
	->add_fields(array(
		Carbon_Field::factory('rich_text', 'crb_middle_home_content','Content'),
		Carbon_Field::factory('attachment', 'crb_middle_home_image', 'Image'),
	));

Carbon_Container::factory('custom_fields', __('Products', 'crb'))
	->show_on_post_type('page')
	->show_on_template('templates/gallery.php')
	->add_fields(array(
		Carbon_Field::factory('complex', 'crb_products','')->add_fields(array(
			Carbon_Field::factory('attachment','image', 'Product Image'),
			Carbon_Field::factory('text', 'title','Product Title'),
			Carbon_Field::factory('rich_text', 'description','Product Description'),
			Carbon_Field::factory('text', 'price','Product Price'),
			Carbon_Field::factory('text', 'dozen','Product Dozen Price'),
		)),
	));

Carbon_Container::factory('custom_fields', __('Menu', 'crb'))
	->show_on_post_type('page')
	->show_on_template('templates/menu.php')
	->add_fields(array(
		Carbon_Field::factory('complex', 'crb_menu_types','Menu Types')->add_fields(array(
			Carbon_Field::factory('text', 'title','Menu Type Title'),
			Carbon_Field::factory('complex', 'crb_menu_class','Menu Class')->add_fields(array(
				Carbon_Field::factory('text', 'title','Menu Class Title'),
				Carbon_Field::factory('rich_text', 'description','Menu Description'),
				Carbon_Field::factory('text', 'price','Single Price'),
				Carbon_Field::factory('text', 'dozen_price','Dozen Price'),
			)),
		)),
	));

