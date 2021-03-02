<div class="section section3">
  <div class="sliderWrap slickCarouselVideo">
    <?php
    $multimedia = get_posts(array(
      'post_type' => 'multimedia',
      'post_status' => 'publish'
    ));
    ?>
    <div id="slickSlideBg" class="slickSlideBg">
      <?php
      foreach ($multimedia as $p) {
        $video = get_field('video', $p->ID);
        $videoElement = '';
        if (!empty($video)) {
          $videoElement = <<<HTML
              <video id="target_$p->ID">
                <source src="$video">
              </video>
HTML;
        }
        $className = $videoElement === '' ? 'empty' : '';
        $poster = get_field('cover', $p->ID);
        echo <<<HTML
          <div class="ss-slide">
            <div class="videoWrap $className" id="videoWrap_$p->ID">
              <img src="$poster" alt="" class="poster">
              <div class="controlBtn">
                <img id="control_$p->ID" src="$zeplin/btn-play.png" srcset="$zeplin/btn-play@2x.png 2x, $zeplin/btn-play@3x.png 3x">
              </div>
              $videoElement
              <div class="bottomCover">
              </div>
            </div>
            <script>
              var control_$p->ID = document.querySelector('#control_$p->ID');
              var target_$p->ID = document.querySelector('#target_$p->ID');
              var videoWrap_$p->ID = document.querySelector('#videoWrap_$p->ID');
              control_$p->ID.addEventListener('click', function() {
                target_$p->ID.play();
                videoWrap_$p->ID.classList.add('play');
              });
              target_$p->ID.addEventListener('ended', function() {
                videoWrap_$p->ID.classList.remove('play');
              });
            </script>
          </div>
HTML;
      } ?>
    </div>
    <div id="slickSlideSmall" class="slickSlideSmall">
      <?php
      foreach ($multimedia as $p) {
        $thumbnailUrl = get_field('cover', $p);
        echo <<<HTML
            <div class="ss-slide">
              <div class="thumbnail">
                <img src="$thumbnailUrl" alt="">
              </div>
              <div class="title">
                $p->post_title
              </div>
            </div>
HTML;
      } ?>
    </div>
    <script>
      $('#slickSlideBg').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        fade: true,
        asNavFor: '#slickSlideSmall',
        draggable: false
      });
      $('#slickSlideSmall').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: false,
        dots: false,
        asNavFor: '#slickSlideBg',
        focusOnSelect: true,
        edgeFriction: true,
        // autoplay: true,
        // autoplaySpeed: 2000,
        centerMode: true,
        draggable: false,
        responsive: [{
            breakpoint: 1440,
            settings: {
              slideToShow: 5,
            }
          },
          {
            breakpoint: 1200,
            settings: {
              slideToShow: 3,
            }
          }
        ]
      });
    </script>
  </div>
</div>