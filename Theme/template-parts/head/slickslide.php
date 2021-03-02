<?php

/**
 * slick slide
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function slickslide_95d7e4dc_3f72_40b6_ac87_b13f8bc8d2f1()
{
?>
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/slick.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri() ?>/assets/slick-theme.css" />
<?php
}
add_action('wp_head', 'slickslide_95d7e4dc_3f72_40b6_ac87_b13f8bc8d2f1');

function slickslide_95d7e4dc_3f72_40b6_ac87_b13f8bc8d2f2()
{
?>
  <script type="text/javascript" src="<?php echo get_stylesheet_directory_uri() ?>/assets/slick.min.js"></script>
<?php
}
add_action('wp_body_open', 'slickslide_95d7e4dc_3f72_40b6_ac87_b13f8bc8d2f2');
