<?php
	/**
	 * WP_Rig\WP_Rig\Post_Thumbnails\Component class
	 *
	 * @package wp_rig
	 */

	namespace WP_Rig\WP_Rig\Media_Grabber;

	use WP_Rig\WP_Rig\Component_Interface;
	use function get_theme_file_path;

	/**
	 * Class for managing post thumbnail support.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	class Component implements Component_Interface {

		/**
		 * Gets the unique identifier for the theme component.
		 *
		 * @return string Component slug.
		 */
		public function get_slug() : string {
			return 'media_grabber';
		}

		/**
		 * Adds the action and filter hooks to integrate with WordPress.
		 */
		public function initialize() {
			include get_theme_file_path( '/inc/Media_Grabber/class-media-grabber.php' );
		}

		/**
		 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `wp_rig()`.
		 *
		 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
		 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
		 *               adding support for further arguments in the future.
		 */
		public function template_tags() : array {
			return [
				'media_grabber' => [ $this, 'media_grabber' ],
			];
		}

		public function media_grabber( $args = array() ) {
			$media = new Hybrid_Media_Grabber( $args );
			return $media->get_media();
		}

	}
