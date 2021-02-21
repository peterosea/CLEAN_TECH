<?php

/**
 * 장비활용 싱글페이지
 *
 * @author       Hansanghyeon
 * @copyright    Hansanghyeon <999@hyeon.pro>
 **/

// variables
$theme_url = get_stylesheet_directory();
$functions_url = get_stylesheet_directory() . '/functions';
$img_url = get_home_url() . '/wp-content/uploads';
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
get_template_part('template-parts/head/slickslide');
get_template_part('template-parts/head/equipment');
get_header();
get_template_part('template-parts/header/page-archive');
global $post;
?>
<main class="pageTemplate equipmentSingle">
  <div class="section section1">
    <div class="container">
      <div class="row itemRow">
        <div class="col-6">
          <div class="thumbnailBox">
            <div class="previewSlide">
              <?php if (empty(get_field('more_img'))) : ?>
                <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
              <?php else :
                foreach (get_field('more_img') as $mi) {
                  echo <<<HTML
                  <div class="slide">
                    <div class="imgWrap">
                      <img src="$mi" alt="" />
                    </div>
                  </div>
HTML;
                }
              endif ?>
            </div>
            <div class="moreThumbnailSlide">
              <?php
              foreach (get_field('more_img') as $mi) {
                echo <<<HTML
                <div class="slide">
                  <div class="imgWrap">
                    <img src="$mi" alt="" />
                  </div>
                </div>
HTML;
              }
              ?>
            </div>
          </div>
        </div>
        <div class="col-6 contentCol">
          <div class="cat">
            <?php
            $taxo = get_the_terms($post, 'equipment_cat');
            foreach ($taxo as $tax) {
              echo "<span title=\"{$tax->name}\">" . $tax->name . "</span>";
            }
            ?>
          </div>
          <div class="title">
            <?php echo get_the_title() ?>
          </div>
          <div class="h2_description">
            <?php echo get_field('h2_desc') ?>
          </div>
          <div class="description">
            <?php echo get_field('description') ?>
          </div>
          <table class="table">
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
        </div>
      </div>

      <div class="row m-0">
        <?php
        $re = get_field('related-equipment');
        $colClass = count($re) % 2 === '0' ? 'col-6' : 'col';
        if (!empty($re)) {
          echo <<<HTML
          <div class="col-12 re p-0">
            <div class="title">관련장비</div>
          </div>
HTML;
          foreach ($re as $key => $r) {
            if ($key > 2) break;
            echo <<<HTML
            <div class="$colClass px-0">
              <div class="rWrap">
                <div class="left">
                  <div class="title">
                    $r->post_title
                  </div>
                  <ul class="r">
HTML;
            foreach (get_field('table', $r->ID) as $tt) {
              $name = $tt['name'];
              $value = $tt['value'];
              echo <<<HTML
                <li>
                  <div class="name">$name</div>
                  <div class="value">$value</div>
                </li>
HTML;
            }
            $thumbnail = get_the_post_thumbnail_url($r);
            $url = get_the_permalink($r);
            echo <<<HTML
                  </ul>
                </div>
                <div class="right">
                  <a href="$url" class="btn">
                    <img src="$zeplin/btn-link-btn.png" srcset="$zeplin/btn-link-btn@2x.png 2x, $zeplin/btn-link-btn@3x.png 3x">
                  </a>
                  <div>
                    <img class="thumbnail" src="$thumbnail" alt="">
                  </div>
                </div>
              </div>
            </div>
HTML;
          }
        }
        ?>
      </div>
    </div>
  </div>
  <div class="section section2">
    <?php if ($ss = get_field('solutions')) : ?>
      <div class="container">
        <div class="sectionTitle">
          솔루션
          <p>청소장비를 활용할 수 있는 다양한 사용 환경들을 확인해보세요.</p>
        </div>
        <div class="row">
          <?php foreach ($ss as $s) {
            $thumbnail = get_the_post_thumbnail_url($s, 'full');
            $title = get_the_title($s);
            $ec = get_the_excerpt($s);
            echo <<<HTML
            <div class="col">
              <div class="solution">
                <div class="imgWrap">
                  <img src="$thumbnail" alt="">
                </div>
                <div class="content">
                  <div class="title">$title</div>
                  <div class="excerpt">$ec</div>
                </div>
              </div>
            </div>
HTML;
          }
          ?>
        </div>
      </div>
    <?php endif ?>
  </div>
  <div class="section section3">
    <?php if ($vv = get_field('util')) : ?>
      <div class="container">
        <div class="sectionTitle">
          활용방법
          <p>청소장비의 작동 모습, 관리 방법, 현장 작업 등을 영상으로 직접 확인해보세요. </p>
        </div>
        <div class="utilPreviewSlide">
          <?php
          foreach (get_field('util') as $ut) {
            if ($ut['acf_fc_layout'] === 'youtube') {
              $link = $ut['link'];
              echo <<<HTML
                <div class="slide">
                  <div class="videoWrap">
                    $link
                  </div>
                </div>
HTML;
            } else {
              $attachment = $ut['attachment'];
              echo <<<HTML
                <div class="slide">
                  <div class="videoWrap">
                    <video>
                      <source src="$attachment">
                    </video>
                  </div>
                </div>
HTML;
            }
          }
          ?>
        </div>
        <div class="controlSlide">
          <?php
          foreach (get_field('util') as $ut) {
            $cover = $ut['cover'];
            $name = $ut['name'];
            echo <<<HTML
            <div class="slide">
              <div class="imgWrap">
                <img src="$cover" alt="">
              </div>
              <div class="title">$name</div>
            </div>
HTML;
          }
          ?>
        </div>
      </div>
    <?php endif ?>
  </div>
  <div class="section section4">
    <?php if ($useL = get_field('use')) : ?>
      <div class="container">
        <div class="sectionTitle">
          사용현장
          <p>청소장비가 사용되고 있는 다양한 현장들을 확인해보세요. </p>
        </div>
        <div class="row">
          <?php foreach ($useL as $u) :
            $img = $u['thumbnail'];
            $lo = $u['location'];
            $ep = $u['excerpt'];
            $link = $u['link'];
            $t = $u['title'];
            $logo = '';
            if ($u['acf_fc_layout'] === 'blog') $logo = <<<HTML
            <a href="$link" class="logoWrap">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 145.69 66.53">
                <path class="cls-1" d="M45.89,49.55V19.72c0-6.88-5.44-7.78-5.44-7.78V0S56.24,1,57.16,20.1V49.55Z"/>
                <path class="cls-1" d="M64.6,33.55A16.4,16.4,0,0,1,66,26.75a18.42,18.42,0,0,1,4.23-5.85,19.65,19.65,0,0,1,6.18-3.85,19.89,19.89,0,0,1,7.25-1.34,20.49,20.49,0,0,1,7.37,1.34,19.16,19.16,0,0,1,6.17,3.85,17.6,17.6,0,0,1,4.14,5.78,17.3,17.3,0,0,1,0,13.73,17.5,17.5,0,0,1-4.14,5.78A19,19,0,0,1,91.07,50a20.49,20.49,0,0,1-7.37,1.34A19.89,19.89,0,0,1,76.45,50a19.47,19.47,0,0,1-6.18-3.85A18.42,18.42,0,0,1,66,40.34,16.36,16.36,0,0,1,64.6,33.55Zm11.46-.07A7.6,7.6,0,0,0,78.3,39a7.29,7.29,0,0,0,5.39,2.28,7.78,7.78,0,0,0,7.76-7.8,7.8,7.8,0,0,0-7.76-7.81A7.27,7.27,0,0,0,78.3,28,7.58,7.58,0,0,0,76.06,33.48Z"/>
                <path class="cls-1" d="M33.5,21.1c-2.5-2.88-6.67-5.39-10.67-5.25-4.68.15-8.65,1-11.64,3.57h-.14V1H0V49.19H11.05V46.85h.14a16,16,0,0,0,10,3.13c4.87,0,9.34-1.38,12.26-4.67s4.36-6.39,4.36-11.82A19.31,19.31,0,0,0,33.5,21.1ZM24,39.07a7.46,7.46,0,0,1-5.48,2.28,7.27,7.27,0,0,1-5.38-2.28,7.93,7.93,0,0,1,0-11,7.27,7.27,0,0,1,5.38-2.28,7.78,7.78,0,0,1,7.76,7.81A7.52,7.52,0,0,1,24,39.07Z"/>
                <path class="cls-1" d="M134.72,16.05v2.63h-.15c-2.67-2.43-5.4-3.48-9.73-3.48-4.84,0-9.07,1.61-12,5.08s-4.46,8.12-4.46,14q0,7.86,4,12.54a14.26,14.26,0,0,0,11.14,4.79c4.88,0,8.57-1.26,11.08-4.74h.15v2.25c0,5.82-6.18,8.78-10.67,8.33V66.2c5.38.77,11.78.47,16.26-3.8,3.78-3.58,5.38-8.74,5.38-17.21V16.05Zm-2.12,23a7.46,7.46,0,0,1-5.48,2.28,7.26,7.26,0,0,1-5.38-2.28,7.93,7.93,0,0,1,0-11,7.26,7.26,0,0,1,5.38-2.28,7.78,7.78,0,0,1,7.76,7.81A7.52,7.52,0,0,1,132.6,39.07Z"/>
              </svg>
            </a>
HTML;
            echo <<<HTML
            <div class="col">
              <a href="$link" class="imgWrap">
                <img src="$img" alt="">
              </a>
              <div class="location">$lo</div>
              <a href="$link" class="title">$t</a>
              <div class="excerpt">$ep</div>
              $logo
            </div>
HTML;
          endforeach ?>
        </div>
      </div>
    <?php endif ?>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
