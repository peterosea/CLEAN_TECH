<?php
function themeslug_enqueue()
{
  wp_enqueue_script('fontawsome', 'https://kit.fontawesome.com/a99f480b85.js', array(), null, false);
}
add_action('wp_enqueue_scripts', 'themeslug_enqueue');
