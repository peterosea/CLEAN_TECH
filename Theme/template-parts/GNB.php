<?php
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
?>
<div class="search_wrap">
  <div class="click_bg"></div>
  <div class="container">
    <?php get_search_form(); ?>
  </div>
</div>
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
    <svg class="search icon btn_search">
      <use xlink:href="#top-search"></use>
    </svg>
  </div>
</nav>
<script type="text/javascript">
  // 검색창 클릭 오버레이
  const btnSearch = document.querySelector('.GNB .btn_search');
  const searchForm = document.querySelector('.search_wrap');
  const clickBG = document.querySelector('.click_bg');

  btnSearch.addEventListener('click', function(e){
      e.preventDefault;
      if (searchForm.style.opacity == 0) {
        searchForm.style.opacity = 1;
        searchForm.style.visibility = 'visible';
        searchForm.style.zIndex = 99999;
      }
  });
  clickBG.addEventListener('click', function(e){
    e.preventDefault;
    console.log('ok');
    searchForm.style.opacity = 0;
    searchForm.style.visibility = 'hidden';
    searchForm.style.zIndex = -1;
  });
</script>