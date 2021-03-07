<?php

/**
 * Template Name: 렌탈 케어
 * Template Post Type: page
 */

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_header();
get_template_part('template-parts/header/page-archive');
?>
<main class="pageTemplate rentalCare">
  <div class="section section1">
    <div class="sectionTitle important">
      <?php echo get_field('title1') ?>
    </div>
    <div class="container">
      <img class="d-none d-md-block" src="<?php echo get_field('img1') ?>" alt="">
      <img class="d-block d-md-none" src="<?php echo get_field('m_img1') ?>" alt="">
    </div>
  </div>
  <div class="section section2">
    <div class="sectionTitle important">
      <?php echo get_field('title2') ?>
      <p>
        <?php echo get_field('desc2') ?>
      </p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-7 order-1 mb-4 mb-md-0">
          <img src="<?php echo get_field('ex_a_img') ?>">
        </div>
        <div class="col-12 col-md-5 order-2 contentCol">
          <div class="title pointColor">사례 A</div>
          <?php echo get_field('ex_a_content') ?>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-5 order-4 order-md-3 contentCol">
          <div class="title pointColor">사례 B</div>
          <?php echo get_field('ex_b_content') ?>
        </div>
        <div class="col-12 col-md-7 order-3 order-md-4  mb-4 mb-md-0">
          <img src="<?php echo get_field('ex_b_img') ?>">
        </div>
      </div>
    </div>
  </div>
  <div class="section section3">
    <div class="container">
      <div class="sectionTitle important">
        <?php echo get_field('title3') ?>
        <p>
          <?php echo get_field('desc3') ?>
        </p>
      </div>
      <div class="menuWrap">
        <ul class="accordionMenu">
          <?php
          $cat = get_terms(array('taxonomy' => 'equipment_cat', 'hide_empty' => false, 'parent' => 0));
          $list = array('습식', '건식', '건습식', '카펫', '광택');

          foreach ($cat as $key => $c) {
            $class = '';
            if ($c->parent !== 0 || !in_array($c->name, $list)) continue;
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
          if (!in_array($c->name, $list)) continue;
          $subCat = get_terms(array('taxonomy' => 'equipment_cat', 'hide_empty' => false, 'parent' => $c->term_id));
          if (empty($subCat)) {
            $dom = '<div id="' . $c->slug . '" class="itemList listRoot ' . $c->slug . ' ' . $class . '">';
            $dom .= <<<HTML
          <div class="listContent">
            <div class="listTitle">$c->name</div>
            <div class="description">$c->description</div>
          </div>
          <div class="itemList style1"> 
HTML;
            $custom_query = get_posts(array(
              'post_type' => 'equipment',
              'post_status' => 'publish',
              'numberposts' => 999,
              'tax_query' => array(
                array(
                  'taxonomy' => 'equipment_cat',
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
                    <div class="innerWrap">
                      <div class="imgWrap">
                        <img src="$thumb" alt="">
                      </div>
                      <div class="title">$post->post_title</div>
                    </div>
                  </div>
HTML;
              }
            } else {
              $dom .= <<<HTML
            <div class="empty">포스트가 없습니다.</div>
HTML;
            }
            $dom .= '</div></div>';
          } else {
            $dom = '<div id="' . $c->slug . '" class="itemList listRoot ' . $c->slug . ' ' . $class . '">';
            foreach ($subCat as $sc) {
              $dom .= <<<HTML
              <div class="listContent">
                <div class="listTitle">$sc->name</div>
                <div class="description">$sc->description</div>
              </div>
              <div class="itemList style1"> 
HTML;
              $custom_query = get_posts(array(
                'post_type' => 'equipment',
                'post_status' => 'publish',
                'numberposts' => 999,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'equipment_cat',
                    'field' => 'slug',
                    'terms' => $sc->slug
                  )
                ),
              ));
              if (!empty($custom_query)) {
                foreach ($custom_query as $post) {
                  $thumb = get_the_post_thumbnail_url($post, 'full');
                  $link = get_the_permalink($post);
                  $dom .= <<<HTML
                  <a href="$link" class="item">
                    <div class="innerWrap">
                      <div class="imgWrap">
                        <img src="$thumb" alt="">
                      </div>
                      <div class="title">$post->post_title</div>
                    </div>
                  </a>
HTML;
                }
              } else {
                $dom .= <<<HTML
                <div class="empty">포스트가 없습니다.</div>
HTML;
              }
              $dom .= '</div>';
            }
            $dom .= '</div>';
          }
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
        var target = document.querySelectorAll('.accordionContent .listRoot');
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
