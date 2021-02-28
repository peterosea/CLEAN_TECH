<?php
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
$contact = get_field('contact', 'option');
$title = get_field('cTitle', 'option');
if (!empty($contact) && !empty($title)) :
?>
  <div class="pageFooter">
    <div class="container">
      <div class="sectionTitle">
        <?php echo $title ?>
      </div>
      <div class="row">
        <?php
        foreach ($contact as $key => $c) : ?>
          <div class="col-6 px-4">
            <div id="<?php if ($key === 'two') echo 'quickContact'; ?>" class="contentWrap">
              <div class="content">
                <div class="title">
                  <div class="title"><?php echo $c['title'] ?></div>
                </div>
                <p><?php echo $c['content'] ?></p>
              </div>
              <div class="imgWrap">
                <?php if (!empty($c['image'])) : ?>
                  <img src="<?php echo $c['image'] ?>" alt="">
                <?php else :
                  $imgUrl = $key === 'one' ? 'icon-counsel-product' : 'icon-tel';
                  echo <<<HTML
                <img src="$zeplin/$imgUrl.png" srcset="$zeplin/$imgUrl@2x.png 2x, $zeplin/$imgUrl@3x.png 3x">
HTML;
                endif ?>
              </div>
            </div>
          </div>
        <?php endforeach ?>
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
<?php endif ?>