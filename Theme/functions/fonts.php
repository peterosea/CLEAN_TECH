<?php

/**
 * Google Fonts and Site all font
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function fonts()
{
  wp_enqueue_style('google-fonts-1', 'https://fonts.gstatic.com', array(), null, false);
  wp_enqueue_style('google-fonts-2', 'https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100;300;400;500;700;900&family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap', array(), null, false);
}
add_action('wp_enqueue_scripts', 'fonts');
