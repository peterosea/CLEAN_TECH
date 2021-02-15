<nav class="fixedMenu">
  <ul>
    <?php
    $menu = wp_get_nav_menu_object('FixedMenu');
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    foreach ($menu_items as $mi) {
      $imgUrl = get_field('icon', $mi->ID);
      echo <<<HTML
      <li>
        <a href="$mi->url">
          <div class="imgWrap">
            <img src="$imgUrl" alt="$mi->post_title">
          </div>
          <div>$mi->post_title</div>
        </a>
      </li>
HTML;
    }
    ?>
  </ul>
</nav>