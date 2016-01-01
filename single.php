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

		<main id="main" class="large-8 medium-8 columns" role="main">
		
		    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

				    <header class="article-header">
					    <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
					    <p class="byline">
						    Posted on <?php the_time('F j, Y') ?> by <?php the_author_posts_link(); ?>  - <?php the_category(', ') ?>
					    </p>
				    </header> <!-- end article header -->

				    <section class="entry-content" itemprop="articleBody">
					    <?php the_post_thumbnail('full'); ?>
					    <?php the_content(); ?>
				    </section> <!-- end article section -->

				    <footer class="article-footer">
					    <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'theme-slug') . '</span> ', ', ', ''); ?></p>	</footer> <!-- end article footer -->

				    <?php comments_template(); ?>

			    </article> <!-- end article -->
		    	
		    <?php endwhile;?>

		    <?php endif; ?>

		</main> <!-- end #main -->

		<?php get_sidebar(); ?>

	</div> <!-- end #inner-content -->

</div> <!-- end #content -->

<?php get_footer(); ?>