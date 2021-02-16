<?php

/**
 * comment
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
  <div class="section section1">
    <div class="container">
      <div class="menuWrap">
        <ul class="accordionMenu">
          <?php
          $cat = get_terms(array('taxonomy' => 'equipment_util_cat', 'hide_empty' => false));
          foreach ($cat as $key => $c) {
            $class = '';
            if ($c->count === 0) $class .= ' disable';
            if ($key === 0) $class .= ' active';
            echo <<<HTML
            <li id="$c->slug" class="$class">$c->name</li>
HTML;
          }
          ?>
        </ul>
      </div>
      <div class="accordionContent">
        <?php
        foreach ($cat as $key => $c) {
          $class = '';
          if ($key === 0) $class .= ' active';
          $dom = '<div id="' . $c->slug . '" class="itemList style2 ' . $c->slug . ' ' . $class . '">';
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
              $dom .= <<<HTML
              <div class="item">
                <div class="imgWrap">
                  <img src="$thumb" alt="">
                </div>
                <div class="title">$post->post_title</div>
                <p>$post->post_excerpt</p>
              </div>
HTML;
            }
          } else {
            $dom .= <<<HTML
            포스트가 없습니다.
HTML;
          }
          $dom .= '</div>';
          echo $dom;
        }
        ?>
      </div>
      <script>
        // const control = document.querySelectorAll('.accordionMenu li');
        // const target = document.querySelectorAll('.accordionContent .itemList');
        // control.forEach(c => {
        //   c.addEventListener('click', () => {
        //     control.forEach(cc => cc.classList.remove('active'));
        //     target.forEach(t => {
        //       t.classList.remove('active');
        //       if (t.id === c.id) {
        //         t.classList.add('active');
        //       }
        //     });
        //     c.classList.add('active');
        //   })
        // })
        "use strict";

        var control = document.querySelectorAll('.accordionMenu li');
        var target = document.querySelectorAll('.accordionContent .itemList');
        control.forEach(function(c) {
          c.addEventListener('click', function() {
            control.forEach(function(cc) {
              return cc.classList.remove('active');
            });
            target.forEach(function(t) {
              t.classList.remove('active');

              if (t.id === c.id) {
                t.classList.add('active');
              }
            });
            c.classList.add('active');
          });
        });
      </script>
    </div>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
