<?php
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
?>
<nav class="GNB">
  <div class="left logoWrap">
    <a href="/">
      <img draggable="false" src="<?php echo $zeplin ?>/logo.png" srcset="<?php echo $zeplin ?>/logo@2x.png 2x, <?php echo $zeplin ?>/logo@3x.png 3x">
    </a>
  </div>
  <div class="container">
    <?php wp_nav_menu(array('menu' => 'GNB')) ?>
  </div>
  <div class="right iconWrap">
    <svg class="search icon">
      <use xlink:href="#top-search"></use>
    </svg>
  </div>
</nav>