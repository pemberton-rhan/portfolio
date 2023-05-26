<?php

add_filter( 'block_categories_all' , function( $categories ) {

  // Adding a new category.
  $categories[] = array(
    'slug'  => 'heroes',
    'title' => 'Heroes'
  );

  return $categories;
} );


