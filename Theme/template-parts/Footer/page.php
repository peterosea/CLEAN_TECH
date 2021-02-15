<?php
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
?>
<div class="pageFooter">
  <div class="container">
    <div class="sectionTitle">
      “사용 환경에 따라 <span class="pointColor">장비의 운영 플랜</span>이 달라집니다.
      최적화된 장비 도입을 위해 전문 상담을 받아보세요.”
    </div>
    <div class="row">
      <div class="col-6">
        <div class="contentWrap">
          <div class="content">
            <div class="title">장비 관련 상담 문의</div>
            <p>문의사항을 남겨주시면 접수 후 1시간 내에 답변 드리겠습니다.</p>
          </div>
          <div class="imgWrap">
            <img src="<?php echo $zeplin ?>/icon-counsel-product.png" srcset="<?php echo $zeplin ?>/icon-counsel-product@2x.png 2x, <?php echo $zeplin ?>/icon-counsel-product@3x.png 3x">
          </div>
        </div>
      </div>
      <div class="col-6">
        <div id="quickContact" class="contentWrap">
          <div class="content">
            <div class="title">바로 문의 <a href="tel:070-7404-8081">070-7404-8081</a></div>
            <p>고객센터를 통해 궁금하신 사항들을 빠르고 친절하게 안내 드리겠습니다
            </p>
          </div>
          <div class="imgWrap">
            <img src="<?php echo $zeplin ?>/icon-tel.png" srcset="<?php echo $zeplin ?>/icon-tel@2x.png 2x, <?php echo $zeplin ?>/icon-tel@3x.png 3x">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
if (!wp_is_mobile()) : ?>
  <script>
    var qc = document.querySelector('#quickContact');
    qc.querySelector('a').remove();
  </script>
  <!-- Channel Plugin Scripts -->
  <script>
    (function() {
      var w = window;
      if (w.ChannelIO) {
        return (window.console.error || window.console.log || function() {})('ChannelIO script included twice.');
      }
      var ch = function() {
        ch.c(arguments);
      };
      ch.q = [];
      ch.c = function(args) {
        ch.q.push(args);
      };
      w.ChannelIO = ch;

      function l() {
        if (w.ChannelIOInitialized) {
          return;
        }
        w.ChannelIOInitialized = true;
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = 'https://cdn.channel.io/plugin/ch-plugin-web.js';
        s.charset = 'UTF-8';
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
      }
      if (document.readyState === 'complete') {
        l();
      } else if (window.attachEvent) {
        window.attachEvent('onload', l);
      } else {
        window.addEventListener('DOMContentLoaded', l, false);
        window.addEventListener('load', l, false);
      }
    })();
    ChannelIO('boot', {
      "pluginKey": "<?php echo ChannelIOpluginKey ?>",
      "customLauncherSelector": "#quickContact"
    });
  </script>
  <!-- End Channel Plugin -->
<?php endif ?>