<?php
$zeplin = get_home_url() . '/wp-content/uploads/zeplin';
$foot_address = get_field('foot_address', 2339);
$foot_phone = get_field('foot_phone', 2339);
$foot_fax = get_field('foot_fax', 2339);
$foot_copyright = get_field('foot_copyright', 2339);
$foot_additional = get_field('foot_additional', 2339);
?>
<footer class="section FNB fp-auto-height">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-lg-4 iconCol">
        <img src="<?php echo $zeplin ?>/logo-grayscale.png" srcset="<?php echo $zeplin ?>/logo-grayscale@2x.png 2x, <?php echo $zeplin ?>/logo-grayscale@3x.png 3x">
      </div>
      <div class="col-12 col-lg-8 rightCol">
        <ul class="sns">
          <li>
            <a href="https://www.youtube.com/channel/UCG7llOzV-oB1q-dMQYxEWLg" target="_blank" title="유튜브">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30">
              <path fill="#c50f1f" d="M30 23.268A6.733 6.733 0 0123.268 30H6.732A6.737 6.737 0 010 23.268V6.732A6.737 6.737 0 016.732 0h16.536A6.737 6.737 0 0130 6.732z"/>
              <path fill="#fff" d="M22 15l-11 6V9z"/>
            </svg>
            </a>
          </li>
          <li>
            <a href="https://blog.naver.com/kohyes70" target="_blank" title="블로그">
              <svg version="1.1" id="레이어_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 85 85" style="enable-background:new 0 0 85 85;" xml:space="preserve">
                <style type="text/css">
                  .st0{fill:#5ECA6A;}
                  .st1{fill:#ffffff;}
                </style>
                <g>
                  <path id="패스_1106" class="st0" d="M839.3,383.5c0,10.6-8.6,19.2-19.2,19.2h-47c-10.6,0-19.1-8.6-19.2-19.2v-47
                    c0-10.6,8.6-19.1,19.2-19.2h47c10.6,0,19.1,8.6,19.2,19.2V383.5z"/>
                  <path id="패스_29971" class="st1" d="M801,349.9c0,0-6.6-0.1-8.9,3.8v-15.4c0,0-9.1,0.1-9.7,0v40.2h9.7v-2.3
                    c2.1,2.2,5,3.4,8.1,3.4c0,0,13.4-0.4,13.4-13.3C813.6,366.4,815.4,351.2,801,349.9z M798.1,370.5c-3.1,0-5.6-2.5-5.6-5.6
                    c0-3.1,2.5-5.6,5.6-5.6c3.1,0,5.6,2.5,5.6,5.6c0,0,0,0,0,0C803.7,368,801.2,370.5,798.1,370.5z"/>
                </g>
                <g>
                  <path id="패스_1106_1_" class="st0" d="M839.3,383.5c0,10.6-8.6,19.2-19.2,19.2h-47c-10.6,0-19.1-8.6-19.2-19.2v-47
                    c0-10.6,8.6-19.1,19.2-19.2h47c10.6,0,19.1,8.6,19.2,19.2V383.5z"/>
                  <path id="패스_29971_1_" class="st1" d="M801,349.9c0,0-6.6-0.1-8.9,3.8v-15.4c0,0-9.1,0.1-9.7,0v40.2h9.7v-2.3
                    c2.1,2.2,5,3.4,8.1,3.4c0,0,13.4-0.4,13.4-13.3C813.6,366.4,815.4,351.2,801,349.9z M798.1,370.5c-3.1,0-5.6-2.5-5.6-5.6
                    c0-3.1,2.5-5.6,5.6-5.6c3.1,0,5.6,2.5,5.6,5.6c0,0,0,0,0,0C803.7,368,801.2,370.5,798.1,370.5z"/>
                </g>
                <g>
                  <path id="패스_1106_2_" class="st0" d="M84.9,65.9c0,10.5-8.5,19-19,19H19.2c-10.5,0-19-8.5-19-19V19.2c0-10.5,8.5-19,19-19h46.7
                    c10.5,0,19,8.5,19,19V65.9z"/>
                  <path id="패스_29971_2_" class="st1" d="M46.9,32.5c0,0-6.6-0.1-8.9,3.8V21.1c0,0-9.1,0.1-9.7,0V61H38v-2.3c2.1,2.2,5,3.4,8,3.4
                    c0,0,13.3-0.4,13.4-13.2C59.4,48.9,61.2,33.8,46.9,32.5z M44,53c-3.1,0-5.6-2.5-5.6-5.6c0-3.1,2.5-5.6,5.6-5.6
                    c3.1,0,5.6,2.5,5.6,5.6c0,0,0,0,0,0C49.6,50.5,47.1,53,44,53z"/>
                </g>
              </svg>
            </a>
          </li>
          <li>
            <a href="https://www.instagram.com/cleantech_co/" target="_blank" title="인스타그램">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30">
              <defs>
                <linearGradient id="linear-gradient" x1=".5" x2=".5" y1="-.119" y2="1.08" gradientUnits="objectBoundingBox">
                  <stop offset="0" stop-color="#364898"/>
                  <stop offset=".372" stop-color="#e11a70"/>
                  <stop offset=".717" stop-color="#e72634"/>
                  <stop offset="1" stop-color="#edba59"/>
                </linearGradient>
                <style>
                  .cls-1{fill:url(#linear-gradient)}
                </style>
              </defs>
              <g id="iconfinder_Instagram_glyph_svg_5335781" transform="translate(0 -.162)">
                <path id="패스_1103" d="M15 .162c-4.074 0-4.585.017-6.185.09a11.01 11.01 0 00-3.641.7 7.353 7.353 0 00-2.657 1.73 7.353 7.353 0 00-1.73 2.654 11.01 11.01 0 00-.7 3.641C.017 10.577 0 11.088 0 15.162s.017 4.585.09 6.184a11.01 11.01 0 00.7 3.641 7.353 7.353 0 001.73 2.657 7.353 7.353 0 002.657 1.73 11.011 11.011 0 003.641.7c1.6.073 2.111.09 6.185.09s4.585-.017 6.184-.09a11.01 11.01 0 003.641-.7 7.67 7.67 0 004.387-4.387 11.01 11.01 0 00.7-3.641c.073-1.6.09-2.111.09-6.184s-.017-4.585-.09-6.185a11.01 11.01 0 00-.7-3.641 7.353 7.353 0 00-1.73-2.657 7.353 7.353 0 00-2.659-1.73 11.01 11.01 0 00-3.641-.7C19.585.179 19.074.162 15 .162zm0 2.7c4.005 0 4.48.015 6.061.087a8.3 8.3 0 012.785.516 4.648 4.648 0 011.725 1.125 4.647 4.647 0 011.122 1.725A8.3 8.3 0 0127.21 9.1c.072 1.582.087 2.056.087 6.061s-.015 4.48-.087 6.061a8.3 8.3 0 01-.516 2.785 4.968 4.968 0 01-2.847 2.847 8.3 8.3 0 01-2.785.516c-1.581.072-2.056.087-6.061.087s-4.48-.015-6.061-.087a8.3 8.3 0 01-2.785-.516 4.647 4.647 0 01-1.725-1.122 4.647 4.647 0 01-1.122-1.725 8.3 8.3 0 01-.517-2.785c-.072-1.582-.087-2.056-.087-6.061s.015-4.48.087-6.061a8.3 8.3 0 01.517-2.785A4.647 4.647 0 014.429 4.59a4.648 4.648 0 011.724-1.122 8.3 8.3 0 012.785-.516c1.582-.072 2.057-.088 6.062-.088z" class="cls-1"/>
                <path id="패스_1104" d="M132.243 137.4a5 5 0 115-5 5 5 0 01-5 5zm0-12.7a7.7 7.7 0 107.7 7.7 7.7 7.7 0 00-7.7-7.7z" class="cls-1" transform="translate(-117.243 -117.243)"/>
                <path id="패스_1105" d="M365.532 90.589a1.8 1.8 0 11-1.8-1.8 1.8 1.8 0 011.8 1.8z" class="cls-1" transform="translate(-340.725 -83.434)"/>
              </g>
            </svg>
            </a>
          </li>
          <li>
            <a href="https://www.facebook.com/cleantechco/" target="_blank" title="페이스북">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30">
              <path fill="#2a4c88" d="M30 23.268A6.733 6.733 0 0123.268 30H6.732A6.737 6.737 0 010 23.268V6.732A6.737 6.737 0 016.732 0h16.536A6.737 6.737 0 0130 6.732z"/>
              <path fill="#fff" fill-rule="evenodd" d="M17.52 9.65c.5-.018 1.008-.006 1.512-.006h.205V7.025c-.27-.029-.551-.064-.832-.076-.516-.023-1.031-.047-1.553-.035a3.821 3.821 0 00-2.186.674 3.255 3.255 0 00-1.312 2.186 8.019 8.019 0 00-.094 1.125c-.012.586 0 1.172 0 1.764v.223h-2.5v2.924h2.49v7.348h3.041v-7.344h2.484c.129-.973.252-1.934.381-2.936h-.557c-.709.006-2.326 0-2.326 0s.006-1.447.023-2.08c.023-.861.538-1.124 1.224-1.148z"/>
            </svg>
            </a>
          </li>
        </ul>
        <ul class="info">
          <?php if($foot_address){ ?>
          <li>Addr. <?php echo $foot_address; ?></li>
          <?php } ?>
          <li><?php if($foot_phone){ ?><a href="tel:1544-3050">T. <?php echo $foot_phone; ?></a><?php } ?><?php if($foot_fax){ ?> <a href="tel:031-624-5219">F. <?php echo $foot_fax; ?></a><?php } ?></li>
          <?php if($foot_additional){ ?>
          <li><?php echo $foot_additional; ?></li>
          <?php } ?>
        </ul>
        <p class="copyright">COPYRIGHT © <?php echo $foot_copyright; ?><br class="d-block d-sm-none" /> ALL RIGHTS RESERVED.</p>
      </div>
    </div>
  </div>
</footer>