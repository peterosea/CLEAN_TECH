<?php
// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
?>
<header class="default">
  <div class="coverBg">
    <?php if (!empty(get_field('header_img', 'option'))) : ?>
      <img src="<?php echo get_field('header_img', 'option') ?>" alt="">
    <?php elseif (!empty(get_field('header_img'))) : ?>
      <img src="<?php echo get_field('header_img') ?>" alt="">
    <?php else : ?>
      <img draggable="false" src="<?php echo $zeplin ?>/img-top-usage.jpg" srcset="<?php echo $zeplin ?>/img-top-usage@2x.jpg 2x, <?php echo $zeplin ?>/img-top-usage@3x.jpg 3x">
    <?php endif ?>
  </div>
  <div class="container">
    <div class="title">
      <?php
      if (!empty(post_type_archive_title('', false))) {
        echo post_type_archive_title('', false);
      } elseif (get_post_type() === 'page') {
        echo single_post_title();
      } else {
        $post_type_obj = get_post_type_object(get_post_type());
        echo $post_type_obj->label;
      }
      ?>
    </div>
    <div class="description">
      <?php if (!empty(get_field('description', 'option'))) :
        echo get_field('description', 'option');
      else : ?>
      <?php endif ?>
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
      <?php my_menu_breadcrumb('sitemap', '') ?>
    </div>
  </div>
  <?php
  $sTitle = get_field('s_title');
  $sContent = get_field('s_content');
  if (!empty($sTitle)) :
    echo <<<HTML
    <div class="content">
      <div class="container">
        <div class="title">$sTitle</div>
        $sContent
      </div>
    </div>
HTML;
  endif; ?>
</header>
<?php
get_template_part('template-parts/FixedMenu');