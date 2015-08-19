<?php

/**
*
* WordPress Customizations for this custom theme.
*
* @category	FG_Starter
* @package	Functions
* @author 	Christopher Harris
* @license 	http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
* @link 	http://www.faithgrowth.com/
* @since 	0.1
*/


/** Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) :
	exit( 'Cheatin&#8217; uh?' );
endif;

/* Remove uneeded Genesis Elements
---------------------------------------------------------------------------------------------------- */

/*
Remove WordPress widgets we are not going to use
---------------------------------------------------------- */

function fg_remove_wp_widgets() {
	// Remove these WordPress widgets:
	unregister_widget( 'WP_Widget_Pages' );
	unregister_widget( 'WP_Widget_Calendar' );
	unregister_widget( 'WP_Widget_Archives' );
	unregister_widget( 'WP_Widget_Links' );
	unregister_widget( 'WP_Widget_Meta' );
	//unregister_widget( 'WP_Widget_Search' );
	//unregister_widget( 'WP_Widget_Text' );
	unregister_widget( 'WP_Widget_Categories' );
	unregister_widget( 'WP_Widget_Recent_Posts' );
	unregister_widget( 'WP_Widget_Recent_Comments' );
	unregister_widget( 'WP_Widget_RSS' );
	unregister_widget( 'WP_Widget_Tag_Cloud' );
	//unregister_widget( 'WP_Nav_Menu_Widget' );
}
add_action( 'widgets_init', 'fg_remove_wp_widgets', 20 );


/*
* Remove support for WordPress Customizer - this is a custom theme.
* All code below prevents access or hides the WordPress Customizer ( Front-end Editor ) Needed? see,
* https://codex.wordpress.org/Theme_Customization_API
---------------------------------------------------------- */

function fg_remove_customizer() {
	// Disallow acces to an empty editor
	wp_die( sprintf( __( 'No WordPress Theme Customizer support - If needed check your functions.php' ) ) . sprintf( '<br /><a href="javascript:history.go(-1);">Go back</a>' ) );
}
//add_action( 'load-customize.php', 'fg_remove_customizer' );

// Remove 'Customize' from Admin menu
function fg_remove_submenus() {
	global $submenu;
	// Appearance Menu
	unset($submenu['themes.php'][6]); // Customize
}
//add_action('admin_menu', 'fg_remove_submenus');

// Remove 'Customize' from the Toolbar -front-end
function fg_remove_admin_bar_links() {
	global $wp_admin_bar;
	$wp_admin_bar->remove_menu( 'customize' );
}
//add_action( 'wp_before_admin_bar_render', 'fg_remove_admin_bar_links' );

// Add Custom CSS to Back-end head
function fg_custom_admin_css() {
	echo '<style type="text/css">#customize-current-theme-link { display:none; } </style>';
}
//add_action('admin_head', 'fg_custom_admin_css');


/*
Remove WordPress Dashboard Widgets
----------------------------------------------------------- */

function fg_remove_dashboard_widgets () {
	  remove_meta_box( 'dashboard_quick_press',   'dashboard', 'side' );		//Quick Press widget
	  //remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );		//Recent Drafts
	  remove_meta_box( 'dashboard_primary',       'dashboard', 'side' );		//WordPress.com Blog
	  remove_meta_box( 'dashboard_secondary',     'dashboard', 'side' );		//Other WordPress News
	  //remove_meta_box( 'dashboard_incoming_links','dashboard', 'normal' );	//Incoming Links
	  //remove_meta_box( 'dashboard_plugins',       'dashboard', 'normal' );	//Plugins
	  //remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );	//Recent Comments
	  //remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );		//At a Glance

}
add_action( 'wp_dashboard_setup', 'fg_remove_dashboard_widgets' );


/* Remove WordPress File Editor
------------------------------------------------------------ */

define( 'DISALLOW_FILE_EDIT', true );


/* Set default image link to none
------------------------------------------------------------ */

function fg_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );

	if ( 'none' !== $image_set ) :
		update_option('image_default_link_type', 'none');
	endif;
}
add_action('admin_init', 'fg_imagelink_setup', 10);




