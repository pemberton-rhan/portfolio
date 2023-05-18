<?php

// List of block categories
function gofundme_block_categories( $categories ) {
	$category_slugs = wp_list_pluck( $categories, 'slug' );
	return in_array( 'gofundme', $category_slugs, true ) ? $categories : array_merge(
		$categories,
		array(
			array(
				'slug'  => 'heroes',
				'title' => __( 'Heroes'),
				'icon'  => null,
			),
		)
	);
}
add_filter( 'block_categories_all', 'gofundme_block_categories' );