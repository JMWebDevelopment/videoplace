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
			    
		    	<header>
		    		<h1 class="page-title"><?php the_archive_title();?></h1>
		    	</header>
		
		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
				    <article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
					    <header class="article-header">
						    <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
						    <p class="byline">
							    Posted on <?php the_time('F j, Y') ?> by <?php the_author_posts_link(); ?>  - <?php the_category(', ') ?>
						    </p>
					    </header> <!-- end article header -->

					    <section class="entry-content" itemprop="articleBody">
						    <a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a>
						    <?php the_excerpt(); ?>
					    </section> <!-- end article section -->

					    <footer class="article-footer">
						    <p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'videoplace') . '</span> ', ', ', ''); ?></p>
					    </footer> <!-- end article footer -->
				    </article> <!-- end article -->
				    
				<?php endwhile; ?>	

					<?php videoplace_page_navi(); ?>
						
				<?php endif; ?>
		
			</main> <!-- end #main -->
	
			<?php get_sidebar(); ?>
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>