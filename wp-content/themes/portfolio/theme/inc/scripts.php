<?php

function cs_scripts()
{
  wp_enqueue_script('cs-script', get_template_directory_uri() . '/js/script.min.js', array(), CSTW_VERSION, true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}
add_action('wp_enqueue_scripts', 'cs_scripts');
