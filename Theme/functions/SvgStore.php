<?php

/**
 * Svg store 설정
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function SvgStore()
{
  get_template_part('template-parts/SvgStore');
}
add_action('wp_body_open', 'SvgStore');
