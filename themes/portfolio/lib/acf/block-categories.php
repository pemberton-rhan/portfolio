<?php

add_filter( 'block_categories_all' , function( $categories ) {

  // Add categories here
  $categories[] = array(
    'slug'  => 'heroes',
    'title' => 'Heroes'
  );
  
  $categories[] = array(
    'slug'  => 'content',
    'title' => 'Content'
  );

  return $categories;
} );


