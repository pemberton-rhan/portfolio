<?php
function restrict_blocks($allowed_block_types, $post) {

  $allowed_block_types = array(
    
    // Core blocks
    'core/heading',
    'core/paragraph',
    'core/pullquote',
    'core/list',
    'core/video',
    'core/image',
    
    // Custom blocks
    'acf/hero-primary',
  );

  return $allowed_block_types;
}
add_filter('allowed_block_types', 'restrict_blocks', 10, 2);
