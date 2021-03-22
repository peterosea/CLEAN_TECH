<?php

/**
 * Archive 템플릿 지정
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function get_new_archive_template($archive_template)
{
  global $post;
  if (empty($post)) return;
  if ($post->post_type === 'equipment_util') {
    $archive_template = get_stylesheet_directory() . '/template-archive/equipment_util.php';
  }
  if ($post->post_type === 'equipment-solution') {
    $archive_template = get_stylesheet_directory() . '/template-archive/equipment_solution.php';
  }
  if ($post->post_type === 'equipment') {
    $archive_template = get_stylesheet_directory() . '/template-archive/equipment.php';
  }
  if ($post->post_type === 'news') {
    $archive_template = get_stylesheet_directory() . '/template-archive/news.php';
  }
  if ($post->post_type === 'history') {
    $archive_template = get_stylesheet_directory() . '/template-archive/history.php';
  }
  if ($post->post_type === 'recruitment') {
    $archive_template = get_stylesheet_directory() . '/template-archive/recruitment.php';
  }
  return $archive_template;
}
add_filter('archive_template', 'get_new_archive_template');
