<?php

/**
 * Fullpage
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function fullpage_5f482825_0bfe_4f87_9ce7_aaee698a1698()
{
?>
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() ?>/assets/fullpage.css">
  <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/easings.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/scrolloverflow.min.js"></script>
  <script src="<?php echo get_stylesheet_directory_uri() ?>/assets/fullpage.js"></script>
<?php
}
add_action('wp_head', 'fullpage_5f482825_0bfe_4f87_9ce7_aaee698a1698');

function fullpage_5f482825_0bfe_4f87_9ce7_aaee698a1698_footer()
{
?>
  <script src="<?php echo get_stylesheet_directory_uri() ?>/js/mainFullpage.js"></script>
<?php
}
add_action('wp_footer', 'fullpage_5f482825_0bfe_4f87_9ce7_aaee698a1698_footer');
