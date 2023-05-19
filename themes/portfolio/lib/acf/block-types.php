<?php

// Load block reg files here
add_action( 'acf/init', 'my_acf_init_block_types' );
function my_acf_init_block_types() {
	
	if ( function_exists( 'acf_register_block_type' ) ) {
		include_once( get_template_directory() . '/lib/acf/block-reg/heroes.php' );
	}
}

// List of allowed blocks
add_filter('allowed_block_types', 'restrict_allowed_block_types', 10, 2);
function restrict_allowed_block_types($allowed_block_types, $post) {
	
	// Array of allowed block types
	$allowed_blocks = array(
		
		// Core blocks
		'core/heading',
		'core/paragraph',
		'core/list',
		'core/html',
		'core/shortcode',
		// Heroes
		'acf/heroes-primary',
	);
	
	// Check if the current post is a page
	if ($post->post_type === 'page') {
		return $allowed_blocks;
	}
	
	// For other post types, return an empty array to disallow all blocks
	return array();
}