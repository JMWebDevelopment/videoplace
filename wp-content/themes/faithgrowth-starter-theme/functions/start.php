<?php
/*
 * The workhorse functions file for the child theme that loads other function components if needed.
 * We like to keep the child themes functions.php clean and simple.
 */

/* Define a few constants */
define( 'STYLESHEET_DIR', get_stylesheet_directory() );
define( 'STYLESHEET_URI', get_stylesheet_directory_uri() );
define( 'FG_BOWER', trailingslashit( STYLESHEET_URI ) . 'bower_components' );
define( 'FG_ZF_JS', trailingslashit( FG_BOWER ) . 'foundation/js' );


//* Setup Theme
//include_once( get_stylesheet_directory() . '/functions/theme-defaults.php' );


//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

// Enqueue main js files
add_action( 'wp_enqueue_scripts', 'fg_load_scripts' );
function fg_load_scripts() {
	wp_enqueue_script( 'modernizr', FG_ZF_JS.'/vendor/modernizr.js', array(), '2.8.2' );

	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', FG_ZF_JS.'/vendor/jquery.js', array(), '2.1.1' );

	wp_enqueue_script( 'foundation', FG_ZF_JS . '/foundation.min.js', array('jquery'), '5.4.6', true );

	// Load any Foundation stuff individually (optional)...
	//wp_enqueue_script( 'foundation', FG_ZF_JS.'/foundation/foundation.js', array( 'jquery' ), false, true );
	//wp_enqueue_script( 'zf-abide', FG_ZF_JS.'/foundation/foundation.abide.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-accordion', FG_ZF_JS.'/foundation/foundation.accordion.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-alert', FG_ZF_JS.'/foundation/foundation.alert.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-clearing', FG_ZF_JS.'/foundation/foundation.clearing.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-dropdown', FG_ZF_JS.'/foundation/foundation.dropdown.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-equalizer', FG_ZF_JS.'/foundation/foundation.equalizer.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-interchange', FG_ZF_JS.'/foundation/foundation.equalizer.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-joyride', FG_ZF_JS.'/foundation/foundation.joyride.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-magellan', FG_ZF_JS.'/foundation/foundation.magellan.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-offcanvas', FG_ZF_JS.'/foundation/foundation.offcanvas.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-orbit', FG_ZF_JS.'/foundation/foundation.orbit.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-reveal', FG_ZF_JS.'/foundation/foundation.reveal.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-slider', FG_ZF_JS.'/foundation/foundation.slider.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-tab', FG_ZF_JS.'/foundation/foundation.tab.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-tooltip', FG_ZF_JS.'/foundation/foundation.tooltip.js', array( 'foundation' ), false, true );
	//wp_enqueue_script( 'zf-topbar', FG_ZF_JS.'/foundation/foundation.topbar.js', array( 'foundation' ), false, true );

	wp_enqueue_script( 'app-js', get_stylesheet_directory_uri() . '/assets/js/app.js', array('jquery', 'foundation'), false, true );


}
// Enqueue stylesheets
add_action( 'wp_enqueue_scripts', 'fg_load_styles' );
function fg_load_styles() {
	wp_enqueue_style( 'main-style', get_stylesheet_directory_uri() .'/assets/css/app.css' );

}

// Customize WordPress
include_once ( get_stylesheet_directory() . '/functions/wordpress-customization.php' );

// Customize Genesis
include_once ( get_stylesheet_directory() . '/functions/genesis-customization.php' );

// Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

// Add Accessibility support
// These can be turned on and off depending on the client requirements
add_theme_support( 'genesis-accessibility', array(
	'headings',
	//'drop-down-menu',
	'search-form',
	'skip-links',
	'rems', )
);

// Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

// Optional: Add support for 3-column footer widgets
// add_theme_support( 'genesis-footer-widgets', 3 );

// Foundation Setup
include_once ( get_stylesheet_directory() . '/functions/foundation-customization.php' );