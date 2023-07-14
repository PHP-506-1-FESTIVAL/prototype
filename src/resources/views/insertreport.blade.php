<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>신고하기</title>
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="/assets/images/favicon.png" />
    <!-- Web Font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/festival_talktalk.css')}}">
    <link rel="stylesheet" href="{{asset('css/mainpage.css')}}">
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/assets/css/LineIcons.2.0.css" />
    <link rel="stylesheet" href="/assets/css/animate.css" />
    <link rel="stylesheet" href="/assets/css/tiny-slider.css" />
    <link rel="stylesheet" href="/assets/css/glightbox.min.css" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/css/board.css"> {{-- add0627.shin --}}
    {{-- <link rel="stylesheet" href="/css/comment.css"> 콘솔창 에러로 주석 --}}
</head>
<body>
    <!-- Start Search Form -->
    <div class="search-form style2 wow fadeInRight" data-wow-delay=".5s" style="margin:0;">
        <h3 class="heading-title">신고하기</h3>
        <p class="sub-heding-text">신고해주신 내용은 담당자가 확인한 후 운영원칙에 따라 적절한 조치를 취하고 있습니다.</p>
        <form action="{{route('insert.post')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="search-input">
                        <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                        <select name="reason" id="category" required>
                            <option value="" selected disabled>신고 사유 선택</option>
                            <option value="0">영리/홍보</option>
                            <option value="1">음란물</option>
                            <option value="2">욕설/비하</option>
                            <option value="3">신상노출</option>
                            <option value="4">도배</option>
                            <option value="5">기타</option>
                        </select>
                    </div>
                </div>
                <div class="col-12">
                    <div class="search-input">
                        <label for="detail"><i class="lni lni-pencil-alt theme-color"></i></label>
                        <input type="text" name="detail" id="detail" placeholder="상세 내용 입력">
                        <input type="hidden" value="">
                    </div>
                </div>
                <div class="col-12">
                    <div class="search-btn button">
                        <button class="btn" type="submit"><i class="lni lni-telegram-original"></i> 보내기</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End Search Form -->

        <!-- ========================= JS here ========================= -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/wow.min.js"></script>
    <script src="/assets/js/tiny-slider.js"></script>
    <script src="/assets/js/glightbox.min.js"></script>
    <script src="/assets/js/main.js"></script>
    <script type="text/javascript">
        //========= Category Slider
        tns({
            container: '.category-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 2,
                },
                768: {
                    items: 4,
                },
                992: {
                    items: 5,
                },
                1170: {
                    items: 6,
                }
            }
        });

        //========= testimonial
        tns({
            container: '.testimonial-slider',
            items: 3,
            slideBy: 'page',
            autoplay: false,
            mouseDrag: true,
            gutter: 0,
            nav: true,
            controls: false,
            controlsText: ['<i class="lni lni-arrow-left"></i>', '<i class="lni lni-arrow-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 1,
                },
                768: {
                    items: 2,
                },
                992: {
                    items: 2,
                },
                1170: {
                    items: 2,
                }
            }
        });
    </script>
</body>
</html>