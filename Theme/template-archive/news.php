<?php

/**
 * news
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_header();
get_template_part('template-parts/header/page-archive');
?>
<main class="pageTemplate news">
  <div class="section section1">
    <div class="container">
      <?php

      if (!empty($postType = get_post_type())) {
        add_action('pre_get_posts', function ($query) {
          if (
            !is_admin()
            && $query->is_post_type_archive(get_post_type())
            && $query->is_main_query()
          ) {
            $query->set('posts_per_page', -1);
          }
        });
        // Define page_id
        $page_ID = get_the_ID();

        // Define paginated posts
        $page    = get_query_var('page');

        // Define custom query parameters
        $args    = array(
          'post_type'      => $postType, // post types
          'posts_per_page' => 9,
          'paged'          => (get_query_var('paged')) ? get_query_var('paged') : 1
        );

        // If is_front_page "paged" parameters as $page number
        if (is_front_page())
          $args['paged'] = $page;

        // Instantiate custom query
        $custom_query = new WP_Query($args);

        // Custom loop
        if ($custom_query->have_posts()) :
          $renderTable = <<<HTML
            <div class="row">
HTML;
          while ($custom_query->have_posts()) :
            $custom_query->the_post();
            /**
             * Displaying content
             *
             * the_title(), the_permalink(), the_content() etc
             * Or see Twentysixteen theme page.php
             * get_template_part( 'template-parts/content', 'page' );
             *
             */
            $_title = get_the_title();
            $_permalink = get_the_permalink();
            $_date = get_the_date('Y.m.d Ah:i');
            $_thumbnail = get_the_post_thumbnail();
            $_excerpt = get_the_excerpt();
            $renderTable .= <<<HTML
            <div class="col-12 col-lg-6 col-xl-4 cardCol">
              <div class="thumbnail">
                $_thumbnail
              </div>
              <div class="title">
                <a href="$_permalink">$_title</a>
              </div>
              <div class="excerpt">
                $_excerpt
              </div>
              <div class="date">$_date</div>
            </div>
HTML;
          endwhile;
          $renderTable .= <<<HTML
          </div>
HTML;
          echo $renderTable;

          /**
           * Pagination parameters of the_posts_pagination() since: 4.1.0
           *
           * @see the_posts_pagination
           * https://codex.wordpress.org/Function_Reference/the_posts_pagination
           *
           */
          $arrow = <<<HTML
        <div class="arrow"></div>
HTML;

          $pagination_args = array(
            'mid_size'           => 5,
            'prev_text'          => __($arrow, 'theme-domain'),
            'next_text'          => __($arrow, 'theme-domain'),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __('', 'theme-domain') . ' </span>',
            'screen_reader_text' => __('screen-reader-text')
          );

          /**
           * Fix pagination link base
           *
           * If in paginated posts w/o multiple loop
           *
           */

          if (!is_front_page() && 0 < intval($page))
            $pagination_args['base'] = get_site_url() . '/' . $postType . '/page/%#%';
          /**
           * Fix Pagination with $GLOBALS['wp_query'] = {custom_query}
           *
           * @see get_the_posts_pagination use $GLOBALS['wp_query']
           * https://developer.wordpress.org/reference/functions/get_the_posts_pagination/#source-code
           *
           */

          $GLOBALS['wp_query'] = $custom_query;
          echo <<<HTML
        <div class="paginationWrap">
HTML;
          $nav = get_the_posts_pagination($pagination_args);
          $nav = str_replace('<h2 class="screen-reader-text">screen-reader-text</h2>', '', $nav);

          $moreClass = $paged === 0 ? 'disable' : '';
          echo <<<HTML
          <a href="/$postType" class="start $moreClass">
            <div class="arrow"></div>
          </a>
HTML;
          if ($paged === 1 && !empty($nav)) {
            echo <<<HTML
            <div class="prev">
              <div class="arrow disable"></div>
            </div>
HTML;
          }
          echo $nav;
          $endPage = $wp_query->max_num_pages;
          if ($paged === $endPage) {
            echo <<<HTML
            <div class="next">
              <div class="arrow disable"></div>
            </div>
HTML;
          }
          $moreClass = $paged === $endPage ? 'disable' : '';
          echo <<<HTML
          <a href="/$postType/page/$endPage" class="end $moreClass">
            <div class="arrow"></div>
          </a>
HTML;
          echo "</div>";
        else :
          /**
           * Empty Post
           *
           * Run your stuff here if posts empty
           * Or see Twentysixteen theme page.php
           * get_template_part( 'template-parts/content', 'none' );
           */
        endif;
        wp_reset_query(); // Restore the $wp_query and global post data to the original main query.
      }
      ?>
    </div>
  </div>
</main>
<?php
get_footer();
