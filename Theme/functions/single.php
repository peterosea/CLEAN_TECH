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
      if ($t->slug === 'battery') {
        $single_template =  get_stylesheet_directory() . '/template-single/equipment_battery.php';
      }
    }
    // if (get_post_meta($post->ID, '_wp_page_template', true) !== '') {
    //   $single_template = get_stylesheet_directory() . '/' . get_post_meta($post->ID, '_wp_page_template', true);
    // }
  }
  if ('equipment-solution' === $post->post_type) {
    $single_template =  get_stylesheet_directory() . '/template-single/equipment_solution.php';
  }
  if ('news' === $post->post_type) {
    $single_template =  get_stylesheet_directory() . '/template-single/news.php';
  }
  if ('history' === $post->post_type) {
    $single_template =  get_stylesheet_directory() . '/template-single/history.php';
  }
  return $single_template;
}
add_filter('single_template', 'get_new_single_template', 999);
