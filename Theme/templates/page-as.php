<?php

/**
 * Template Name: A/S 접수, 부품 구입
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
<main class="pageTemplate as">
  <div class="section1">
    <div class="container">
      <div class="row mx-lg-n5">
        <?php
        foreach (get_field('col-group') as $col) {
          $title = $col['title'];
          $content = $col['content'];
          $img = $col['img'];
          echo <<<HTML
          <div class='col-12 col-lg-4 px-lg-5'>
            <div class="colWrap">
              <div class="left">
                <div class="title">$title</div>
                <div class="content">$content</div>
              </div>
              <div class="right">
                <img src="$img" alt="">
              </div>
            </div>
          </div>
HTML;
        }
        ?>
      </div>
    </div>
  </div>
  <div class="sectionWrap">
    <div class="section section2">
      <div class="container">
        <div class="sectionTitle important">
          <?php echo get_field('title') ?>
          <p>
            <?php echo get_field('content') ?>
          </p>
        </div>
        <div class="dimSpan">
          <?php echo get_field('memo') ?>
        </div>
      </div>
    </div>
    <div class="section section2">
      <?php get_template_part('template-parts/Form/AS/index'); ?>
    </div>
  </div>
</main>
<?php
get_footer();
