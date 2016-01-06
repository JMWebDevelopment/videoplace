<?php
/**
 * Archive.php
 *
 * @package VideoPlace
 * @author  Jacob Martella
 * @version  1.0
 */
?>
<?php get_header(); ?>
			
	<div id="content">
	
		<div id="inner-content" class="row">
		
		    <main id="main" class="large-8 medium-12 small-12 columns" role="main">
			    
		    	<header>
		    		<h1 class="archive-title"><?php the_archive_title();?></h1>
		    	</header>
		
		    	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			 
					<!-- To see additional archive styles, visit the /parts directory -->
				    <article id="post-<?php the_ID(); ?>" <?php post_class('archive-video-post'); ?>>
					    <h5 class="post-category"><?php $cats = get_the_category(); echo $cats[0]->name; ?></h5>
					    <?php echo videoplace_get_first_embed_media($post->ID); ?>
					    <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					    <div class="post-details clearfix">
						    <?php echo get_avatar( get_the_author_meta( 'ID' ), 50 ); ?>
						    <h4 class="post-detail"><?php echo __('Posted by ', 'videoplace'); the_author_posts_link(); echo __(' on ', 'videoplace'); the_date('F j, Y'); ?></h4>
					    </div>
					    <a href="<?php the_permalink(); ?>" class="button white"><?php _e('View More Info', 'videoplace'); ?></a>
				    </article>
				    
				<?php endwhile; ?>	

					<?php videoplace_page_navi(); ?>
						
				<?php endif; ?>
		
			</main> <!-- end #main -->
	
			<?php get_sidebar(); ?>
	    
	    </div> <!-- end #inner-content -->
	    
	</div> <!-- end #content -->

<?php get_footer(); ?>