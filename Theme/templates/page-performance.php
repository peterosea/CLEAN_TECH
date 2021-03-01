<?php

/**
 * Template Name: 인증, 납품 실적
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
<main class="pageTemplate performance">
  <div class="section section1">
    <div class="container">
      <h1>인증현황</h1>
      <div class="row csWrap">
        <?php
        foreach (get_field('certification_status') as $certifi) {
          $img = $certifi['logo_img'];
          $name = $certifi['name'];
          echo <<<HTML
          <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="csCard">
              <div class="imgWrap">
                <img src="$img" alt="">
              </div>
              <div class="name">$name</div>
            </div>
          </div>
  HTML;
        }
        ?>
      </div>
    </div>
  </div>
  <div class="section section2">
    <div class="container">
      <h1>납품실적</h1>
      <?php
      foreach (get_field('delivery_performance') as $key => $dp) {
        echo <<<HTML
        <div class="rowWrap">
HTML;
        foreach (get_field_object('delivery_performance')['sub_fields'] as $subObj) {
          if ($subObj['name'] === $key) {
            echo '<div class="rowTitle"> ' . $subObj['label'] . ' </div>';
            break;
          }
        }
        echo '<div class="listRootWrap"><div class="listWrap">';
        foreach ($dp as $dpdp) {
          $img = $dpdp['logo_img'];
          echo <<<HTML
          <div class="list">
            <img src="$img" alt="">
          </div>
HTML;
        }
        echo '</div></div>';
        echo '</div>';
      }
      ?>
    </div>
  </div>
</main>
<?php
get_footer();
