<?php

/**
 * Template Name: 사옥 소개
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
<main class="pageTemplate office">
  <div class="container">
    <div class="section intro">
      <?php
      foreach (get_field('intro') as $key => $intro) {
        if ($key === 'img') {
          echo <<<HTML
          <div class="imgWrap">
            <img src="$intro" alt="" />
          </div>
HTML;
          continue;
        }
        echo <<<HTML
        <div class="$key">$intro</div>
HTML;
      }
      ?>
    </div>
    <div class="section section1">
      <?php
      foreach (get_field('section1') as $key => $s1) {
        if ($key === 'img') {
          echo <<<HTML
          <div class="imgWrap">
            <img src="$s1" alt="" />
          </div>
HTML;
          continue;
        }
        if (is_array($s1)) {
          echo '<div class="columRoot">';
          foreach ($s1 as $key => $ss1) {
            $img = $ss1['img'];
            $title = $ss1['title'];
            $content = $ss1['content'];
            echo <<<HTML
            <div class="columWrap">
              <div class="title d-block d-md-none">$title</div>
              <div class="imgWrap">
                <img src="$img" alt="">
              </div>
              <div class="contentWrap">
                <div class="title d-none d-md-block">$title</div>
                <div class="content">$content</div>
              </div>
          </div>
HTML;
          }
          echo '</div>';
        } else {
          echo <<<HTML
          <div class="$key">$s1</div>
HTML;
        }
      }
      ?>
    </div>
    <div class="section section2">
      <?php
      foreach (get_field('section2') as $key => $s1) {
        if (is_array($s1)) {
          echo '<div class="imgColum">';
          foreach ($s1 as $ss1) {
            echo <<<HTML
            <div class="imgWrap">
              <img src="$ss1" alt="" />
            </div>
HTML;
          }
          echo '</div>';
        } else {
          echo <<<HTML
        <div class="$key">$s1</div>
HTML;
        }
      }
      ?>
    </div>
    <div class="section section3">
      <?php
      foreach (get_field('section3') as $key => $s1) {
        if (is_array($s1)) {
          echo '<div class="imgColum">';
          foreach ($s1 as $ss1) {
            echo <<<HTML
            <div class="imgWrap">
              <img src="$ss1" alt="" />
            </div>
HTML;
          }
          echo '</div>';
        } else {
          echo <<<HTML
        <div class="$key">$s1</div>
HTML;
        }
      }
      ?>
    </div>
    <div class="section section4">
      <?php
      foreach (get_field('section4') as $key => $s1) {
        if (is_array($s1)) {
          echo '<div class="imgColum">';
          foreach ($s1 as $ss1) {
            echo <<<HTML
            <div class="imgWrap">
              <img src="$ss1" alt="" />
            </div>
HTML;
          }
          echo '</div>';
        } else {
          echo <<<HTML
        <div class="$key">$s1</div>
HTML;
        }
      }
      ?>
    </div>
    <div class="section section5">
      <?php echo get_field('end') ?>
    </div>
    <div class="section section6">
      <!-- <div class="container"> -->
        <div class="head">
          <h1>본사</h1>
          <h2 class="address">
            <?php echo get_field('address') ?>
          </h2>
          <ul>
            <?php if (!empty($tel = get_field('contact-information')['tel'])) : ?>
              <li>
                <span class="unit pointColor">T.</span>
                <span>
                  <?php echo $tel ?>
                </span>
              </li>
            <?php endif ?>
            <?php if (!empty($fax = get_field('contact-information')['fax'])) : ?>
              <li>
                <span class="unit pointColor">F.</span>
                <span>
                  <?php echo $fax ?>
                </span>
              </li>
            <?php endif ?>
          </ul>
        </div>
        <div id="daumRoughmapContainer1614523372647" class="root_daum_roughmap root_daum_roughmap_landing"></div>
        <script charset="UTF-8" class="daum_roughmap_loader_script" src="https://ssl.daumcdn.net/dmaps/map_js_init/roughmapLoader.js"></script>
        <script charset="UTF-8">
          new daum.roughmap.Lander({
            "timestamp": "1614523372647",
            "key": "24n39",
            "mapHeight": "600",
          }).render();
        </script>
      <!-- </div> -->
    </div>
    <div class="section section7">
      <!-- <div class="container"> -->
        <div class="head">
          <h1>전국 네트워크</h1>
          <h2>본사 조직도 및 지방 사업소</h2>
          <div class="content">
            <?php echo get_field('content') ?>
          </div>
        </div>
        <img src="<?php echo get_field('map-img') ?>" alt="">
      <!-- </div> -->
    </div>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
