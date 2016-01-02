<?php
/**
 * Footer.php
 *
 * @package VideoPlace
 * @author  Jacob Martella
 * @version  1.0
 */
?>
					<footer class="footer" role="contentinfo">
						<div id="inner-footer" class="row">
							<div class="footer-info footer-column large-4 medium-4 small-12 columns">
								<img src="<?php site_icon_url(); ?>" />
								<h3 class="footer-text">&copy; <?php echo date('Y'); ?> <?php echo get_bloginfo('name'); ?><br />
								<a href="http://jacobmartella.com/wordpress/wordpress-themes/videoplace-wordpress-theme" target="_blank">VideoPlace Theme</a><br />
								<?php wp_loginout(); ?></h3>
							</div>
							<div class="footer-column large-4 medium-4 small-12 columns">
								<?php if ( is_active_sidebar( 'footer-center' ) ) : ?>

									<?php dynamic_sidebar( 'footer-center' ); ?>

								<?php else : ?>

								<?php endif; ?>
							</div>
							<div class="footer-column large-4 medium-4 small-12 columns">
								<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>

									<?php dynamic_sidebar( 'footer-right' ); ?>

								<?php else : ?>

								<?php endif; ?>
							</div>
						</div> <!-- end #inner-footer -->
					</footer> <!-- end .footer -->
				</div>  <!-- end .main-content -->
			</div> <!-- end .off-canvas-wrapper-inner -->
		</div> <!-- end .off-canvas-wrapper -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->