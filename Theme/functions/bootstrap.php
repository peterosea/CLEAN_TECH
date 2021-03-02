<?php

/**
 * Bootstrap
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function themeslug_enqueue_5f482825_0bfe_4f87_9ce7_aaee698a1698_head()
{
?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/bootstrap.min.css">
  <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/jquery-3.5.1.slim.min.js"></script>
<?php
}
add_action('wp_head', 'themeslug_enqueue_5f482825_0bfe_4f87_9ce7_aaee698a1698_head');

function themeslug_enqueue_5f482825_0bfe_4f87_9ce7_aaee698a1698_footer()
{
?>
  <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/popper.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/bootstrap.min.js"></script>
<?php
}
add_action('wp_body_open', 'themeslug_enqueue_5f482825_0bfe_4f87_9ce7_aaee698a1698_footer');
