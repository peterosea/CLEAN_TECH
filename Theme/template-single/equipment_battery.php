<?php

/**
 * 장비활용 싱글페이지
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_template_part('template-parts/head/slickslide');
get_template_part('template-parts/head/equipment');
get_header();
get_template_part('template-parts/header/page-archive');
global $post;
?>
<main class="pageTemplate battery">
  <div class="section">
    <div class="container">
      <div class="row m-0">
        <?php
        $list = array('배터리', '모델명', '용량(Ah) ', '전압(V) ', '크기(W*L*H)');
        ?>
        <div class="col-2 p-0 labelCol">
          <ul class="label">
            <?php foreach ($list as $l) :
              echo <<<HTML
              <li>$l</li>
HTML;
            endforeach ?>
          </ul>
        </div>
        <div class="col-10 p-0 labelCol contentCol">
          <?php
          foreach (get_posts(array(
            'post_type' => 'equipment',
            'post_status' => 'publish',
            'numberposts' => 999,
            'tax_query' => array(
              array(
                'taxonomy' => 'equipment_cat',
                'field' => 'slug',
                'terms' => 'battery-charger'
              ),
              array(
                'taxonomy' => 'equipment_cat',
                'field' => 'slug',
                'terms' => 'charger',
                'operator' => 'NOT IN',
              )
            ),
          )) as $post) {
            $thumb = get_the_post_thumbnail($post);
            $title = get_the_title($post);
            $tb = get_field('table', $post->ID);
            echo <<<HTML
            <ul>
              <li>$thumb</li>
              <li>$title</li>
HTML;
            foreach ($tb as $t) {
              $name = $t['name'];
              $value = $t['value'];
              if (!in_array($name, $list)) continue;
              echo <<<HTML
              <li>$value</li>
HTML;
            }
            echo <<<HTML
            </ul>
HTML;
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <img src="<? echo get_field('graph', 'option') ?>" alt="">
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="listWrap">
        <?php
        if (!empty($listGroup = get_field('list', 'option'))) {
          echo '<div class="row listWrap">';
          foreach ($listGroup as $list) {
            $thumbnail = $list['thumbnail'];
            $title = $list['title'];
            $content = $list['content'];
            echo <<<HTML
        <div class="col-12 col-sm-6 col-lg-4 mb-5">
          <div class="listItem">
            <div class="imgWrap">
              <img src="$thumbnail" alt="">
            </div>
            <div class="contentWrap">
              <div class="title">
                $title
              </div>
              <div class="content">
                $content
              </div>
            </div>
          </div>
      </div>
HTML;
          }
          echo '</div>';
        }
        ?>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="row m-0">
        <?php

        $list = array(
          '충전기',
          '모델명',
          '전압(V)',
          '전류(A)',
          '출력(W)',
          '압력(A)',
          '정격(V)'
        );
        ?>
        <div class="col-2 p-0 labelCol">
          <ul class="label">
            <?php foreach ($list as $l) :
              echo <<<HTML
              <li>$l</li>
HTML;
            endforeach ?>
          </ul>
        </div>
        <div class="col-10 p-0 labelCol contentCol">
          <?php
          foreach (get_posts(array(
            'post_type' => 'equipment',
            'post_status' => 'publish',
            'numberposts' => 999,
            'tax_query' => array(
              array(
                'taxonomy' => 'equipment_cat',
                'field' => 'slug',
                'terms' => 'charger'
              ),
            ),
          )) as $post) {
            $thumb = get_the_post_thumbnail($post);
            $title = get_the_title($post);
            $tb = get_field('table', $post->ID);
            echo <<<HTML
            <ul>
              <li>$thumb</li>
              <li>$title</li>
HTML;
            foreach ($tb as $t) {
              $name = $t['name'];
              $value = $t['value'];
              if (!in_array($name, $list)) continue;
              echo <<<HTML
              <li>$value</li>
HTML;
            }
            echo <<<HTML
            </ul>
HTML;
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="containerTitle">
        관리방법
      </div>
      <?php
      if (!empty($processGroup = get_field('processGroup', 'option'))) {
        echo '<div class="processWrap battery">';
        foreach ($processGroup as $key => $process) {
          $key = str_pad($key + 1, 2, "0", STR_PAD_LEFT);
          $content = $process['content'];
          echo <<<HTML
          <div class="process">
            <div class="header">
              <div class="step">$key</div>
              <span>
              $content
              </span>
            </div>
          </div>
HTML;
        }
        echo '</div>';
      }
      ?>
    </div>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
