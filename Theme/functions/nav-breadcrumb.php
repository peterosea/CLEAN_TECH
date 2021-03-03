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
        $title = $menu_item->title;
        $breadcrumbs[] = <<<HTML
        <div class="menuList">
          <div id="$title" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            $title
          </div>
          <div class="dropdown-menu" aria-labelledby="$title">
HTML;
        $mip = $menu_item->menu_item_parent;
        foreach ($menu_items as $mi) {
          if ($mi->menu_item_parent === $mip && $mi->title !== $title) {
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
            if ($mii->ID == $mip) {
              $mip = $mii->menu_item_parent;
              break;
            }
          }
          foreach ($menu_items as $mi) {
            if ($mi->menu_item_parent === $mip && $mi->title !== $title) {
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

    // 페이지가 아닌 각 포스트타입의 싱글 페이지에서 보여지는 메뉴
    if (!empty(get_taxonomies()) && $post->post_type !== 'page' && is_single()) {
      if (!empty($postType = get_post_type_object(get_post_type($post))) && get_the_terms($post, get_taxonomies())) {
        // CPT name
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
          if ($mi->menu_item_parent === $mip && $mi->title !== $title) {
            $breadcrumbs[] .= <<<HTML
              <a href="$mi->url" class="list">$mi->title</a>
HTML;
          }
        }
        $breadcrumbs[] .= '</div></div>';

        // 해당 포스트 타입의 텍소노미 리스트 가져오기 각 싱글 페이지
        $tax = get_the_terms($post, get_taxonomies()[$post->post_type . '_cat'])[0];
        if (!empty($tax->name)) {
          $termsAgs = array(
            'taxonomy' =>  get_taxonomies()[$post->post_type . '_cat'],
            'hide_empty' => 1,
          );
          foreach (get_terms($termsAgs) as $term) {
            if ($tax->parent === $term->term_id) $breadcrumbs[] .= DropMenu($term);
          }
          $breadcrumbs[] .= DropMenu($tax);
        }
      }
    }
    echo implode($separator, $breadcrumbs);
  }
}

function DropMenu($tax)
{
  global $post;
  $title = $tax->name;
  $breadcrumbs = <<<HTML
  <div class="menuList">
    <div id="$title" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      $title
    </div>
    <div class="dropdown-menu" aria-labelledby="$title">
HTML;
  // 포스트타입의 텍소노미를 기준으로 각 텀리스트 노출
  $termsAgs = array(
    'taxonomy' =>  get_taxonomies()[$post->post_type . '_cat'],
    'hide_empty' => 1,
    'parent' => $tax->parent,
  );
  foreach (get_terms($termsAgs) as $gt2) {
    // 현재 텀이 계층에서 형제요소가있다면 현재 텀은 리스트에서 제외하기
    if ($tax->name === $gt2->name && count(get_terms($termsAgs)) > 1) continue;
    $breadcrumbs .= <<<HTML
    <a href="/$post->post_type#$gt2->slug" class="list">$gt2->name</a>
HTML;
  }
  $breadcrumbs .= <<<HTML
    </div>
  </div>
HTML;
  return $breadcrumbs;
}
