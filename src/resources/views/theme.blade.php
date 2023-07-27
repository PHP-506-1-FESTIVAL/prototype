@extends('layout.layout')

@section('title','테마별 축제')

@section('content')

    <div class="margindiv"></div>

    <section class="hero-area themebanner" id="themebanner">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                    <div class="hero-text text-center">
                        <div class="section-heading themeheader">
                            <h2 class="wow fadeInUp" data-wow-delay=".3s">다채로운 즐거움이 가득!</h2>
                            <h5 class="wow fadeInUp" data-wow-delay=".5s" style="color:white; font-weight:300"><span class="msgs">마실가실</span>이 준비한 추천 테마축제</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Categories Area -->
    <section class="categories">
        <div class="container">
            <div class="cat-inner">
                <div class="row">
                    <div class="col-12 p-0">
                        <div class="category-slider">
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('flower', '꽃')" class="single-cat" id="flower">
                                <div class="icon">
                                    <i class="lni lni-flower" style="font-size:2.3rem"></i>
                                </div>
                                <h3>꽃</h3>
                                <h5 class="total">35</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('food', '먹거리')" class="single-cat" id="food">
                                <div class="icon">
                                    <i class="lni lni-dinner" style="font-size:2.3rem"></i>
                                </div>
                                <h3>먹거리</h3>
                                <h5 class="total">22</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('swim', '물놀이')" class="single-cat" id="swim">
                                <div class="icon">
                                    <i class="lni lni-island" style="font-size:2.3rem"></i>
                                </div>
                                <h3>물놀이</h3>
                                <h5 class="total">55</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('drink', '주류')" class="single-cat" id="drink">
                                <div class="icon">
                                    <i class="lni lni-juice" style="font-size:2.3rem"></i>
                                </div>
                                <h3>주류</h3>
                                <h5 class="total">21</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('music', '음악')" class="single-cat">
                                <div class="icon">
                                    <i class="lni lni-music" style="font-size:2.3rem"></i>
                                </div>
                                <h3>음악</h3>
                                <h5 class="total">44</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('activity', '액티비티')" class="single-cat">
                                <div class="icon">
                                    <i class="lni lni-bi-cycle" style="font-size:2.3rem"></i>
                                </div>
                                <h3>액티비티</h3>
                                <h5 class="total">65</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('culture', '문화')" class="single-cat">
                                <div class="icon">
                                    <i class="lni lni-flags" style="font-size:2.3rem"></i>
                                </div>
                                <h3>문화</h3>
                                <h5 class="total">35</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('nature', '자연')" class="single-cat">
                                <div class="icon">
                                    <i class="lni lni-sprout" style="font-size:2.3rem"></i>
                                </div>
                                <h3>자연</h3>
                                <h5 class="total">22</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="javascript:themeclick('concert', '콘서트')" class="single-cat">
                                <div class="icon">
                                    <i class="lni lni-microphone" style="font-size:2.3rem"></i>
                                </div>
                                <h3>콘서트</h3>
                                <h5 class="total">22</h5>
                            </a>
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Categories Area -->

    <!-- Start Single Widget -->
    <div class="widget popular-tag-widget areatag d-flex justify-content-center" style="margin-top:150px;">
        <div class="tags">
            <a href="javascript:void(0)" id="area0" class="themeactive">전체</a>
            <a href="javascript:areaclick(1)" id="area1">서울</a>
            <a href="javascript:areaclick(2)" id="area2">인천</a>
            <a href="javascript:areaclick(3)" id="area3">대전</a>
            <a href="javascript:areaclick(4)" id="area4">대구</a>
            <a href="javascript:areaclick(5)" id="area5">광주</a>
            <a href="javascript:areaclick(6)" id="area6">부산</a>
            <a href="javascript:areaclick(7)" id="area7">울산</a>
            <a href="javascript:areaclick(8)" id="area8">세종</a>
            <a href="javascript:areaclick(31)" id="area31">경기</a>
            <a href="javascript:areaclick(32)" id="area32">강원</a>
            <a href="javascript:areaclick(33)" id="area33">충북</a>
            <a href="javascript:areaclick(34)" id="area34">충남</a>
            <a href="javascript:areaclick(35)" id="area35">경북</a>
            <a href="javascript:areaclick(36)" id="area36">경남</a>
            <a href="javascript:areaclick(37)" id="area37">전북</a>
            <a href="javascript:areaclick(38)" id="area38">전남</a>
            <a href="javascript:areaclick(39)" id="area39">제주</a>
        </div>
    </div>
    <!-- End Single Widget -->

    <!-- Start Latest News Area -->
    <div class="latest-news-area section" style="padding-top:50px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2 class="wow fadeInUp" data-wow-delay=".4s">테마별 축제</h2>
                        <p class="wow fadeInUp" data-wow-delay=".6s">다양한 테마별로 나에게 꼭 맞는 축제를 찾아보세요.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="themeresult"></div>
        </div>
    </div>
    <!-- End Latest News Area -->

    <script type="text/javascript">

    let themestr = '';
    let areaarr = [];
    
    function themeclick(e, k) {
        areaarr = [];
        for(let i = 1; i < 9; i++) {
            document.getElementById('area' + i).classList.remove('themeactive');
        }
        for(let i = 31; i < 40; i++) {
            document.getElementById('area' + i).classList.remove('themeactive');
        }
        document.getElementById('area0').classList.add('themeactive');
        themestr = k;
        let banner = document.getElementById('themebanner');
        let url = '/api/theme/' + k + '/blank'
        let result = document.getElementById('themeresult');
        banner.style.backgroundImage = "url('/assets/images/themes/" + e + ".jpg')";
        result.innerHTML = "";
        // API
        fetch(url)
        .then(res => {
            if(res.status !== 200) {
                throw new Error(res.status + ' : API Response Error' );
            }
            return res.json();})
        .then(apiData => {
            let themearr = apiData;
            themearr.forEach((item, index, array) => {
                result.innerHTML += "<div class='col-lg-4 col-md-6 col-12 mb-4'><div class='single-news wow fadeInUp' data-wow-delay='.5s'><div class='image'><a href='/fesdetail/" + item['festival_id'] +"'><img class='thumb' src=" + item['poster_img'] + " alt='#' style='width:410px; height:230px; object-fit: cover;'></a></div><div class='content-body'><h4 class='title'><a href='blog-single-sidebar.html'>" + item['festival_title'] + "</a></h4><div class='meta-details'><ul><li><a href='javascript:void(0)'>" + item['festival_start_date'] + " ~ " + item['festival_end_date'] + "</a></li><li><a href='javascript:void(0)'>" + item['area_code'] + "</a></li></ul></div></div></div></div>";
            });
        })
        // 에러는 alert로 처리
        .catch(error => alert(error.message));
    }

    function areaclick(e) {
        let url = '/api/theme/' + themestr;
        let areaa = document.getElementById('area' + e);
        let result = document.getElementById('themeresult');
        result.innerHTML = "";
        if(areaarr.includes(e)) {
            for(let i = 0; i < areaarr.length; i++) {
                if (areaarr[i] === e) {
                    areaarr.splice(i, 1);
                }
            }
        } else {
            areaarr.push(e);
        }
        let areastr = areaarr.join('+');

        document.getElementById('area0').classList.remove('themeactive');

        if(areaarr.length == 0) {
            areastr = 'blank';
            document.getElementById('area0').classList.add('themeactive');
        }

        url = 'api/theme/' + themestr + '/' + areastr;
                // API
        fetch(url)
        .then(res => {
            if(res.status !== 200) {
                throw new Error(res.status + ' : API Response Error' );
            }
            return res.json();})
        .then(apiData => {
            let themearr = apiData;
            themearr.forEach((item, index, array) => {
                result.innerHTML += "<div class='col-lg-4 col-md-6 col-12 mb-4'><div class='single-news wow fadeInUp' data-wow-delay='.5s'><div class='image'><a href='/fesdetail/" + item['festival_id'] +"'><img class='thumb' src=" + item['poster_img'] + " alt='#' style='width:410px; height:230px; object-fit: cover;'></a></div><div class='content-body'><h4 class='title'><a href='blog-single-sidebar.html'>" + item['festival_title'] + "</a></h4><div class='meta-details'><ul><li><a href='javascript:void(0)'>" + item['festival_start_date'] + " ~ " + item['festival_end_date'] + "</a></li><li><a href='javascript:void(0)'>" + item['area_code'] + "</a></li></ul></div></div></div></div>";
            });
        })
        // 에러는 alert로 처리
        .catch(error => alert(error.message));

        areaa.classList.toggle('themeactive');
    }
    
    </script>

    <script src="/assets/js/tiny-slider.js"></script>

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



@endsection