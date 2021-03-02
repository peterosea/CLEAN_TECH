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
<main class="pageTemplate newsSingle">
  <div class="section section1">
    <div class="container">
      <div class="header">
        <div class="title"><?php the_title() ?></div>
        <div class="date"><?php the_date('Y.m.d Ah:i') ?></div>
        <div class="thumbnail">
          <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="" />
        </div>
      </div>
      <div class="body">
        <?php the_content() ?>
      </div>
      <div class="pageNavigation">
        <div class="row nextNprev">
          <?php
          $next_post = get_next_post();
          $next_title = '';
          $next_link = '다음 포스트 없음';
          $class = '';
          if ($next_post) {
            $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
            $next_link = '<a rel="prev" href="' . get_permalink($next_post->ID) . '" title="' . $next_title . '">' . $next_title . '</a>';
          } else {
            $class = 'disable';
          }
          echo <<<HTML
          <div class="col next">
            <div class="wrap">
              <div class="icon"></div>
              <div class="textWrap">
                <div class="title $class">$next_link</div>
                <span>다음글</span>
              </div>
            </div>
          </div>
HTML;
          echo <<<HTML
          <div class="col-2 menu">
            <a href="/news">
              <div class="icon"></div>
              <span>글목록</span>
            </a>
          </div>
HTML;

          $prev_post = get_previous_post();
          $prev_title = '';
          $prev_link = 'No previous posts.';
          $class = '';
          if ($prev_post) {
            $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
            $prev_link = '<a rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title . '">' . $prev_title . '</a>';
          } else {
            $class = 'disable';
          }
          echo <<<HTML
            <div class="col prev">
              <div class="wrap">
                <div class="textWrap">
                  <div class="title $class">$prev_link</div>
                  <span>이전글</span>
                </div>
                <div class="icon"></div>
              </div>
            </div>
HTML;
          ?>
        </div>
      </div>
    </div>
  </div>
</main>
<?php
get_footer();
