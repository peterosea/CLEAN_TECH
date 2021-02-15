<?php
// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
?>
<header class="default">
  <div class="coverBg">
    <img draggable="false" src="<?php echo $zeplin ?>/img-top-usage.jpg" srcset="<?php echo $zeplin ?>/img-top-usage@2x.jpg 2x, <?php echo $zeplin ?>/img-top-usage@3x.jpg 3x">
  </div>
  <div class="container">
    <div class="title">
      장비 활용
    </div>
    <div class="description">
      환경에 따라 필요한 장비도, 사용 방법도 다릅니다. <br />
      다양한 곳에서 깨끗한 위생을 책임지는 크린텍을 만나보세요.
    </div>
  </div>
</header>
<header class="pageHeader">
  <div class="breadCrumbs">
    <div class="container">
      <a href="/" class="home">
        <svg>
          <use xlink:href="#home"></use>
        </svg>
      </a>
      <?php my_menu_breadcrumb('menu-1', '') ?>
    </div>
  </div>
</header>
<?php
get_template_part('template-parts/FixedMenu');
