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
              <div class="imgWrap">
                <img src="$img" alt="">
              </div>
              <div class="contentWrap">
                <div class="title">$title</div>
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
  </div>
</main>
<?php
get_footer();
