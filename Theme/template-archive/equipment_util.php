<?php

/**
 * Template Name: 템플릿_이름
 * Template Post Type: 템플릿_타입
 */

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_header();
get_template_part('template-parts/header/equipment_util');
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
          $dom = '<div id="' . $c->slug . '" class="itemList ' . $c->slug . ' ' . $class . '">';
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
              <div class="item style2">
                <div class="imgWrap">
                  <img src="$thumb" alt="">
                </div>
                <div class="title">$post->post_title</div>
                <p>$post->post_content</p>
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
  <div class="section section2">
    <div class="container">
      <div class="sectionTitle">
        “사용 환경에 따라 <span class="pointColor">장비의 운영 플랜</span>이 달라집니다.
        최적화된 장비 도입을 위해 전문 상담을 받아보세요.”
      </div>
      <div class="row">
        <div class="col-6">
          <div class="contentWrap">
            <div class="content">
              <div class="title">장비 관련 상담 문의</div>
              <p>문의사항을 남겨주시면 접수 후 1시간 내에 답변 드리겠습니다.</p>
            </div>
            <div class="imgWrap">
              <img src="<?php echo $zeplin ?>/icon-counsel-product.png" srcset="<?php echo $zeplin ?>/icon-counsel-product@2x.png 2x, <?php echo $zeplin ?>/icon-counsel-product@3x.png 3x">
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="contentWrap">
            <div class="content">
              <div class="title">바로 문의 <a href="tel:070-7404-8081">070-7404-8081</a></div>
              <p>고객센터를 통해 궁금하신 사항들을 빠르고 친절하게 안내 드리겠습니다
              </p>
            </div>
            <div class="imgWrap">
              <img src="<?php echo $zeplin ?>/icon-tel.png" srcset="<?php echo $zeplin ?>/icon-tel@2x.png 2x, <?php echo $zeplin ?>/icon-tel@3x.png 3x">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
get_footer();
