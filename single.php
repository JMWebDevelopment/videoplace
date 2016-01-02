<?php
/**
 * single.php
 *
 * @package ***Theme Name***
 * @author  Jacob Martella
 * @version  1.0
 */
?>
<?php get_header(); ?>
			
<div id="content">

	<div id="inner-content" class="row">

		<main id="main" class="large-12 medium-12 columns" role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    <article id="post-<?php the_ID(); ?>" <?php post_class('row video-top'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				    <div class="video large-8 medium-8 small-12 columns">
				        <?php echo videoplace_get_first_embed_media($post->ID); ?>
				    </div>

				    <div class="large-4 medium-4 small-12 columns article-details">
					    <header class="article-header">
						    <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
						    <div class="post-details clearfix">
							    <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
							    <h4 class="post-detail"><?php echo __('Posted by ', 'videoplace') . get_the_author_link() . __(' on ', 'videoplace') . get_the_date('F j, Y'); ?></h4>
						    </div>
						    <?php the_excerpt(); ?>
						    <p class="tags"><?php the_tags('<span class="the-tag">', '</span><span class="the-tag">', '</span>'); ?></p>	</footer> <!-- end article footer -->
					    </header> <!-- end article header -->
				    </div>


			    </article> <!-- end article -->

			    <div class="row">
				    <div class="post-more large-8 medium-8 small-12 columns">
					    <section class="entry-content" itemprop="articleBody">
						    <?php the_post_thumbnail('full'); ?>
						    <?php echo videoplace_get_content($post->ID); ?>
					    </section> <!-- end article section -->

					    <?php comments_template(); ?>

					    <?php videoplace_related_posts(); ?>

				    </div>
		    	
		    <?php endwhile;?>

		    <?php endif; ?>

				    <?php get_sidebar(); ?>

			    </div>

		</main> <!-- end #main -->


	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>