<?php
/**
 * Archive.php
 *
 * @package ***Theme Name***
 * @author  Jacob Martella
 * @version  1.0
 */
?>
<?php get_header(); ?>
			
	<div id="content">

		<div id="inner-content" class="row">
	
			<main id="main" class="large-8 medium-8 columns" role="main">

				<article id="content-not-found">
				
					<header class="article-header">
						<h1><?php _e("404", "videoplace"); ?></h1>
					</header> <!-- end article header -->
			
					<section class="entry-content">
						<h3><?php _e("Whoops! Content not found!", "videoplace"); ?></h3>
						<p><?php _e("We’re terribly sorry, but we couldn’t find what you were looking for. It might have been removed. We suggesting going to the home page or using the search form to look through our content. In the meantime, here’s one of our amazing videos!", "videoplace"); ?></p>
					</section> <!-- end article section -->

					<section class="search">
					    <p><?php get_search_form(); ?></p>
					</section> <!-- end search section -->
			
				</article> <!-- end article -->

				<?php
				$home_args = array(
						'posts_per_page' => 1,
						'orderby' => 'rand'
				);
				$home_posts = new WP_Query($home_args);
				if ($home_posts->have_posts()) : while ($home_posts->have_posts()) : $home_posts->the_post();
					?>
					<?php echo videoplace_get_first_embed_media($post->ID); ?>
				<?php endwhile; endif; ?>
	
			</main> <!-- end #main -->

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>