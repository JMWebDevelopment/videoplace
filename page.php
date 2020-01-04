<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-content' );

?>
	<main id="primary" class="site-main">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class( 'page-post' ); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

				<?php if ( hybrid_media_grabber() ) { ?>
					<header class="article-header">
						<?php echo hybrid_media_grabber(); ?>
						<?php if ( has_post_thumbnail() ) { ?>
							<div class="videoplace-featured-image">
								<?php the_post_thumbnail('videoplace-featured-image'); ?>
							</div>
						<? } ?>
					</header> <!-- end article header -->
				<?php } ?>

				<section class="entry-content" itemprop="articleBody">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<?php wp_link_pages(); ?>
				</section> <!-- end article section -->

				<?php comments_template(); ?>

			</article> <!-- end article -->

		<?php endwhile; endif; ?>

	</main><!-- #primary -->
<?php
get_sidebar();
get_footer();
