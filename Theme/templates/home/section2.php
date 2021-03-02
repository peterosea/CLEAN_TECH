<div class="section section2">
  <div class="container">
    <h1 class="sectionTitle">위생 솔루션 트렌드</h1>
    <div class="row">
      <div class="col col-5">
        <div class="card active">
          <div class="head">
            <div class="title">렌탈 케어</div>
            <a href="/rental-care" class="btn">
              <img src="<?php echo $zeplin ?>/2611.svg" alt="">
            </a>
          </div>
          <div class="body">
            <p>
              코엑스, 쿠팡, 인천공항, GS리테일 등 1,000대 렌탈<br />
              장비 정기 점검, 관리 리포트 제공 등 믿을 수 있는 렌탈 프로그램
            </p>
            <ul class="_active">
              <li>
                <img src="<?php echo $zeplin ?>/coex.png" srcset="<?php echo $zeplin ?>/coex@2x.png 2x, <?php echo $zeplin ?>/coex@3x.png 3x">
              </li>
              <li>
                <img src="<?php echo $zeplin ?>/coupang.png" srcset="<?php echo $zeplin ?>/coupang@2x.png 2x, <?php echo $zeplin ?>/coupang@3x.png 3x">
              </li>
              <li>
                <img src="<?php echo $zeplin ?>/incheon.png" srcset="<?php echo $zeplin ?>/incheon@2x.png 2x, <?php echo $zeplin ?>/incheon@3x.png 3x">
              </li>
              <li>
                <img src="<?php echo $zeplin ?>/gsretail.png" srcset="<?php echo $zeplin ?>/gsretail@2x.png 2x, <?php echo $zeplin ?>/gsretail@3x.png 3x">
              </li>
            </ul>
          </div>
          <div class="footer">
            <div class="imgWrap">
              <img src="<?php echo $zeplin ?>/main-2-nd-1-st-img.jpg" srcset="<?php echo $zeplin ?>/main-2-nd-1-st-img@2x.jpg 2x, <?php echo $zeplin ?>/main-2-nd-1-st-img@3x.jpg 3x" class="_active">
              <img src="<?php echo $zeplin ?>/ic_rental.svg" class="_deactive">
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="head">
            <div class="title">토탈 케어</div>
            <a href="/total-care" class="btn">
              <img src="<?php echo $zeplin ?>/2611.svg" alt="">
            </a>
          </div>
          <div class="body">
            <p>
              배터리, 모터 등 추가 유지비
              없이 지속적인 장비 관리까지
              한 번에
            </p>
          </div>
          <div class="footer">
            <div class="imgWrap">
              <img src="<?php echo $zeplin ?>/totalcare.jpg" class="_active">
              <img src="<?php echo $zeplin ?>/4505.svg" class="_deactive">
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="head">
            <div class="title">자율주행
              AMR</div>
            <a href="/amr" class="btn">
              <img src="<?php echo $zeplin ?>/2611.svg" alt="">
            </a>
          </div>
          <div class="body">
            <p>
              자율주행 청소 장비를 통한
              365일 안전하고 효율적인 청소
            </p>
          </div>
          <div class="footer">
            <div class="imgWrap">
              <img src="<?php echo $zeplin ?>/AMR.jpg" class="_active">
              <img src="<?php echo $zeplin ?>/4506.svg" class="_deactive">
            </div>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card">
          <div class="head">
            <div class="title">크린스카이</div>
            <a href="/cleansky" class="btn">
              <img src="<?php echo $zeplin ?>/2611.svg" alt="">
            </a>
          </div>
          <div class="body">
            <p>
              세계 최초 살수 겸용 노면
              청소차 장비 1대로 위생과
              방역을 동시에
            </p>
          </div>
          <div class="footer">
            <div class="imgWrap">
              <img src="<?php echo $zeplin ?>/CleanSky.jpg" class="_active">
              <img src="<?php echo $zeplin ?>/5933.svg" class="_deactive">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  const trendCards = document.querySelectorAll('.section2 .card');

  for (let i = 0; i < trendCards.length; i++) {
    trendCards[i].addEventListener('click', function(e){
      e.preventDefault;
      for (let j = 0; j < trendCards.length; j++) {
        trendCards[j].classList.remove('active');
        trendCards[j].parentElement.classList.remove('col-5');
      }
      this.classList.add('active');
      this.parentElement.classList.add('col-5');
    });
  }
</script>