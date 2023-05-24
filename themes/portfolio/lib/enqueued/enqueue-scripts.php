<?php

	function gofundme_scripts() {
		wp_enqueue_script( 'global-scripts', get_stylesheet_directory_uri() . '/dist/dist.js', null, ['jquery'], true );
	}
	add_action( 'wp_enqueue_scripts', 'gofundme_scripts' );