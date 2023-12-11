<?php

// allow using SVG
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  $mimes['ai'] = 'application/postscript';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

// disable some scripts while on the localhost
function ct_is_staging(){
  if($_SERVER['HTTP_HOST'] == 'localhost'){
    return true;
  }
  return false;
}