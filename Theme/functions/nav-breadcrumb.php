<?php

/**
 * comment
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function my_menu_breadcrumb($theme_location = 'GNB', $separator = ' &gt; ')
{
  global $post;
  $menu = wp_get_nav_menu_object($theme_location);
  if (isset($menu)) {
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    _wp_menu_item_classes_by_context($menu_items);
    $breadcrumbs = array();

    foreach ($menu_items as $menu_item) {
      if ($menu_item->current) {
        $breadcrumbs[] = "<span title=\"{$menu_item->title}\">{$menu_item->title}</span>";
      } else if ($menu_item->current_item_ancestor) {
        $breadcrumbs[] = "<a href=\"{$menu_item->url}\" title=\"{$menu_item->title}\">{$menu_item->title}</a>";
      }
    }
    if (empty($breadcrumbs) && !empty($post)) {
      foreach ($menu_items as $menu_item) {
        if ($menu_item->object === $post->post_type) {
          $title = get_the_title($menu_item->menu_item_parent);
          $breadcrumbs[] = "<span title=\"{$title}\">" . $title . "</span>";
          break;
        }
      }
    }
    if (!empty(get_taxonomies()) && $post->post_type !== 'page' && is_single()) {
      // CPT name
      if ($postType = get_post_type_object(get_post_type($post))) {
        $breadcrumbs[] = "<span title=\"{$postType->labels->singular_name}\">" . $postType->labels->singular_name . "</span>";
        $taxo = get_the_terms($post, get_taxonomies());
        foreach ($taxo as $tax) {
          $breadcrumbs[] = "<span title=\"{$tax->name}\">" . $tax->name . "</span>";
        }
      }
    }
    echo implode($separator, $breadcrumbs);
  }
}
