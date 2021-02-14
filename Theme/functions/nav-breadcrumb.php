<?php

/**
 * comment
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

function my_menu_breadcrumb($theme_location = 'menu-1', $separator = ' &gt; ')
{
  $locations = get_nav_menu_locations();
  if (isset($locations[$theme_location])) {
    $menu = wp_get_nav_menu_object($locations[$theme_location]);
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
    echo implode($separator, $breadcrumbs);
  }
}
