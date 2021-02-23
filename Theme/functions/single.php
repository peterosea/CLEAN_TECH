<?php

/**
 * 각 포스트타입 단일 포스트 상세페이지 템플릿 설정
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function get_new_single_template($single_template)
{
  global $post;
  if ('equipment_util' === $post->post_type) {
    $single_template =  get_stylesheet_directory() . '/template-single/equipment_util.php';
  }
  if ('equipment' === $post->post_type) {
    $single_template =  get_stylesheet_directory() . '/template-single/equipment.php';
    foreach (get_the_terms($post, get_taxonomies()) as $t) {
      var_dump($t->slug);
      if ($t->slug === 'battery-charger') {
        $single_template =  get_stylesheet_directory() . '/template-single/equipment_battery.php';
      }
    }
  }
  if ('equipment-solution' === $post->post_type) {
    $single_template =  get_stylesheet_directory() . '/template-single/equipment_solution.php';
  }
  return $single_template;
}
add_filter('single_template', 'get_new_single_template');
