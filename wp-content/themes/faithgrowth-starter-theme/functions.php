<?php
//* Start the genesis engine(parent theme)
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Faith Growth Starter Theme' );
define( 'CHILD_THEME_URL', get_bloginfo( 'url' ) );
define( 'CHILD_THEME_VERSION', '0.1' );

include_once ( get_stylesheet_directory() . '/functions/start.php' );
