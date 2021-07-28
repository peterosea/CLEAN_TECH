<nav class="fixedMenu d-none d-lg-block">
  <ul>
    <?php
    $menu = wp_get_nav_menu_object('FixedMenu');
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    foreach ($menu_items as $mi) {
      $imgUrl = get_field('icon', $mi->ID);
      // 메뉴의 타켓값 구하기 : 클래스명을 변환
      $target_proto = $mi->classes;
      foreach ($target_proto as $t) {
        $target = $t;
      }
      echo <<<HTML
      <li>
        <a href="$mi->url" target="$target">
          <div class="imgWrap">
            <img src="$imgUrl" alt="$mi->post_title">
          </div>
          <div>$mi->title</div>
        </a>
      </li>
HTML;
    }
    ?>
  </ul>
</nav>