<?php

/**
 * comment
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
<main class="pageTemplate equipmentSolutionSingle">
  <div class="section section1">
    <div class="container">
      <div class="row">
        <?php
        foreach (get_posts(array(
          'post_type' => 'equipment-solution',
          'post_status' => 'publish',
          'numberposts' => 999,
        )) as $post) {
          $thumbnail = get_the_post_thumbnail_url($post, 'full');
          $title = get_the_title($post);
          $excerpt = get_the_excerpt($post);
          echo <<<HTML
          <div class="col-12 col-sm-6 col-lg-4">
            <div class="wrap">
              <div class="imgWrapWrap">
                <div class="imgWrap">
                  <img src="$thumbnail" alt="">
                </div>
              </div>
              <div class="contentWrap">
                <div class="title">$title</div>
                <div class="excerpt">$excerpt</div>
              </div>
            </div>
          </div>
HTML;
        }
        ?>
      </div>
    </div>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
