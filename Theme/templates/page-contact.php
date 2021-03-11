<?php

/**
 * Template Name: 렌탈, 토탈 구매 상담
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
<main class="pageTemplate contact">
  <div class="sectionWrap">
    <div class="section section1">
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
      <?php get_template_part('template-parts/Form/Contact/index'); ?>
    </div>
  </div>
</main>
<?php
get_footer();
