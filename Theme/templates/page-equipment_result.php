<?php

/**
 * Template Name: 장비 검색
 * Template Post Type: page
 */

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_header();
get_template_part('template-parts/header/page-archive');
?>

<?php
$cat_num = (isset($_GET['cat'])) ? $_GET['cat'] : '';
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
  'post_type'              => array('equipment'),
  'post_status'            => array('publish'),
  'posts_per_page'     => 9,
  'order'                  => 'ASC',
  'orderby'                => 'menu_order',
  'paged'           => $paged,

);
if ($cat_num) {
  $args['tax_query'] = array(
    array(
      'taxonomy' => 'equipment_cat',
      'field' => 'term_id', //'term_id', 'name', 'slug'
      'terms'    => array($cat_num)
    )
  );
}
//Search & Filter
$args['search_filter_id'] = 1749;
$equips = new WP_Query($args);
?>

<main class="pageTemplate equipmentResult">
  <div class="container">
    <div class="search_form_wrap">
      <?php echo do_shortcode('[searchandfilter id="1749"]'); ?>
    </div>
    <?php
    if ($equips->have_posts()) :
      //var_dump($paged);
    ?>
      <div class="itemList equipmentList">
        <?php
        while ($equips->have_posts()) : $equips->the_post();
          $post_terms = get_the_terms($post->ID, 'equipment_cat');
          if (!empty($post_terms)) {
            $seperator = " ";
            $output = '';
            foreach ($post_terms as $post_term) {
              $output = $post_term->name;
            }
          }

          $thumbUrl = get_the_post_thumbnail_url($post, 'full');
          $pmlink = get_the_permalink($post);
          $h2_desc = get_field('h2_desc');
          $table = get_field('table');
        ?>

          <a href="<?php echo $pmlink; ?>" class="eq_wrap">
            <div class="thumbBG" style="background-image:url('<?php echo $thumbUrl; ?>');">

            </div>
            <div class="meta_wrap">
              <p class="eq_cat"><?php echo trim($output, $seperator); ?></p>
              <h4 class="eq_title"><?php the_title(); ?></h4>
            </div>
            <table class="table stat_wrap">
              <tbody>
                <?php
                foreach (get_field('table') as $t) {
                  $name = $t['name'];
                  $value = $t['value'];
                  echo <<<HTML
                                <tr>
                                <th>$name</th>
                                <td>$value</td>
                                </tr>
HTML;
                }
                ?>
              </tbody>
            </table>
          </a>
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
      </div>
    <?php
    else :
    ?>
      <div class="keyword_wrap">
        <h2>
          <span class="search_keyword"><?php echo get_search_query(); ?></span>로 <span class="number">0</span>건이 검색되었습니다.
          <p class="_description">다른 검색어를 사용해보세요.</p>
        </h2>
      </div>
      <div class="main_section">
        <div class="search_form_wrap">
          <?php get_search_form(); ?>
        </div>
      </div>
      <div class="results no_result">
        <div class="image">
          <img src="<?php echo $zeplin ?>/notfound.png" alt="검색결과가 없습니다." />
        </div>
        <a href="javascript:history.back();" class="btn btn_pointcolor"></a>
      </div>

    <?php

    endif;
    ?>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
