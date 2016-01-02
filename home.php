<?php
/**
 * Home.php
 *
 * @package ***Theme Name***
 * @author  Jacob Martella
 * @version  1.0
 */
?>
<?php get_header(); ?>

	<div id="content">

		<div class="row" id="top-post">
			<?php
				$top_post_args = array(
					'posts_per_page' => 1,
					'ignore_sticky_posts' => true
				);
				$top_post = new WP_Query($top_post_args);
				if ($top_post->have_posts()) : while ($top_post->have_posts()) : $top_post->the_post(); $do_not_duplicate[] = $post->ID;
			?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="large-7 medium-7 small-12 columns">
						<?php echo videoplace_get_first_embed_media($post->ID); ?>
					</div>
					<div class="details large-5 medium-5 small-12 columns">
						<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="post-details clearfix">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
							<h4 class="post-detail"><?php echo __('Posted by ', 'videoplace') . get_the_author_link() . __(' on ', 'videoplace') . get_the_date('F j, Y'); ?></h4>
						</div>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="button white"><?php _e('Read More', 'videoplace'); ?></a>
					</div>
				</article>
			<?php endwhile; endif; ?>
		</div>

		<div id="inner-content" class="row">

			<div class="home-posts large-8 medium-8 small-12 columns">
				<?php
					$home_args = array(
						'posts_per_page' => 10,
						'post__not_in' => $do_not_duplicate
					);
					$home_posts = new WP_Query($home_args);
					if ($home_posts->have_posts()) : while ($home_posts->have_posts()) : $home_posts->the_post();
				?>
					<article id="post-<?php the_ID(); ?>" <?php post_class('video-post'); ?>>
						<h5 class="post-category"><?php $cats = get_the_category(); echo $cats[0]->name; ?></h5>
						<?php echo videoplace_get_first_embed_media($post->ID); ?>
						<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<div class="post-details clearfix">
							<?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
							<h4 class="post-detail"><?php echo __('Posted by ', 'videoplace') . get_the_author_link() . __(' on ', 'videoplace') . get_the_date('F j, Y'); ?></h4>
						</div>
						<a href="<?php the_permalink(); ?>" class="button white"><?php _e('View More Info', 'videoplace'); ?></a>
					</article>
				<?php endwhile; endif; ?>
			</div>

			<?php get_sidebar(); ?>

		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>