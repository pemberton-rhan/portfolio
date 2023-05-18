<?php

// Primary
acf_register_block_type(array(
		'name' => 'heroes_primary',
		'title' => __('Heroes - Primary'),
		'description' => __('This is the primary hero block used on most pages.'),
		'render_template' => 'blocks/heroes/primary/block.php',
		'category' => 'heroes',
		'icon' => 'align-full-width',
		'keywords' => array('block', 'hero', 'heroes', 'primary'),
		'mode' => 'edit',
		'example'  => array(
			'attributes' => array(
				'mode' => 'preview',
				'data' => array(
					'preview_image' => get_template_directory_uri() . '/blocks/heros/primary/example.png',
				)
			)
		)
	)
);