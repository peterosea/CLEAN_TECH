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
get_header();
get_template_part('template-parts/header/page-archive');
global $post;
?>
<main class="pageTemplate equipmentUtilSingle equipmentSolutionSingle">
  <div class="container">
    <?php
    if (!empty($ct = get_field('contenttitle'))) echo <<<HTML
      <div class="sectionTitle important">
        $ct
      </div> 
HTML;
    if (!empty($chartGroup = get_field('chart_group'))) {
      echo '<div class="chartListWrap">';
      foreach ($chartGroup as $chart) {
        $title = $chart['chart']['title'];
        $icon = $chart['chart']['icon'];
        $className = count($chart['chart']['list']) <= 3 ? 'oneCol' : '';
        $dom = <<<HTML
        <div class="chartList $className">
          <div class="header">
            <img src="$icon" alt="">
            <span>$title</span>
          </div>
          <ul class="list">
HTML;
        foreach ($chart['chart']['list'] as $list) {
          $name = $list['name'];
          $dom .= <<<HTML
            <li>
            $name
            </li>
HTML;
        }
        $dom .= '</ul></div>';
        echo $dom;
      }
      echo '</div>';
    }
    the_content();

    if (!empty($processGroup = get_field('processGroup'))) {
      echo '<div class="processWrap">';
      foreach ($processGroup as $key => $process) {
        $key = str_pad($key + 1, 2, "0", STR_PAD_LEFT);
        $title = $process['title'];
        $content = $process['content'];
        echo <<<HTML
        <div class="process">
          <div class="header">
            <div class="step">STEP $key</div>
            $title
          </div>
          <div class="cotent">
            $content
          </div>
        </div>
HTML;
      }
      echo '</div>';
    }

    if (!empty($listGroup = get_field('list'))) {
      echo '<div class="row listWrap">';
      foreach ($listGroup as $list) {
        $thumbnail = $list['thumbnail'];
        $title = $list['title'];
        $content = $list['content'];
        echo <<<HTML
        <div class="col-12 col-sm-6 col-lg-4 mb-5">
          <div class="listItem">
            <div class="imgWrap">
              <img src="$thumbnail" alt="">
            </div>
            <div class="contentWrap">
              <div class="title">
                $title
              </div>
              <div class="content">
                $content
              </div>
            </div>
          </div>
        </div>
HTML;
      }
      echo '</div>';
    }

    if (!empty($listGroup = get_field('icon_list'))) {
      echo '<div class="row iconListWrap">';
      foreach ($listGroup as $list) {
        $thumbnail = $list['icon'];
        $title = $list['title'];
        $content = $list['content'];
        echo <<<HTML
        <div class="col-12 mb-5">
          <div class="listItem">
            <div class="imgWrap">
              <img src="$thumbnail" alt="">
            </div>
            <div class="contentWrap">
              <div class="title">
                $title
              </div>
              <div class="content">
                $content
              </div>
            </div>
          </div>
        </div>
HTML;
      }
      echo '</div>';
    }


    if (!empty($pt = get_field('program_table'))) {
      echo '<h2 class="programTableH2">프로그램 안내</h2>';
      echo '<div class="programTable row">';
      foreach ($pt as $key => $p) {
        $name = $p['name'];
        $value = $p['value'];
        echo <<<HTML
        <div class="col-1 name">$name</div>
        <div class="col-5 value">$value</div>
HTML;
      }
      echo '</div>';
    }
    ?>
  </div>
  <?php get_template_part('template-parts/footer/page'); ?>
</main>
<?php
get_footer();
