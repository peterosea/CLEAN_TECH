<?php

/**
 * comment
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function admin_style()
{
  wp_enqueue_style('admin_style', get_home_url() . '/wp-content/themes/base/admin.css');
}
add_action('admin_enqueue_scripts', 'admin_style');
