<?php
// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
?>
<header class="default">
  <div class="coverBg">
    <img draggable="false" src="<?php echo $zeplin ?>/img-top-rentalcare.jpg" srcset="<?php echo $zeplin ?>/img-top-rentalcare@2x.jpg 2x, <?php echo $zeplin ?>/img-top-rentalcare@3x.jpg 3x">
  </div>
  <div class="container">
    <div class="title">
      <?php single_post_title(); ?>
    </div>
    <div class="description">
      필요한 장비를 필요한 기간 동안 새것처럼
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
      <?php my_menu_breadcrumb() ?>
    </div>
  </div>
  <div class="content">
    <div class="container">
      <p>
        청소장비 전담 관리 인력이 없거나 자주 교체되어도 <span class="pointUnderLine">매달 반복되는 장비관리 업무 부담 없이
          원하는 장비를 원하는 기간에 맞춰 안정적으로 관리하면서</span> 늘 깨끗한 사업장을 유지하는 비결!
      </p>
      <div class="title">크린텍 렌탈케어 </div>
    </div>
  </div>
</header>
<?php
get_template_part('template-parts/FixedMenu');
