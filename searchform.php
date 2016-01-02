<?php
/**
 * Searchform.php
 *
 * @package ***Theme Name***
 * @author  Jacob Martella
 * @version  1.0
 */
?>
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'videoplace' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'videoplace' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'videoplace' ) ?>" />
	</label>
	<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'videoplace' ) ?>" />
</form>