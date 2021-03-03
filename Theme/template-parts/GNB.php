<?php
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
?>
<div class="search_wrap">
  <div class="click_bg"></div>
  <div class="container">
    <?php get_search_form(); ?>
  </div>
</div>
<nav class="GNB d-none d-lg-flex">
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

<!-- Mobile -->

<nav class="gnbTypeDefault mobile d-flex d-lg-none">
  <a href="/" class="logo">
    <img draggable="false" src="<?php echo $zeplin ?>/logo.png" srcset="<?php echo $zeplin ?>/logo@2x.png 2x, <?php echo $zeplin ?>/logo@3x.png 3x">
  </a>
  <div class="rightWrap">
    <button type="button" id="dropdownMenuButtonMobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-bars"></i>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonMobile">
      <ul class="menuList">
        <li class="dropdownItem allMenu">
          <button type="button" id="dropdownMenuButtonMobile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>전체메뉴</span>
            <i class="fas fa-times"></i>
          </button>
          <div class="searchList">
            <form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url('/') ?>">
              <input type="text" value="<?php echo get_search_query() ?>" name="s" id="s" placeholder="검색어를 입력하세요" />
              <input type="submit" id="searchsubmit" value="<?php echo esc_attr__('Search') ?>" hidden />
              <button class="submit" type="submit">
                <svg class="search icon btn_search">
                  <use xlink:href="#top-search"></use>
                </svg>
              </button>
            </form>
          </div>
        </li>
        <?php
        wp_nav_menu(array(
          'menu' => 'GNB',
          'container' => '',
          'items_wrap' => '%3$s',
          'add_li_class' => 'dropdownItem',
        ));
        ?>
      </ul>
    </div>
  </div>
</nav>

<script type="text/javascript">
  // 검색창 클릭 오버레이
  const btnSearch = document.querySelector('.GNB .btn_search');
  const searchForm = document.querySelector('.search_wrap');
  const clickBG = document.querySelector('.click_bg');

  btnSearch.addEventListener('click', function(e) {
    e.preventDefault;
    if (searchForm.style.opacity == 0) {
      searchForm.style.opacity = 1;
      searchForm.style.visibility = 'visible';
      searchForm.style.zIndex = 99999;
    }
  });
  clickBG.addEventListener('click', function(e) {
    e.preventDefault;
    console.log('ok');
    searchForm.style.opacity = 0;
    searchForm.style.visibility = 'hidden';
    searchForm.style.zIndex = -1;
  });
</script>