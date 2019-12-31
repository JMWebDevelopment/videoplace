<?php
/**
 * Template part for displaying the footer info
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="site-info">
	<div class="footer-info footer-column large-4 medium-4 small-12 columns">
		<?php if ( function_exists( 'the_custom_logo' ) ) {
			the_custom_logo();
		} ?>
		<h3 class="footer-text">&copy; <?php echo date( 'Y' ); ?> <?php echo get_bloginfo( 'name' ); ?><br />
			<?php _e( 'VideoPlace Theme', 'videoplace' ); ?><br />
			<?php wp_loginout(); ?></h3>
	</div>
	<div class="footer-column large-4 medium-4 small-12 columns">
		<?php if ( is_active_sidebar( 'footer-center' ) ) : ?>

			<?php dynamic_sidebar( 'footer-center' ); ?>

		<?php endif; ?>
	</div>
	<div class="footer-column large-4 medium-4 small-12 columns">
		<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>

			<?php dynamic_sidebar( 'footer-right' ); ?>

		<?php endif; ?>
	</div>
</div><!-- .site-info -->
