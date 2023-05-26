<?php
	
/* Add theme support
-------------------------------------------------------------- */
// Enables the usage and display of post thumbnails in a WordPress theme.
add_theme_support( 'post-thumbnails' );
	
/* Remove theme support
-------------------------------------------------------------- */
// Disables all core patterns.
add_action('init', function() {
	remove_theme_support('core-block-patterns');
});