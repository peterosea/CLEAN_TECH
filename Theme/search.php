<?php

/**
 * The template for displaying search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */

$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_header();
get_template_part('template-parts/header/page-archive');
?>
<!----- 각종 Custom 변수 ----->
<?php
global $wp_query;
$found_posts = $wp_query->found_posts; //검색결과 갯수
?>
<main class="pageTemplate result_list">
  <div class="container">
    <?php
    if (have_posts()) :
    ?>

      <div class="keyword_wrap">
        <h2>
          <span class="search_keyword"><?php echo get_search_query(); ?></span>(으)로 <span class="number"><?php echo $found_posts; ?></span>건이 검색되었습니다.
        </h2>
      </div>
      <div class="search_form_wrap">
        <?php get_search_form(); ?>
      </div>
      <div class="results article_grp">
        <?php
        // Start the Loop.
        while (have_posts()) :
          the_post();
          include 'template-parts/content-search.php';
        // End the loop.
        endwhile;
        ?>
      </div>
    <?php
      // Previous/next page navigation.
      twentynineteen_the_posts_navigation();

    else :
    ?>
      <div class="keyword_wrap">
        <h2>
          <span class="search_keyword"><?php echo get_search_query(); ?></span>로 <span class="number">0</span>건이 검색되었습니다.
          <p class="_description">다른 검색어를 사용해보세요.</p>
        </h2>
      </div>
      <div class="main_section">
        <div class="search_form_wrap">
          <?php get_search_form(); ?>
        </div>
      </div>
      <div class="results no_result">
        <div class="image">
          <img src="<?php echo $zeplin ?>/notfound.png" alt="검색결과가 없습니다." />
        </div>
        <a href="javascript:history.back();" class="btn btn_pointcolor">이전 페이지</a>
      </div>
    <?php
    endif;
    ?>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
