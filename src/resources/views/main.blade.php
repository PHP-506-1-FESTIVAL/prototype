@extends('layout.layout')

@section('content')

{{-- 축제 배너 --}}
<div class="margindiv"></div>

@include('layout.weather')

<div class="profile-container">
	<div class="profile-box" style="background-image: url('https://korean.visitkorea.or.kr/kfes/upload/contents/db/4300fc7c-4d4b-4d40-85d3-c92c69fa52bb_6.png');">
		<div class="profile-box-content">
			<h2 style="color:white;">쁘띠프랑스 & 이탈리아마을 베니스가면축제</h2>
			<p>한국 안에 작은 유럽마을 쁘띠프랑스 & 이탈리아마을</p>
		</div>
	</div>
	<div class="profile-box" style="background-image: url('https://cdn.visitkorea.or.kr/img/call?cmd=VIEW&id=58a44a35-5f34-4a39-a780-a292d8e76a3d');">
		<div class="profile-box-content">
			<h2 style="color:white;">부산 감천문화마을</h2>
			<p>반려동물과 어린왕자 포토존에서 견생샷 남길 수 있는 곳</p>
		</div>
	</div>
	<div class="profile-box" style="background-image: url('https://cdn.visitkorea.or.kr/img/call?cmd=VIEW&id=e223d74e-888e-4e7f-9030-0eafdf96e094');">
		<div class="profile-box-content">
			<h2 style="color:white;">스페이스워크</h2>
			<p>포항의 아름다운 풍경과 제철소의 야경을 두눈에 담을 수 있는 곳</p>
		</div>
	</div>
</div>

{{-- 공지사항 후순위--}}
<div class="notice_section">
    <div class="noticebox" id="noticebox">
    @foreach($notice as $key => $val)
        <div class="line_notice">
            <div></div>
            <div>
                <a href="{{route('notice.show', $notice[$key]->notice_id)}}"><i class="lni lni-bullhorn" style="margin-right:5px;"></i> {{ $notice[$key]->notice_title }}</a>
            </div>
        </div>
    @endforeach
    </div>
</div>

{{-- 지도 --}}
<div class="row">
    <div class="col-sm-5">
        <div class="row">
            <div class="search-form wow fadeInUp row" data-wow-delay=".4s">
                <div class="search-input col-6">
                    <label for="category"><i class="lni lni-calendar"></i></label>
                    <select name="category" id="category" onchange="changeText()">
                        @foreach ($month as $item)
                            @if ($item)
                                <option value="{{$item}}">
                                    {{$item}}월
                                </option>
                            @else
                                <option value="" selected>
                                    전체
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="search-input col-6">
                    <label for="category2"><i class="lni lni-map-marker"></i></i></label>
                    <select name="category2" id="category2" onchange="changeArea()">
                        <option value="" id="selectAC0" selected>전체</option>
                        @foreach ($area as $key => $item)
                            @if ($item)
                                <option value="{{$key}}" id="{{'select'.$key}}">
                                    {{$item}}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row wow fadeInUp" style="display:grid; justify-content:center;" data-wow-delay=".4s">
            <div class="krmap" style="width:600px;">
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="Layer_1" x="0" y="0" style="enable-background:new 0 0 169.5 225.3" version="1.1" viewBox="0 0 169.5 225.3"><style>.st0{fill:#cccccc;stroke:#fff;stroke-miterlimit:10}</style><path id="AC39" d="m35.4 195-20.6 9.7 7.2 9.7 22.6-4.2 5.3-9-14.5-6.2z" class="st0"/><path id="AC36" d="M92.7 121.6H90l-8.8 11.5 2.4 6.8-4.3 4.8 2.2 8.5 5 10.3 1.4 8.3h1.8l4.9 2.8 2.7-5.3 7.6-.8 3.5 4.7 6.8 2.2 7-11.5 16.6-8.2 2.4-3.1-3.2-6.3v-2.7l-6.8-5.8 1.6-4.1-8.5 3.5-20.6-4.1-5.5-9-5.5-2.5z" class="st0"/><path id="AC38" d="m39.2 134-6.3 10.2.6 3.1-8.9 1.9.7 5.5-4.7 3.6-3.9 14.3 5.5 1.7L13 186l2.9 6.2 9.3-3.5.3-3.8 7.7-1.8 26.9 6.4 1.9-3.7 7.6-2.9L72 185l3.4-1.5.6-7.3 11.9-4.4-1.4-8.3-5-10.3-2.2-8.5-13.1.4-13.3-8.4-8.9 5.5-4.8-8.2z" class="st0"/><path id="AC37" d="M43.5 109.6v2.5l3.9 5.9-6.7 8.5-1.5 7.5 4.8 8.2 8.9-5.5 13.3 8.4 13.1-.4 4.3-4.8-2.4-6.8 8.8-11.5h2.7v-5.8l-15.9.6-3-6.8h-4.3l-5.3 3.4-6.5-1.6-6.3 2.8-7.9-4.6z" class="st0"/><path id="AC32" d="m74.5 14.9 1.9 6.9L87.3 33v10.5l8 4.5-3.6 15.1 3.6 2.5 12.4-3 13.6 8.4 21.3.6 5.3-7.6-27.4-54.1-2.8-1.5-2.6 3.5-6.6-.1-3.2 4.5-15 1.5-15.8-2.9z" class="st0"/><path id="AC33" d="m76.2 74.1 8.6-6.4 9-3.2 1.5 1.1 12.4-3 10.9 6.8-4.1 12.6-7.3-2.7-13 9.1 1 1.5-3.2 11.6 4.6 4.7-3.9 9.6-10 .4.6-3.9-1.4-7v-6.5l-5.7-6.3-1.7-9.1 3.8-3.2-2.1-6.1z" class="st0"/><path id="AC31" d="m39.2 36.2 6.3 13.9 8.4 2.4-3.4 8.2 3.4 3.3v4.1l3.7 4.8 18.6 1.2 8.6-6.4 9-3.2-2.1-1.4L95.3 48l-8-4.5V33L76.4 21.8l-1.9-6.9-11.1 4.8-.1 2.1-7.2 4.3 1.7 6.1-4.7 2.5-7.4-4.9-6.5 6.4z" class="st0"/><path id="AC7" d="m148.8 135.1-10.4-3.6-5.6 2.2-1.6 4.1 6.8 5.8v2.7l3.2 6.3 3.5-4.9 4.1-12.6z" class="st0"/><path id="AC35" d="m148.8 78.5 3.3 6.1-4.2 32.7 4.2-1.7.8 9.1-4.1 10.4-10.4-3.6-14.1 5.7-20.6-4.1-5.5-9-5.5-2.5v-5.8l3.9-9.6-4.6-4.7 3.2-11.6-1-1.5 13-9.1 7.3 2.7 4.1-12.6 2.7 1.6 21.3.6 5.3-7.6.9 14.5z" class="st0"/><path id="AC2" d="m49.5 37.2 1.2 6.4 7.6-1.3.9 7.7-5.3 2.5-8.4-2.4-6.3-13.9 6.5-6.4 6 4-2.2 3.4z" class="st0"/><path id="AC34" d="M45.2 65.1s-12.7 9.5-12.8 10c-.1.4 0 8.5 0 8.5l4.9.9.1 9.5 8.8 5.4-2.9 5.2.2 5 7.9 4.6 6.3-2.8 6.6 1.6 5.2-3.4h4.3l3 6.9 6-.2.6-4-1.4-6.9v-6.6l-5.7-6.3-1.8-9.1 3.8-3.2-2-6.1-18.6-1.2-3.7-4.8-8.8-3zm-13.6 20-4.5 9.6 2.2 6.8 6.9-5.7-4.6-10.7z" class="st0"/><path id="AC8" d="M73.8 95.8 67.3 81l8 1.1-.8 1.3 1.7 9.1-2.4 3.3z" class="st0"/><path id="AC1" d="m65.4 40-6.9 4.5.5 4.3 5.6 2.4 9-1.5v-3.6L65.4 40z" class="st0"/><path id="AC3" d="m76.2 92.5-5.6 7.8 5.6 5.9 5.7-.9v-6.5l-5.7-6.3z" class="st0"/><path id="AC4" d="m118.6 118-9.2 5.1.8 4.6-1.7 6.3 5.1 1.1 9.4-10.5-4.4-6.6z" class="st0"/><path id="AC6" d="m125.1 152.6-1 3.4-12.9 3.2 3.3 3.9 7.1-1.9.6 2.7 16.6-8.2 2.4-3.1-3.2-6.3-12.9 6.3z" class="st0"/><path id="AC5" d="m45.4 145.1-2.1 4.5 6.6 6.4 9.5-4.8-3.7-5-10.3-1.1z" class="st0"/></svg>
            </div>
        </div>
    </div>
    <div class="col-sm-7 row container text-end">
        <section class="browse-cities section">
            <div class="container">
                <div class="row" id="Recommend" style="display:grid; grid-template-columns:1fr 1fr; grid-template-rows: 375px auto;">
                    @foreach ($fesData as $item)
                        <div class="col-12">
                            <div class="single-city wow fadeInUp" data-wow-delay=".2s">
                                <a href="{{route('fes.detail',['id'=>$item->festival_id])}}" class="info-box">
                                    <div class="image">
                                        @if ($item->poster_img)
                                            <img src="{{$item->poster_img}}" alt="{{$item->festival_title}}" class="img-fluid" style="width:550px; height:360px; object-fit:cover;">
                                        @else
                                            <img src='{{asset('img/festival.jpg')}}' alt="{{$item->festival_title}}" class="img-fluid" style="width:550px; height:360px; object-fit:cover;">
                                        @endif
                                    </div>
                                    <p class="date {{$item->statusClass}}">{{$item->statusText}}</p>
                                    <div class="content" style="text-align: left!important;">
                                        <h4 class="name">
                                            {{$item->festival_title}}
                                            <span>{{$item->festival_start_date}}~{{$item->festival_end_date}}</span>
                                            <span>{{$item->area_code}}</span>
                                        </h4>
                                    </div>
                                    <div class="more-btn">
                                        <i class="lni lni-circle-plus"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div></div>
                    <div class="button" style="padding: 10px; margin: 10px;">
                        <button type="button" class="btn" onclick="FesSub()">더보기</button>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<form action="{{route('main.FesOrder')}}" method="post" id="fesOrderFrm">
    @csrf
    <input type="hidden" name="fesStr" id="fesOrederIp" value=",">
</form>
<script src="{{asset('js/main.js')}}"></script>
<script src="/js/noticeswiper.js"></script>

@endsection
