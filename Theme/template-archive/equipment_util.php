<?php

/**
 * 장비 활용
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_header();
get_template_part('template-parts/header/page-archive');
?>
<main class="pageTemplate equipmentUtil">

  <?php
  $cat = get_terms(array('taxonomy' => 'equipment_util_cat', 'hide_empty' => false));
  foreach ($cat as $key => $c) : ?>
    <div class="section section<?php echo $key + 1 ?>" id="accordion<?php echo $key ?>">
      <div class="container">
        <div class="menuWrap">
          <div class="accordionMenu">
            <?php
            foreach ($cat as $key2 => $c2) {
              $class = '';
              if ($c2->parent !== 0) continue;
              if ($c2->count === 0) $class .= ' disable';
              if ($key2 === $key) $class .= ' active';
              echo <<<HTML
              <a href="#accordion$key2" id="$c2->slug" class="listitem $class">$c2->name</a>
HTML;
            }
            ?>
          </div>
        </div>
        <div class="accordionContent">
          <?php
          $class = '';
          $dom = '<div id="' . $c->slug . '" class="itemList style2 ' . $c->slug . ' active">';
          $dom .= <<<HTML
          <div class="listContent">
            <div class="listTitle">$c->name</div>
            <div class="description">$c->description</div>
          </div>
HTML;
          $custom_query = get_posts(array(
            'post_type' => 'equipment_util',
            'post_status' => 'publish',
            'numberposts' => 999,
            'tax_query' => array(
              array(
                'taxonomy' => 'equipment_util_cat',
                'field' => 'slug',
                'terms' => $c->slug
              )
            ),
          ));
          if (!empty($custom_query)) {
            foreach ($custom_query as $post) {
              $thumb = get_the_post_thumbnail_url($post, 'full');
              $pmlink = get_the_permalink($post);
              $dom .= <<<HTML
              <div class="item">
                <div class="imgWrap">
                  <img src="$thumb" alt="">
                </div>
                <a href="$pmlink" class="title">$post->post_title</a>
                <p>$post->post_excerpt</p>
              </div>
HTML;
            }
          } else {
            $dom .= <<<HTML
            <div class="empty">포스트가 없습니다.</div>
HTML;
          }
          $dom .= '</div>';
          echo $dom;
          ?>
        </div>
      </div>
    </div>
  <?php endforeach ?>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
