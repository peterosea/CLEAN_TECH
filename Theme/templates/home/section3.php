<script src="http://www.youtube.com/player_api"></script>
<script>
  $("#slickSlideBg iframe").each(function(idx) {
    $(this).addClass("data-idx-" + idx).data("idx", idx);
  });

  function getPlayer(iframe, onPlayerReady, clonned) {
    var $iframe = $(iframe);
    if ($iframe.data((clonned ? "clonned-" : "") + "player")) {
      var isReady = $iframe.data((clonned ? "clonned-" : "") + "player-ready");
      if (isReady) {
        onPlayerReady && onPlayerReady($iframe.data((clonned ? "clonned-" : "") + "player"));
      }
      return player;
    } else {
      var player = new YT.Player($iframe.get(0), {
        events: {
          'onReady': function() {
            $iframe.data((clonned ? "clonned-" : "") + "player-ready", true);
            onPlayerReady && onPlayerReady(player);
          },
          'onStateChange': function(event) {
            if (event.data == 2) {
              const iframeRoot = iframe.parentElement.parentElement;
              iframeRoot.classList.remove('play');
              $('#slickSlideSmall').removeClass('hidden');
            }
          }
        }
      });
      $iframe.data((clonned ? "clonned-" : "") + "player", player);
      return player;
    }
  }

  function updateClonnedFrames() {
    frames = $("#slickSlideBg").find(".slick-slide").not(".slick-cloned").find("iframe");
    frames.each(function() {
      var frame = $(this);
      var idx = frame.data("idx");
      clonedFrames = $("#slickSlideBg").find(".slick-cloned .data-idx-" + idx);
      clonedFrames.each(function() {
        var clonnedFrame = this;
        getPlayer(frame[0], function(player) {
          getPlayer(clonnedFrame, function(clonedPlayer) {
            console.log("clonnedPlayer", clonedPlayer);
            clonedPlayer.playVideo();
            clonedPlayer.seekTo(player.getCurrentTime(), true);
            setTimeout(function() {
              clonedPlayer.pauseVideo();
            }, 0);
          }, true);
        });
      });
    });
  }
</script>
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
          <div class="videoWrapper"><iframe id="target_$p->ID" style="overflow: hidden;" width="768" height="640" src="https://www.youtube.com/embed/$video_link?autoplay=0&controls=0&loop=1&rel=0&disablekb=1&enablejsapi=1" scrolling="no" frameborder="0" allow="autoplay; allowfullscreen"></iframe></div>
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
              $videoElement
            </div>
            <script>
              (function($) {
                $("#control_$p->ID").click(function(){
                  $('#videoWrap_$p->ID').addClass('play');
                  getPlayer(document.querySelector('#target_$p->ID'), function (player) {
                    player.playVideo();
                  });
                  $('#slickSlideSmall').addClass('hidden');
                });
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

      //reset iframe of non current slide
      $("#slickSlideBg").on('beforeChange', function(event, slick, currentSlide) {
        var currentSlide, iframe, clonedFrame;
        currentSlide = $(slick.$slider).find(".slick-current");
        iframe = currentSlide.find("iframe");
        getPlayer(iframe, function(player) {
          player.pauseVideo();
          updateClonnedFrames();
        });
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
<style>
  .hidden {
    display: none;
  }
</style>