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
      if ($menu_item->current || $menu_item->current_item_ancestor) {
        $breadcrumbs[] = <<<HTML
        <div class="menuList">
          <div id="$menu_item->title" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            $menu_item->title
          </div>
          <div class="dropdown-menu" aria-labelledby="$menu_item->title">
HTML;
        $mip = $menu_item->menu_item_parent;
        foreach ($menu_items as $mi) {
          if ($mi->menu_item_parent === $mip) {
            $breadcrumbs[] .= <<<HTML
            <a href="$mi->url" class="list">$mi->title</a>
HTML;
          }
        }
        $breadcrumbs[] .= '</div></div>';
      }
    }
    if (empty($breadcrumbs) && !empty($post)) {
      foreach ($menu_items as $menu_item) {
        if ($menu_item->object === $post->post_type) {
          $title = get_the_title($menu_item->menu_item_parent);
          $breadcrumbs[] = <<<HTML
          <div class="menuList">
            <div id="$title" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              $title
            </div>
            <div class="dropdown-menu" aria-labelledby="$title">
HTML;
          $mip = $menu_item->menu_item_parent;
          foreach ($menu_items as $mii) {
            if ($mii->ID === $mip) {
              $mip = $mii->menu_item_parent;
              break;
            }
          }
          foreach ($menu_items as $mi) {
            if ($mi->menu_item_parent === $mip) {
              $breadcrumbs[] .= <<<HTML
              <a href="$mi->url" class="list">$mi->title</a>
HTML;
            }
          }
          $breadcrumbs[] .= '</div></div>';

          break;
        }
      }
    }
    if (!empty(get_taxonomies()) && $post->post_type !== 'page' && is_single()) {
      // CPT name
      if (!empty($postType = get_post_type_object(get_post_type($post))) && get_the_terms($post, get_taxonomies())) {
        $title = $postType->labels->singular_name;
        $breadcrumbs[] = <<<HTML
            <div class="menuList">
              <div id="$title" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                $title
              </div>
              <div class="dropdown-menu" aria-labelledby="$title">
HTML;
        $mip = $menu_item->menu_item_parent;
        foreach ($menu_items as $mi) {
          if ($mi->menu_item_parent === $mip) {
            $breadcrumbs[] .= <<<HTML
              <div class="list">$mi->title</div>
HTML;
          }
        }
        $breadcrumbs[] .= '</div></div>';
        // foreach (get_the_terms($post, get_taxonomies()) as $tax) {
        //   if (!empty($tax->name)) {
        //     $breadcrumbs[] = "<span title=\"{$tax->name}\">" . $tax->name . "</span>";
        //   }
        // }
      }
    }
    echo implode($separator, $breadcrumbs);
  }
}
