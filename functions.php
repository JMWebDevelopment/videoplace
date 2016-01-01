<?php
/**
 * functions.php
 *
 * @package **Theme Name**
 * @author Jacob Martella
 * @version 1.0
 */
/**
 * Table of Contents
 * I. General Functions
 * II. Header Functions
 * III. Home Functions
 * IV. Footer Functions
 * V. Single Post Functions
 * VI. Archive Functions
 * VII. Author Functions
 * VIII. Comments Functions
 * IX. Other Functions
 */
/**
 ******************** I. General Functions *********************************
 */
/**
 * Enqueue the necessary scripts
 */
function theme_slug_scripts() {
	global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

	//* Load What-Input files in footer
	wp_enqueue_script( 'videoplace-what-input', get_template_directory_uri() . '/vendor/what-input/what-input.min.js', array(), '', true );

	//* Adding Foundation scripts file in the footer
	wp_enqueue_script( 'videoplace-foundation-js', get_template_directory_uri() . '/assets/js/foundation.min.js', array( 'jquery' ), '6.0', true );

	//* Adding scripts file in the footer
	wp_enqueue_script( 'videoplace-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

	//* Enqueue the Roboto, Roboto Slab and Playfiar Display fonts
	wp_enqueue_style( 'videoplace-roboto', '//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700', array(), '', 'all' );
	wp_enqueue_style( 'videoplace-roboto-slab', '//fonts.googleapis.com/css?family=Roboto+Slab:400,300,700', array(), '', 'all' );
	wp_enqueue_style( 'videoplace-playfair-display', '//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700', array(), '', 'all' );

	//* Register main stylesheet
	wp_enqueue_style( 'videoplace-css', get_template_directory_uri() . '/style.css', array(), '', 'all' );

	//* Comment reply script for threaded comments
	if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action('wp_enqueue_scripts', 'theme_slug_scripts', 999);
/**
 * Add in theme supports
 */
function theme_slug_theme_support() {

	//* Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	//* Default thumbnail size
	set_post_thumbnail_size(125, 125, true);

	//* Add RSS Support
	add_theme_support( 'automatic-feed-links' );

	//* Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );

	//* Add HTML5 Support
	add_theme_support( 'html5',
		array(
			'comment-list',
			'comment-form',
			'search-form',
		)
	);

	//* Add the Editor Stylesheet
	add_editor_style('assets/css/editor-styles.css');

	//* Add support for custom background
	$args = array(
			'default-color' => '252525',
	);
	add_theme_support( 'custom-background', $args );

	//* Add Support for Custom Header
	$args = array(
			'flex-width' 	=> true,
			'width'	=> 1000,
			'flex-height'	=> true,
			'height'	=> 250,
			'default-image' => '',
			'default-text-color' => '777777',
			'upload'	=> true,
	);
	add_theme_support('custom-header', $args);

	//* Add Support for Translation
	load_theme_textdomain( 'theme-slug', get_template_directory() .'/assets/translation' );

	//* Adding post format support
	/* add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); */
}
add_action('after_setup_theme','theme_slug_theme_support', 16);
/**
 * Include theme options
 */
require('assets/functions/theme-options.php');
/**
 * Include custom functions
 */
require('assets/functions/menu-walkers.php');
/**
 * Register Sidebar
 */
function theme_slug_register_sidebars() {
	register_sidebar(array(
			'id' => 'sidebar1',
			'name' => __('Sidebar', 'videoplace'),
			'description' => __('The primary sidebar.', 'videoplace'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widgettitle">',
			'after_title' => '</h4>',
	));
}
add_action( 'widgets_init', 'theme_slug_register_sidebars' );
/**
 ******************** II. Header Functions *********************************
 */
/**
 * Register Menus
 */
register_nav_menus(
		array(
				'main-nav' => __( 'Main Menu', 'videoplace' ),   // Main nav in header
				'footer-links' => __( 'Footer Links', 'videoplace' ) // Secondary nav in footer
		)
);
/**
 ******************** III. Home Functions *********************************
 */
/**
 ******************** IV. Footer Functions *********************************
 */
/**
 ******************** V. Single Post Functions *********************************
 */
/**
 ******************** VI. Archive Functions *********************************
 */
/**
 * Numeric Archive Page Navigation
 */
function theme_slug_page_navi($before = '', $after = '') {
	global $wpdb, $wp_query;
	$request = $wp_query->request;
	$posts_per_page = intval(get_query_var('posts_per_page'));
	$paged = intval(get_query_var('paged'));
	$numposts = $wp_query->found_posts;
	$max_page = $wp_query->max_num_pages;
	if ( $numposts <= $posts_per_page ) { return; }
	if(empty($paged) || $paged == 0) {
		$paged = 1;
	}
	$pages_to_show = 7;
	$pages_to_show_minus_1 = $pages_to_show-1;
	$half_page_start = floor($pages_to_show_minus_1/2);
	$half_page_end = ceil($pages_to_show_minus_1/2);
	$start_page = $paged - $half_page_start;
	if($start_page <= 0) {
		$start_page = 1;
	}
	$end_page = $paged + $half_page_end;
	if(($end_page - $start_page) != $pages_to_show_minus_1) {
		$end_page = $start_page + $pages_to_show_minus_1;
	}
	if($end_page > $max_page) {
		$start_page = $max_page - $pages_to_show_minus_1;
		$end_page = $max_page;
	}
	if($start_page <= 0) {
		$start_page = 1;
	}
	echo $before.'<nav class="page-navigation"><ul class="pagination">'."";
	if ($start_page >= 2 && $pages_to_show < $max_page) {
		$first_page_text = __( "First", 'theme-slug' );
		echo '<li><a href="'.get_pagenum_link().'" title="'.$first_page_text.'">'.$first_page_text.'</a></li>';
	}
	echo '<li>';
	previous_posts_link('Previous');
	echo '</li>';
	for($i = $start_page; $i  <= $end_page; $i++) {
		if($i == $paged) {
			echo '<li class="current"> '.$i.' </li>';
		} else {
			echo '<li><a href="'.get_pagenum_link($i).'">'.$i.'</a></li>';
		}
	}
	echo '<li>';
	next_posts_link('Next');
	echo '</li>';
	if ($end_page < $max_page) {
		$last_page_text = __( "Last", 'theme-slug' );
		echo '<li><a href="'.get_pagenum_link($max_page).'" title="'.$last_page_text.'">'.$last_page_text.'</a></li>';
	}
	echo '</ul></nav>'.$after."";
}
/**
 ******************** VII. Author Functions *********************************
 */
/**
 ******************** VIII. Comments Functions *********************************
 */
function theme_slug_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
<li <?php comment_class('panel'); ?>>
	<div class="media-object">
		<div class="media-object-section">
			<?php echo get_avatar( $comment, 75 ); ?>
		</div>
		<div class="media-object-section">
			<article id="comment-<?php comment_ID(); ?>" class="clearfix large-12 columns">
				<header class="comment-author">
					<?php
					// create variable
					$bgauthemail = get_comment_author_email();
					?>
					<?php printf(__('%s', 'theme-slug'), get_comment_author_link()) ?> on
					<time datetime="<?php echo comment_time('Y-m-j'); ?>"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php comment_time(__(' F jS, Y - g:ia', 'theme-slug')); ?> </a></time>
					<?php edit_comment_link(__('(Edit)', 'theme-slug'),'  ','') ?>
				</header>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="alert alert-info">
						<p><?php _e('Your comment is awaiting moderation.', 'theme-slug') ?></p>
					</div>
				<?php endif; ?>
				<section class="comment_content clearfix">
					<?php comment_text() ?>
				</section>
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
			</article>
		</div>
	</div>
	<!-- </li> is added by WordPress automatically -->
	<?php
}
/**
 ******************** IX. Other Functions *********************************
 */