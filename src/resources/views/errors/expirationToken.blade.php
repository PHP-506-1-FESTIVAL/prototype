<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="x-ua-compatible" content="ie=edge" />
  <title>401 에러</title>
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png" />
  <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png" />
  <!-- Place favicon.ico in the root directory -->

  <!-- Web Font -->
  <link
  href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

  <!-- ========================= CSS here ========================= -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
   <link rel="stylesheet" href="{{asset('css/festival_talktalk.css')}}">
   <link rel="stylesheet" href="{{asset('css/mainpage.css')}}">
   <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
   <link rel="stylesheet" href="/assets/css/LineIcons.2.0.css" />
   <link rel="stylesheet" href="/assets/css/animate.css" />
   <link rel="stylesheet" href="/assets/css/tiny-slider.css" />
   <link rel="stylesheet" href="/assets/css/glightbox.min.css" />
   <link rel="stylesheet" href="/assets/css/main.css" />
   <link rel="stylesheet" href="/css/board.css">
</head>

<body>
  <!-- Preloader -->
  <div class="preloader">
    <div class="preloader-inner">
        <div class="preloader-icon">
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- /End Preloader -->

  <!-- Start Error Area -->
  <div class="error-area">
    <div class="d-table">
      <div class="d-table-cell">
        <div class="container">
          <div class="error-content">
            <h1>401</h1>
            <h2>토큰이 만료되었습니다.</h2>
            <p>페이지가 존재하지 않거나 사용할 수 없는 페이지입니다.<br>다시한번 신청해주세요.</p>
            <div class="button">
              <a href="{{route('main')}}" class="btn">메인으로 이동</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Error Area -->

  <!-- ========================= JS here ========================= -->
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/tiny-slider.js"></script>
  <script src="assets/js/glightbox.min.js"></script>
  <script>
  window.onload = function () {
        window.setTimeout(fadeout, 500);
    }

    function fadeout() {
        document.querySelector('.preloader').style.opacity = '0';
        document.querySelector('.preloader').style.display = 'none';
    }
  </script>
</body>

</html>
