<?php
add_filter( 'fg_tb_before_primary_nav', 'fg_top_bar_title', 5 );
function fg_top_bar_title( $top_bar ){
	// TODO: Clean this up more at some point, right now its just pasted in here from foundation docs(along with a special class on the li.name)
	// Let's add more to the top bar
	$top_bar .= '
	<ul class="title-area">
		<li class="name hide-for-medium-up">
		  <h1><a href="#">' .get_bloginfo( 'site_name' ) .'</a></h1>
		</li>
		 <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
		<li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
	  </ul>
	';
	return $top_bar;
}

add_filter( 'genesis_do_nav', 'fg_genesis_do_nav', 10, 3 );
function fg_genesis_do_nav( $nav_output, $nav, $args ) {

	$args = array(
		'theme_location' => 'primary',
		'container'      => false,
		'items_wrap' => '<ul id="%1$s" class="right %2$s">%3$s</ul>',
	  	'menu_class'     => genesis_get_option( 'nav_superfish' ) ? 'menu genesis-nav-menu menu-primary superfish' : 'menu genesis-nav-menu menu-primary',
		'echo'           => 0,

	);
	if ( class_exists( 'Top_Bar_Walker' ) ) :
		$top_bar_walker = new Top_Bar_Walker();
		// Use the custom walker on the primary menu
		$args['walker'] = $top_bar_walker;
	endif;



	$foundation_genesis_nav = '<nav class="top-bar" data-topbar data-options="mobile_show_parent_link: true">';

	// Apply any filters
	$foundation_genesis_nav = apply_filters( 'fg_tb_before_primary_nav', $foundation_genesis_nav );

	// Add the top-bar-section
	$foundation_genesis_nav .= '<section class="top-bar-section">';
	$foundation_genesis_nav .= wp_nav_menu( $args );
	$foundation_genesis_nav .= '</section>';

	// Apply any filters
	$foundation_genesis_nav = apply_filters( 'fg_tb_after_primary_nav' , $foundation_genesis_nav );

	$foundation_genesis_nav .= '</nav>';
	return $foundation_genesis_nav;
}



/**
 * Customized menu output
 */
class Top_Bar_Walker extends Walker_Nav_Menu {
		// add classes to ul sub-menus
	function start_lvl(&$output, $depth = 0, $args = array()) {
		// depth dependent classes
		$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
		// build html
		$output .= "\n" . $indent . '<ul class="dropdown">' . "\n";
	}
}

if ( ! function_exists( 'fg_menu_set_dropdown' ) ) :
	function fg_menu_set_dropdown( $sorted_menu_items, $args ) {
		$last_top = 0;
		foreach ( $sorted_menu_items as $key => $obj ) :
			// it is a top lv item?
			if ( 0 == $obj->menu_item_parent ) :
				// set the key of the parent
				$last_top = $key;
			else :
				$sorted_menu_items[ $last_top ]->classes['dropdown'] = 'has-dropdown';
			endif;
		endforeach;

		return $sorted_menu_items;
	}
endif;
add_filter( 'wp_nav_menu_objects', 'fg_menu_set_dropdown', 10, 2 );