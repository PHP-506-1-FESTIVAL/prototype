@extends('layout.layout')

@section('content')
{{-- <div class="margindiv"></div>
<span>"{{$search}}"의검색 결과 페이지 입니다</span>
<div class="row">
    <div class="col-9">
        <table class="table">
            <caption></caption>
            <colgroup>
                <col width="10%"/>
                <col width="80%"/>
                <col width="10%"/>
            </colgroup>
            <thead>
                <tr>
                    <th scope="col">이미지</th>
                    <th scope="col">제목</th>
                    <th scope="col">축제기간</th>

                </tr>
            </thead>
            <tbody class="table-group-divider container">
                @forelse($result as $item)
                    <tr>
                        <td><img src="{{$item->poster_img}}" alt="{{$item->festival_title}}" loading="lazy" class="img-fluid"></td>
                        <td><a href="{{route('fes.detail',['id'=>$item->festival_id])}}">{{$item->festival_title}}</a></td>
                        <td><div>
                            {{$item->festival_start_date}}
                            <br><br>
                            {{$item->festival_end_date}}
                        </div></td>
                    </tr>
                @empty
                    <tr>
                        <td></td>
                        <td>검색결과 없음</td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="row col-3">
            <ol class="list-group list-group-numbered">
                @foreach ($recommend as $item)
                <li class="list-group-item">
                    {{$item->select_cnt}}
                </li>
                @endforeach
            </ul>
            <div><a href="{{route('main.request')}}">축제 요청 페이지 이동</a></div>
    </div>
</div> --}}
<body>
    <!--[if lte IE 9]>
        <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p>
    <![endif]-->


    <!-- Start Header Area -->
    <!-- End Header Area -->

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">"{{$search}}"검색결과 페이지입니다.</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">Home</a></li>
                        <li>검색결과</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Blog Singel Area -->
    <section class="section latest-news-area blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row">
                        <!-- Single News -->
                        @forelse ($result as $item)
                        <div class="col-lg-6 col-12">
                            <div class="single-news wow fadeInUp" data-wow-delay=".2s">
                                <div class="image">
                                    <a href="{{route('fes.detail',['id'=>$item->festival_id])}}"><img class="thumb" src="{{$item->poster_img}}" alt="{{$item->festival_title}}" loading="lazy"></a>
                                </div>
                                <div class="content-body">
                                    <h4 class="title"><a href="{{route('fes.detail',['id'=>$item->festival_id])}}">{{$item->festival_title}}</a></h4>
                                    <div class="meta-details">
                                        <ul>
                                            <li><a href="{{route('fes.detail',['id'=>$item->festival_id])}}">{{$item->festival_start_date}}~{{$item->festival_end_date}}</a></li>
                                            <li><a href="{{route('fes.detail',['id'=>$item->festival_id])}}">{{$item->area_code}}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                            @empty
                            검색결과 없음
                            @endforelse

                            <!-- End Single News -->
                    </div>
                    <!-- Pagination -->
                    {{-- <div class="pagination left blog-grid-page">
                        <ul class="pagination-list">
                            <li><a href="javascript:void(0)"><i class="lni lni-chevron-left"></i></a></li>
                            <li class="active"><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">4</a></li>
                            <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
                        </ul>
                    </div> --}}
                    <!--/ End Pagination -->
                </div>
                <aside class="col-lg-4 col-md-5 col-12">
                    <div class="sidebar blog-grid-page">
                        <!-- Start Single Widget -->

                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->

                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="widget categories-widget">
                            <h5 class="widget-title"><span>Categories</span></h5>
                            <ul class="custom">
                                @foreach ($recommend as $item)
                                    <li>
                                        <a href="#">{{$item->select_cnt}}<span>{{$item->cs}}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->

                        <!-- End Single Widget -->
                        <!-- Start Single Widget -->
                        <div class="widget sidebar-as">
                            <h5 class="widget-title"><span>축제요청 페이지</span></h5>
                            <a href="{{route('main.request')}}">
                                <img src="https://via.placeholder.com/780x1300" alt="#">
                            </a>
                        </div>
                        <!-- End Single Widget -->
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- End Blog Singel Area -->

    <!-- Start Newsletter Area -->

    <!-- End Newsletter Area -->

    <!-- Start Footer Area -->
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    {{-- <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/tiny-slider.js"></script>
    <script src="assets/js/glightbox.min.js"></script>
    <script src="assets/js/main.js"></script> --}}
</body>

</html>
@endsection
