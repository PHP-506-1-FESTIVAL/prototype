@extends('layout.layout')

@section('title','테마')

@section('content')

    <div class="margindiv"></div>

    <div class="themebanner" id="themebanner"></div>

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
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/jobs.svg" alt="#">
                                </div>
                                <h3>Jobs</h3>
                                <h5 class="total">44</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/real-estate.svg" alt="#">
                                </div>
                                <h3>Real Estate</h3>
                                <h5 class="total">65</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/laptop.svg" alt="#">
                                </div>
                                <h3>Education</h3>
                                <h5 class="total">35</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/hospital.svg" alt="#">
                                </div>
                                <h3>Health & Beauty</h3>
                                <h5 class="total">22</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/tshirt.svg" alt="#">
                                </div>
                                <h3>Fashion</h3>
                                <h5 class="total">25</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/education.svg" alt="#">
                                </div>
                                <h3>Education</h3>
                                <h5 class="total">42</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/controller.svg" alt="#">
                                </div>
                                <h3>Gadgets</h3>
                                <h5 class="total">32</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/travel.svg" alt="#">
                                </div>
                                <h3>Backpacks</h3>
                                <h5 class="total">15</h5>
                            </a>
                            <!-- End Single Category -->
                            <!-- Start Single Category -->
                            <a href="category.html" class="single-cat">
                                <div class="icon">
                                    <img src="/assets/images/categories/watch.svg" alt="#">
                                </div>
                                <h3>Watches</h3>
                                <h5 class="total">65</h5>
                            </a>
                            <!-- End Single Category -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /End Categories Area -->

    <div class="margindiv"></div>

    <!-- Start Latest News Area -->
    <div class="latest-news-area section">
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
    
    function themeclick(e, k) {
        let banner = document.getElementById('themebanner');
        let url = '/api/theme/' + k
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
            let themearr = apiData['data'];
            themearr.forEach((item, index, array) => {
                console.log(item);
                result.innerHTML += "<div class='col-lg-4 col-md-6 col-12 mb-4'><div class='single-news wow fadeInUp' data-wow-delay='.5s'><div class='image'><a href='blog-single-sidebar.html'><img class='thumb' src=" + item['poster_img'] + " alt='#' style='width:400px; height:230px; object-fit: cover;'></a></div><div class='content-body'><h4 class='title'><a href='blog-single-sidebar.html'>" + item['festival_title'] + "</a></h4><div class='meta-details'><ul><li><a href='javascript:void(0)'>" + item['festival_start_date'] + " ~ " + item['festival_end_date'] + "</a></li><li><a href='javascript:void(0)'>" + item['area_code'] + "</a></li></ul></div></div></div></div>";
            });
        })
        // 에러는 alert로 처리
        .catch(error => alert(error.message));
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