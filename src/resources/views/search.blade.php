@extends('layout.layout')

@section('content')

<body>
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
    <section class="section latest-news-area blog-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="row">
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
                    </div>
                </div>
                <aside class="col-lg-4 col-md-5 col-12">
                    <div class="sidebar blog-grid-page">
                        <div class="widget categories-widget">
                            <h5 class="widget-title"><span>인기검색어</span></h5>
                            <ul class="custom">
                                @foreach ($recommend as $item)
                                    <li>
                                        <a href="#">{{$item->select_cnt}}<span>{{$item->cs}}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="widget sidebar-as">
                            <h5 class="widget-title"><span>축제요청 페이지</span></h5>
                            <a href="{{route('main.request')}}">
                                <img src="{{asset('img/ad.jpg')}}" alt="#">
                            </a>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>
</body>
@endsection
