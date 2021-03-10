<?php

/**
 * Template Name: 홈페이지
 * Template Post Type: page
 */

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_template_part('template-parts/head/fullpage');
get_template_part('template-parts/head/slickslide');
get_header();

// 우측 고정네비게이션
get_template_part('template-parts/FixedMenu');
?>
<main class="homepage">
  <div id="fullpage">
    <?php include_once('home/section1.php') ?>
    <?php include_once('home/section2.php') ?>
    <?php include_once('home/section3.php') ?>
    <?php include_once('home/section4.php') ?>
    <?php get_template_part('template-parts/FNB') ?>
  </div>
  <ul id="myMenu" class="listStyle">
    <li data-menuanchor="firstPage" class="active">
      <div class="label"></div>
      <a href="#firstPage">메인</a>
    </li>
    <li data-menuanchor="secondPage">
      <div class="label"></div>
      <a href="#secondPage">제품소개</a>
    </li>
    <li data-menuanchor="thirdPage">
      <div class="label"></div>
      <a href="#thirdPage">멀티미디어</a>
    </li>
    <li data-menuanchor="fourthPage">
      <div class="label"></div>
      <a href="#fourthPage">정보</a>
    </li>
  </ul>
</main>
<?php
get_footer();
