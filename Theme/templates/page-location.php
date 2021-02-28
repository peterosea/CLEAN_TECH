<?php

/**
 * Template Name: 찾아오시는 길
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
<main class="pageTemplate location">
  <div class="section section1">
    <div class="container">
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
    </div>
  </div>
  <div class="section section2">
    <div class="container">
      <div class="head">
        <h1>전국 네트워크</h1>
        <h2>본사 조직도 및 지방 사업소</h2>
        <div class="content">
          <?php echo get_field('content') ?>
        </div>
      </div>
      <img src="<?php echo get_field('map-img') ?>" alt="">
    </div>
  </div>
</main>
<?php
get_footer();
