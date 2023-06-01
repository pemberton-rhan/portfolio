<?php
  
  // Modify the excerpt 
  function custom_excerpt_more($more) {
    return '&nbsp;...';
  }
  add_filter('excerpt_more', 'custom_excerpt_more');
  
  // Modify the excerpt length
  function custom_excerpt_length($length) {
      // Set your desired excerpt length (in words)
      return 35;
  }
  add_filter('excerpt_length', 'custom_excerpt_length');

