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
get_template_part('template-parts/header/rental-care');
?>
<main class="pageTemplate rentalCare">
  <div class="section section1">
    <div class="sectionTitle">
      “고객의 고민에서부터 <br />
      <span class="pointColor">크린텍의 렌탈케어</span>는 시작됐습니다.”
    </div>
    <div class="container">
      <img src="<?php echo $zeplin ?>/sasodko1.png" alt="">
    </div>
  </div>
  <div class="section section2">
    <div class="sectionTitle">
      “<span class="pointColor">크린텍 렌탈케어</span>는 다양한 현장 상황에 맞춰<br />
      꼭 필요한 장비들로 구성됩니다.”
      <p>습식 보행 및 탑승, 건식 보행 및 탑승, 카펫, 광택 등</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-7">
          <img src="<?php echo $zeplin ?>/img-case-a.png" srcset="<?php echo $zeplin ?>/img-case-a@2x.png 2x, <?php echo $zeplin ?>/img-case-a@3x.png 3x">
        </div>
        <div class="col-5 contentCol">
          <div class="title pointColor">사례 A</div>
          <p>
            청소장비를 렌탈할 수 있는 곳들을 여러 곳 알아보았는데,
            100대 넘는 장비를 안정감 있게 관리할 수 있는 인력과
            재무 건실성을 갖춘 곳은 크린텍이 유일해 보였습니다.
            <br />
            <br />
          </p>
        </div>
      </div>
      <div class="row">
        <div class="col-5 contentCol">
          <div class="title pointColor">사례 B</div>
          <p>
            전국에 물류센터가 점점 늘고 있는데 어떻게 동일한
            위생상태를 유지할 수 있을지 고민이었습니다.
            크린텍 렌탈케어를 통해 전국에 있는 물류센터 현장에 꼭 맞는
            장비들을 도입할 수 있었고, 이후에도 모든 유지관리를
            크린텍이 진행해 신경 쓸 일이 하나도 없었습니다.
          </p>
        </div>
        <div class="col-7">
          <img src="<?php echo $zeplin ?>/img-case-b.png" srcset="<?php echo $zeplin ?>/img-case-b@2x.png 2x, <?php echo $zeplin ?>/img-case-b@3x.png 3x">
        </div>
      </div>
    </div>
  </div>
  <div class="section section3">
    <div class="container">
      <div class="sectionTitle">
        “<span class="pointColor">크린텍 렌탈케어</span>는 다양한 현장 상황에 맞춰<br />
        꼭 필요한 장비들로 구성됩니다.”
        <p>습식 보행 및 탑승, 건식 보행 및 탑승, 카펫, 광택 등</p>
      </div>
      <ul class="accordionMenu">
        <li id="all" class="active">전체보기</li>
        <?php
        $cat = get_terms(array('taxonomy' => 'equipment_cat', 'hide_empty' => false));
        foreach ($cat as $c) {
          $class = '';
          if ($c->count === 0) $class .= 'disable';
          echo <<<HTML
          <li id="$c->slug" class="$class">$c->name</li>
HTML;
        }
        ?>
      </ul>
      <div class="accordionContent">
        <div id="all" class="itemList active">
          <?php
          $custom_query = get_posts(array(
            'post_type' => 'equipment',
            'post_status' => 'publish',
            'numberposts' => 999,
          ));
          foreach ($custom_query as $post) {
            $thumb = get_the_post_thumbnail_url($post, 'full');
            echo <<<HTML
            <div class="item">
              <div class="imgWrap">
                <img src="$thumb" alt="">
              </div>
              <div class="title">$post->post_title</div>
            </div>
HTML;
          }
          ?>
        </div>
        <?php
        foreach ($cat as $c) {
          $dom = '<div id="' . $c->slug . '" class="itemList ' . $c->slug . '">';
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
              <div class="item style1">
                <div class="imgWrap">
                  <img src="$thumb" alt="">
                </div>
                <div class="title">$post->post_title</div>
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
  <div class="section section4">
    <div class="container">
      <div class="sectionTitle">
        “사용 환경에 따라 <span class="pointColor">장비의 활용 플랜</span>이 달라질 수 있습니다.
        효율적이고 정확한 사용을 위해 전문적인 상담을 받아보세요.”
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
