<?php
/**
 * ------------------------------------------------------------------------
 * Theme's Custom Image Sizes
 * ------------------------------------------------------------------------
 * This file is for registering custom image
 * sizes for using as for thumbnails.
 */

if ( ! function_exists( 'cs_register_thumbnails' ) ) {
	/**
	 * Registers theme's additional thumbnail sizes.
	 *
	 * @todo Change function prefix to your textdomain.
	 * @todo Update prefix in the hook function and if statement.
	 *
	 * @return void
	 */
	function cs_register_thumbnails() {
		add_image_size('product', 160, 216, true);
		add_image_size('post-short-image', 368, 329, true);
		add_image_size('post-parents_image', 125, 125, true);
		add_image_size('homepage_image', 200, 200, true);
		add_image_size('post_thumbnail', 216, 140, true);
	}
}
add_action( 'after_setup_theme', 'cs_register_thumbnails' );
