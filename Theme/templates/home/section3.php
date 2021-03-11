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
        $video_link = get_field('video_link', $p->ID);
        $videoElement = '';
        if (!empty($video)) {
          $videoElement = <<<HTML
              <video id="target_$p->ID">
                <source src="$video">
              </video>
HTML;
        } else if (!empty($video_link)) {
          $videoElement = <<<HTML
          <div class="videoWrapper"><iframe id="target_$p->ID" style="overflow: hidden;" width="768" height="640" src="https://www.youtube.com/embed/$video_link?autoplay=1&controls=0&loop=1&rel=0&disablekb=1&enablejsapi=1" scrolling="no" frameborder="0" allow="autoplay; fullscreen"></iframe></div>
HTML;
        }
        $className = $videoElement === '' ? 'empty' : '';
        $poster = get_field('cover', $p->ID);
        if (!empty($video)) {
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
                  target_$p->ID.stop();
                  videoWrap_$p->ID.classList.remove('play');
                });
              </script>
            </div>
HTML;
        } else if (!empty($video_link)) {
          echo <<<HTML
          <div class="ss-slide">
            <div class="videoWrap $className" id="videoWrap_$p->ID">
              <img src="$poster" alt="" class="poster">
              <div class="controlBtn">
                <img id="control_$p->ID" src="$zeplin/btn-play.png" srcset="$zeplin/btn-play@2x.png 2x, $zeplin/btn-play@3x.png 3x">
              </div>
            </div>
            <script src="http://www.youtube.com/player_api"></script>
            <script>
              // 유튜브 동영상 로드했을때 마우스 스크롤 안먹히는 것을 해결하기 위한 코드.
              // 동영상을 정지할때마다 위에 이미지를 띄운다.
              (function($) {
                // 유튜브 동영상 타겟 정의
                var player;
                function onYouTubePlayerAPIReady(targetId) {
                    player = new YT.Player(targetId, {
                      events: {
                        'onStateChange': onPlayerStateChange
                      }
                    });
                }
                var html = '$videoElement';
                // 플레이버튼을 클릭할 때 유튜브 동영상을 로드하거나 플레이
                $("#control_$p->ID").click(function(){
                  $('#videoWrap_$p->ID').addClass('play');
                  if ($('#target_$p->ID').length == 0) {
                    $('#videoWrap_$p->ID').append(html);
                    onYouTubePlayerAPIReady(target_$p->ID);
                  } else {
                    player.playVideo();
                  }
                });
                // 유튜브 일시정지 했을때 이미지 로드
                function onPlayerStateChange(event) {        
                  if (event.data == YT.PlayerState.PAUSED){ 
                    $('#videoWrap_$p->ID').removeClass('play');
                  }
                }
              })( jQuery );
            </script>
          </div>
HTML;
        }
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