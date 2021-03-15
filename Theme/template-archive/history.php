<?php

/**
 * history
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_header();
get_template_part('template-parts/header/page-archive');
?>
<main class="pageTemplate history">
  <div class="section section1">
    <div class="container">
      <div class="historyRootWrap">
        <?php
        foreach (get_posts(array(
          'post_type' => 'history',
          'post_status' => 'publish',
          'numberposts' => 999,
        )) as $history) :
          $year = get_field('year', $history);
          $content = get_field('content', $history);
          echo <<<HTML
        <div class="historyWrap">
          <div class="yearWrap pointColor">$year</div>
          <div class="content">$content</div>
        </div>
HTML;
        endforeach ?>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
