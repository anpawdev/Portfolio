<?php

function cstw_scripts() {
	wp_enqueue_style( 'cs-style', get_stylesheet_uri(), array(), CSTW_VERSION );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cstw_scripts' );
