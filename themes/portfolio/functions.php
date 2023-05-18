<?php

// All partials are located in the lib file.
// Please try and keep code aside from partial imports off of this page.

/* Enqueued styles and scripts
-------------------------------------------------------------- */
require_once( get_template_directory() . '/lib/enqueued/enqueue-styles.php' );
require_once( get_template_directory() . '/lib/enqueued/enqueue-scripts.php' );

/* Theme support & options
-------------------------------------------------------------- */
require_once( get_template_directory() . '/lib/functions/theme-support.php' );
require_once( get_template_directory() . '/lib/functions/theme-options.php' );

/* ACF
-------------------------------------------------------------- */
require_once( get_template_directory() . '/lib/acf/admin-styles.php' );
require_once( get_template_directory() . '/lib/acf/block-types.php' );
require_once( get_template_directory() . '/lib/acf/block-categories.php' );
