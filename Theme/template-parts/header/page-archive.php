<?php
// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
?>
<header class="default">
  <div class="coverBg">
    <?php if (is_archive() && !empty(get_field(get_post_type(), 'option'))) : ?>
      <img src="<?php echo get_field(get_post_type(), 'option')['header_img'] ?>" alt="">
    <?php elseif (is_single() && !empty(get_field(get_post_type(), 'option'))) : ?>
      <img src="<?php echo get_field(get_post_type(), 'option')['header_img'] ?>" alt="">
      <?php else :
      if (get_field_object('header_img')['key'] === 'field_603d1fa91879d') : ?>
        <video autoplay muted loop src="<?php echo get_field('header_img') ?>" alt=""></video>
      <?php else : ?>
        <img src="<?php echo get_field('header_img') ?>" alt="">
      <?php endif ?>
    <?php endif ?>
  </div>
  <div class="container <?php if (get_field_object('header_img')['key'] === 'field_603d1fa91879d') echo 'video' ?>">
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
      <?php if (is_archive() && !empty(get_field(get_post_type(), 'option'))) :
        echo get_field(get_post_type(), 'option')['description'];
      elseif (is_single() && !empty(get_field(get_post_type(), 'option'))) :
        echo get_field(get_post_type(), 'option')['description'];
      else :
        echo get_field('description');
      endif ?>
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
  if (!empty(get_field('s_title')) && !is_archive()) :
    $sTitle = get_field('s_title');
    $sContent = get_field('s_content');
    echo <<<HTML
    <div class="content">
      <div class="container">
        <div class="title">$sTitle</div>
        $sContent
      </div>
    </div>
HTML;
  elseif (!is_archive() && !empty(get_field('s_title', 'option')) && get_post_type() === 'equipment') :
    global $post;
    if (has_term('battery', 'equipment_cat', $post) || has_term('charger', 'equipment_cat', $post)) :
      $sTitle = get_field('s_title', 'option');
      $sContent = get_field('s_content', 'option');
      echo <<<HTML
      <div class="content">
        <div class="container">
          <div class="title">$sTitle</div>
          $sContent
        </div>
      </div>
HTML;
    endif;
  endif; ?>
</header>
<?php
get_template_part('template-parts/FixedMenu');
