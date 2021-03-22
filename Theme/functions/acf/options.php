<?php

/**
 * ACF Options 활성화
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page(array(
    'page_title'   => 'equipment_util',
    'menu_title'   => 'equipment_util',
    'parent_slug'  => 'edit.php?post_type=equipment_util',
  ));
  acf_add_options_sub_page(array(
    'page_title'   => 'equipment',
    'menu_title'   => 'equipment',
    'parent_slug'  => 'edit.php?post_type=equipment',
  ));
  acf_add_options_sub_page(array(
    'page_title'   => 'equipment-solution',
    'menu_title'   => 'equipment-solution',
    'parent_slug'  => 'edit.php?post_type=equipment-solution',
  ));
  acf_add_options_sub_page(array(
    'page_title'   => 'equipment-battery',
    'menu_title'   => 'equipment-battery',
    'parent_slug'  => 'edit.php?post_type=equipment',
  ));
  acf_add_options_sub_page(array(
    'page_title'   => 'news',
    'menu_title'   => 'news',
    'parent_slug'  => 'edit.php?post_type=news',
  ));
  acf_add_options_sub_page(array(
    'page_title'   => 'history',
    'menu_title'   => 'history',
    'parent_slug'  => 'edit.php?post_type=history',
  ));
  acf_add_options_sub_page(array(
    'page_title'   => 'recruitment',
    'menu_title'   => 'recruitment',
    'parent_slug'  => 'edit.php?post_type=recruitment',
  ));
}
