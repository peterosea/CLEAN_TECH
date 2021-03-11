<?php

/**
 * Template Name: 인사말
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
<main class="pageTemplate greeting">
  <div class="container">
    <div>
      <?php the_field('content_body') ?>
      <br />
      <br />
      <br />
      <div class="company">
        <?php
        foreach (get_field('representative') as $key => $c) :
          echo <<<HTML
          <span class="$key">$c</span>
HTML;
        endforeach;
        ?>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
