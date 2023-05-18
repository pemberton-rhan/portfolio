<?php

	function gofundme_styles() {
		wp_enqueue_style( 'main-style', get_template_directory_uri() . '/styles/dist.css', array(), '1.0', 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'gofundme_styles' );