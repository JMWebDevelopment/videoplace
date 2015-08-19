<?php

/**
*
* Genesis Customizations for this custom theme.
*
* @category	FG_Starter
* @package	Functions
* @author 	Christopher Harris
* @license 	http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
* @link 	http://www.faithgrowth.com/
* @since 	0.1
*/


/** Exit if accessed directly
---------------------------------------------------------------------------------------------------- */
if ( ! defined( 'ABSPATH' ) ) :
	exit( 'Cheatin&#8217; uh?' );
endif;


/* Remove uneeded Genesis Elements
---------------------------------------------------------------------------------------------------- */


/*
Remove Genesis Sidebars not going to be used
---------------------------------------------------------- */

// Unregister header right widget area
//unregister_sidebar( 'header-right' );

// Unregister primary sidebar
//unregister_sidebar( 'sidebar' );

// Unregister secondary sidebar
//unregister_sidebar( 'sidebar-alt' );

/*
Remove Genesis widgets we are not going to use
---------------------------------------------------------- */

function fg_remove_genesis_widgets() {
	// Remove eNews and Updates widget (softly deprecated in Genesis 1.9)
	unregister_widget( 'Genesis_eNews_Updates' );

	// Remove Latest Tweets widget (softly deprecated in Genesis 1.9)
	unregister_widget( 'Genesis_Latest_Tweets_Widget' );

	// Remove Featured Page widget
	unregister_widget( 'Genesis_Featured_Page' );

	// Remove Featured Post widget
	// Don't do if using Genesis Featured Widget Amplified
	unregister_widget( 'Genesis_Featured_Post' );

	// Remove User Profile widget
	unregister_widget( 'Genesis_User_Profile_Widget' );
}
add_action( 'widgets_init', 'fg_remove_genesis_widgets', 20 );

/*
Remove Genesis default page templates
---------------------------------------------------------- */

function fg_remove_genesis_page_templates( $page_templates ) {
	unset( $page_templates['page_archive.php'] );
	unset( $page_templates['page_blog.php'] );
	return $page_templates;
}
add_filter( 'theme_page_templates', 'fg_remove_genesis_page_templates' );


