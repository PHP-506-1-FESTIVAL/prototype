@extends('layout.layout')

@section('title', '축제정보상세')

@section('content')

<link rel="stylesheet" href="/css/festival.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
{{--전체 --}}
<br><div class="breadcrumbs" style="height:240px;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <div class="breadcrumbs-content">
                    <h1 class="page-title">축제 상세</h1>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-nav">
                    <li><a href="{{route('main')}}" style="color: #ffffff;">메인</a></li>
                    <li>축제 상세</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<section class="about-us section" style="padding-top:20px; padding-bottom: 20px;">
    <div class="lcontainer">
        <h1>축제정보</h1>
        <h3>{{ $festival->festival_title }} @if (isset($jjmFlg[0])) <i class="lni lni-heart-filled" style="color:#FF4A62;"></i> @else <i class="lni lni-heart" style="color:#FF4A62;"></i> @endif {{ $favoriteCount }}</h3>
        <div class="row align-items-center justify-content-left">
            <div class="col-lg-6 col-md-12 col-12" style="width:480px; height:600px;">
                <div class="content-left wow fadeInLeft" data-wow-delay=".3s">
                    <img class="div2img"src="{{ $festival->poster_img ? $festival->poster_img : '/img/festival.jpg' }}" alt="{{ $festival->poster_img ? 'Poster Image' : 'No Image' }}">
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <div class="content-right wow fadeInRight" data-wow-delay=".5s">
                    <span class="sub-heading" style="font-size:20px;">상세정보</span>
                <button type="button" class="btn {{ $festival->statusClass }}" style="" id="ing">
                    {{ $festival->statusText }}
                </button>
                <p style="font-size: 20px; padding:20px;">
                    <img src="https://korean.visitkorea.or.kr/kfes/resources/img/valentine_day.png" alt="날짜 아이콘" style="width:40px; height:40px">
                    {{ $festival->festival_start_date }} ~ {{ $festival->festival_end_date }}
                </p>
                <p style="font-size: 20px; padding:20px;">
                    <img src="https://korean.visitkorea.or.kr/kfes/resources/img/location_ico.png" alt="지역 아이콘" style="width:40px; height:40px;">
                    {{ $festival->area_code }}
                </p>
                <p style="font-size: 20px; padding:20px;">
                    <img src="https://korean.visitkorea.or.kr/kfes/resources/img/coin_ico.png" alt="체험료 아이콘" style="width:40px; height:40px;"> 유/무료 (체험별 상이)
                </p>
                <p style="font-size: 20px; padding:20px;  padding-bottom: 30px;">
                    <img src="https://korean.visitkorea.or.kr/kfes/resources/img/call_ico.png" alt="전화 아이콘" style="width:40px; height:40px;">
                    @if ($festival->tel)
                        {{ $festival->tel }}
                    @else
                        연락처 없음
                    @endif
                </p>
                <div class="button-container">
                {{-- 찜하기 --}}
                    <form action="{{ route('favorite.jjm') }}" method="post" >
                        @csrf
                        @if (isset($jjmFlg[0]))
                            @method('delete')
                        @endif
                        <input type="hidden" name="fesid" value="{{$fesid}}">
                        <input type="hidden" name="test" value="{{ session()->get('user_id').','.$festival->festival_id }}">
                        <button type="submit" style="border:none; background:none; padding:0; font-size:20px; font-family: 'Noto Sans KR', sans-serif;">
                            <img src="https://emojigraph.org/media/joypixels/red-heart_2764-fe0f.png" alt="찜하기" style="width: 50px; height: 50px; cursor: pointer; ">찜하기
                        </button>
                    </form>
                    {{-- 다음지도 --}}
                    <button type="button" class="btn" onclick="openKakaoView()" style="font-size:20px; font-family: 'Noto Sans KR', sans-serif;"><img src="data:image/png;base64,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" alt="길찾기 아이콘" style="width: 50px; height: 50px;"> 길찾기</button>
                    {{-- 네이버검색 --}}
                    <button class="btn" onclick="searchOnNaver('{{ $festival->festival_title }}')" style="font-size:20px; font-family: 'Noto Sans KR', sans-serif; ">
                        <img src="https://imweb.me/img/naver_pay_img_04.png?44251234" alt="네이버 아이콘" style="width: 50px; height: 50px; border-radius:5px;"> 검색
                    </button>
                    <script>
                        function searchOnNaver(keyword) {
                            var encodedKeyword = encodeURIComponent(keyword);
                            var searchUrl = 'https://search.naver.com/search.naver?query=' + encodedKeyword;
                            window.open(searchUrl, '_blank');
                        }
                    </script>
                    {{-- 뒤로가기 --}}
                    <button type="reset" class="btn btn-primary" id="back" onclick="history.back()" style="font-size:20px; font-family: 'Noto Sans KR', sans-serif;">
                        <img src="https://www.iconpacks.net/icons/2/free-icon-back-arrow-3095.png" alt="이미지" style="width: 40px; height: 40px; filter:brightness(0) invert(1);">
                        이전페이지
                    </button>
                </div>
            </div>
        </div>
    </div>
    <h1 style="padding-top:30px;">지도</h1>
    <div id="map" style="border: 1px solid ligtgrey; max-width:100%; width:1180px; height: 400px; border-radius: 10px;"></div>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey={{ env('KAKAO_MAP_API_KEY') }}&libraries=services"></script>
    <script>
        var container = document.getElementById('map');
        var mapx = {{ $festival->map_x }};
        var mapy = {{ $festival->map_y }};
        var options = {
            center: new kakao.maps.LatLng(mapy, mapx), // 맵의 중심 좌표 설정
            level: 3 // 맵의 확대/축소 레벨 설정
        };
        var map = new kakao.maps.Map(container, options); // 맵 생성
        var markerPosition = new kakao.maps.LatLng(mapy, mapx); // 마커의 좌표 설정
        var marker = new kakao.maps.Marker({
            position: markerPosition // 마커 생성 및 위치 설정
        });
        marker.setMap(map); // 마커를 맵에 표시
        var iwContent = '<div style="padding:5px;">도착장소 <br><a href="https://map.kakao.com/link/map/도착장소,' + mapy + ',' + mapx + '" style="color:blue" target="_blank">큰지도보기</a> <a href="https://map.kakao.com/link/to/도착장소,' + mapy + ',' + mapx + '" style="color:blue" target="_blank">길찾기</a></div>'; // 인포윈도우에 표출될 내용으로 HTML 문자열이나 document element가 가능합니다
        var iwPosition = new kakao.maps.LatLng(mapy, mapx); // 인포윈도우 표시 위치입니다
        // 인포윈도우를 생성합니다
        var infowindow = new kakao.maps.InfoWindow({
            position: iwPosition,
            content: iwContent
        });
        // 마커 위에 인포윈도우를 표시합니다. 두 번째 파라미터인 marker를 넣어주지 않으면 지도 위에 표시됩니다
        infowindow.open(map, marker);
        function openKakaoView() {
            var link = "https://map.kakao.com/link/to/도착장소," + mapy + "," + mapx; // 카카오맵으로 연결할 링크 생성
            window.open(link); // 링크를 새 창에서 열기
        }
    </script>
{{-- 리뷰 --}}
<style>
.myform fieldset{
    display: inline-block;
    direction: rtl;
    border:0;
}
.myform fieldset legend{
    text-align: right;
}
.myform input[type=radio]{
    display: none;
}
.myform label{
    font-size: 3em;
    color: transparent;
    text-shadow: 0 0 0 #f0f0f0;
}
.myform label:hover{
    text-shadow: 0 0 0 rgba(250, 208, 0, 0.99);
}
.myform label:hover ~ label{
    text-shadow: 0 0 0 rgba(250, 208, 0, 0.99);
}
.myform input[type=radio]:checked ~ label{
    text-shadow: 0 0 0 rgba(250, 208, 0, 0.99);
}
#reviewContents {
    width: 100%;
    height: 150px;
    padding: 10px;
    box-sizing: border-box;
    border: solid 1.5px #D3D3D3;
    border-radius: 5px;
    font-size: 16px;
    resize: none;
}
.box_like button {
    margin: 3px;
}
.custom-btn {
    font-size: 12px;
    padding: 4px;
}

.custom-btn .txt_like {
    font-size: 14px;
}
.ico_star {
background: url("/assets/img/ico_star_220608.png") no-repeat;
display: block;
}
.star_rate {
    background-position: 0 0;
    height: 27px;
    width: 151px;
}
.star_rate .inner_star {
background-position: 0 -30px;
height: 100%;
}
.blog-comment .post-comments{
    width:900px;
    margin-top:10px;
}
</style>
<div class="review-container" style="border: solid 1.5px #D3D3D3; padding:20px; margin:20px; width:1140px;">
<h3 class="text-success" style="margin-bottom:10px;">리뷰 목록</h3>
    <div>
        @php
            $likeCount = $data->sum('like_experience');
            $likeCount2 = $data->sum('like_theme');
            $likeCount3 = $data->sum('like_mood');
            $likeCount4 = $data->sum('like_food');
            $likeCount5 = $data->sum('like_toilet');
            $likeCount6 = $data->sum('like_parking');
            $likeCount7 = $data->sum('like_cost');
        @endphp

        <div>
            {{-- 별점 --}}
            <div style="display:flex" id="star">
                <span class="ico_star star_rate">
                    <span class="ico_star inner_star" style="width:{{$num_data['star_percentage']}}%"></span>
                </span>
                <span style="font-size:1.4rem; margin-left:10px;">평균:{{$num_data['star']}}점({{$num_data['count']}})건</span>

            </div>
            {{-- 추천 목록--}}
            <div id='recommend' style="margin: 10px 0 10px 0;">
                <button type="button" class="btn btn-outline-primary btn-sm custom-btn">
                    <span class="txt_like">체험프로그램이 많아요 ({{ $likeCount }})</span>
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm custom-btn" name="like_theme">
                    <span class="txt_like">테마가 재미있어요 ({{ $likeCount2 }})</span>
                </button>
                <button type="button" class="btn btn-outline-success btn-sm custom-btn" name="like_mood">
                    <span class="txt_like">분위기가 좋아요 ({{ $likeCount3 }})</span>
                </button>
                <button type="button" class="btn btn-outline-danger btn-sm custom-btn" name="like_food">
                    <span class="txt_like">주변에 먹거리가 많아요 ({{ $likeCount4 }})</span>
                </button>
                <button type="button" class="btn btn-outline-warning btn-sm custom-btn" name="like_toilet">
                    <span class="txt_like">화장실이 깨끗해요 ({{ $likeCount5 }})</span>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm custom-btn" name="like_parking">
                    <span class="txt_like">주차가 쉬워요 ({{ $likeCount6 }})</span>
                </button>
                <button type="button" class="btn btn-outline-dark btn-sm custom-btn" name="like_cost">
                    <span class="txt_like">가성비 좋아요 ({{ $likeCount7 }})</span>
                </button>
            </div>
            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" >리뷰 작성</button>
        </div>
    </div>
        <!-- 모달 창 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">리뷰 작성</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="mb-3 myform" name="myform" id="myform" method="post" action="{{ route('review.create') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="group_like">
                            <br>
                            <strong class="tit_group">이 장소의 추천포인트는?<span class="txt_guide">(중복선택 가능)</span></strong>
                            <br>
                            <div class="box_like">
                                <button type="button" class="btn btn-outline-primary" name="like_experience" id="likeBtn1">
                                    <input type="hidden" name="like_experience" id="like_experience_input" value="0">
                                    <span class="txt_like">체험프로그램이 많아요</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary" name="like_theme" id="likeBtn2">
                                    <input type="hidden" name="like_theme" id="like_theme_input" value="0">
                                    <span class="txt_like">테마가 재미있어요</span>
                                </button>
                                <button type="button" class="btn btn-outline-success" name="like_mood" id="likeBtn3">
                                    <input type="hidden" name="like_mood" id="like_mood_input" value="0">
                                    <span class="txt_like">분위기가 좋아요</span>
                                </button>
                                <button type="button" class="btn btn-outline-danger" name="like_food" id="likeBtn4">
                                    <input type="hidden" name="like_food" id="like_food_input" value="0">
                                    <span class="txt_like">주변에 먹거리가 많아요</span>
                                </button>
                                <button type="button" class="btn btn-outline-warning" name="like_toilet" id="likeBtn5">
                                    <input type="hidden" name="like_toilet" id="like_toilet_input" value="0">
                                    <span class="txt_like">화장실이 깨끗해요</span>
                                </button>
                                <button type="button" class="btn btn-outline-info" name="like_parking" id="likeBtn6">
                                    <input type="hidden" name="like_parking" id="like_parking_input" value="0">
                                    <span class="txt_like">주차가 쉬워요</span>
                                </button>
                                <button type="button" class="btn btn-outline-dark" name="like_cost" id="likeBtn7">
                                    <input type="hidden" name="like_cost" id="like_cost_input" value="0">
                                    <span class="txt_like">가성비 좋아요</span>
                                </button>
                            </div>
                            <input type="hidden" name="festival_id" id="festival-id-input" value="{{$festival->festival_id}}">
                            <fieldset id="starRate">
                                <span class="text-bold">별점을 선택해주세요</span>
                                <input type="radio" name="rate" value="5" id="rate1"><label for="rate1">★</label>
                                <input type="radio" name="rate" value="4" id="rate2"><label for="rate2">★</label>
                                <input type="radio" name="rate" value="3" id="rate3"><label for="rate3">★</label>
                                <input type="radio" name="rate" value="2" id="rate4"><label for="rate4">★</label>
                                <input type="radio" name="rate" value="1" id="rate5"><label for="rate5">★</label>
                            </fieldset>
                            <p id="selectedRating"></p>
                            <div>
                                <textarea class="col-auto form-control" name="review_content" placeholder="댓글을 입력하세요" required></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-danger">작성</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-comment">
                    <ul class="comments">
                        @foreach($reviews as $review)
                            <li class="clearfix" id="review{{$review->review_id}}">
                                <div class="post-comments">
                                <img src="/img/profile/{{$review->user_profile}}" alt="" class="img-thumbnail img-fluid" style="width:40px;height:40px;border-radius:50%;border:none;object-fit:cover;">
                                @php
                                    $likeCriteria = [
                                        'like_experience' => '체험프로그램',
                                        'like_theme' => '테마',
                                        'like_mood' => '분위기',
                                        'like_food' => '먹거리',
                                        'like_toilet' => '화장실',
                                        'like_parking' => '주차',
                                        'like_cost' => '가성비',
                                    ];
                                @endphp
                                별점:{{ $review->rate }}
                                @foreach ($likeCriteria as $key => $label)
                                    @if ($review->$key == 1)
                                        <button type="button" class="btn btn-outline-{{ $key == 'like_cost' ? 'dark' : ($key == 'like_experience' ? 'primary' : ($key == 'like_theme' ? 'secondary' : ($key == 'like_mood' ? 'success' : ($key == 'like_food' ? 'danger' : ($key == 'like_toilet' ? 'warning' : 'info'))))) }} btn-sm custom-btn" name="{{ $key }}">
                                            <span class="txt_like">{{ $label }}</span>
                                        </button>
                                    @endif

                                @endforeach
                                <p class="meta">닉네임: {{ $review->user_nickname }} 작성일: {{ $review->updated_at }}</p>
                                <p style="padding:0 0 10px;">{{ $review->review_content }}</p>
                                            @if(session('user_id') != $review->user_id)
                                                    <a href="javascript:popup({{$review->review_id}})">
                                                        <i class="lni lni-alarm"></i>
                                                        신고하기
                                                    </a>
                                            @endif
                                <div class="col-4" style="padding:0;">

                                    <div class="button-group" style="display: flex; gap: 5px;">
                                        <form action="{{ route('review.delete', ['id' => $review->review_id]) }}" method="post" name="removefrm_{{ $review->review_id }}">
                                            @csrf
                                            @method('delete')
                                            @if(session('user_id') == $review->user_id)
                                            <input type="hidden" name="festival_id" id="festival-id-input{{ $review->review_id }}" value="{{ $review->review_id }}">
                                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModalToggle_{{ $review->review_id }}">삭제</button>
                                            @endauth
                                            {{-- 모달창 구현 --}}
                                            <div class="modal fade" id="exampleModalToggle_{{ $review->review_id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel_{{ $review->review_id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalToggleLabel_{{ $review->review_id }}">삭제 확인</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            정말로 삭제 하시겠습니까?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">확인</button>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                    {{-- 수정 모달창 --}}
                                    @if(session('user_id') == $review->user_id)
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-update{{$review->review_id}}" onclick="changeStar({{$review->review_id}})">수정</button>
                                    @endauth
                                    <div class="modal fade" id="exampleModal-update{{$review->review_id}}" tabindex="-1" aria-labelledby="exampleModalLabel-update{{$review->review_id}}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel-update{{$review->review_id}}">리뷰 수정</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form class="mb-3 myform" name="myform" id="myform{{$review->review_id}}" method="" action="">
                                                    <div class="modal-body">
                                                        <div class="group_like">
                                                            <br>
                                                            <strong class="tit_group">이 장소의 추천포인트는?<span class="txt_guide">(중복선택 가능)</span></strong>
                                                            <br>
                                                            <div class="box_like">
                                                                <button type="button" class="btn btn-outline-primary" name="like_experience" id="likeBtn1{{$review->review_id}}" onclick="experience({{$review->review_id}})">
                                                                    <input type="hidden" name="like_experience" id="like_experience_input{{$review->review_id}}" value="0">
                                                                    <span class="txt_like">체험프로그램이 많아요</span>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-secondary" name="like_theme" id="likeBtn2{{$review->review_id}}" onclick="theme({{$review->review_id}})">
                                                                    <input type="hidden" name="like_theme" id="like_theme_input{{$review->review_id}}" value="0">
                                                                    <span class="txt_like">테마가 재미있어요</span>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-success" name="like_mood" id="likeBtn3{{$review->review_id}}" onclick="mood({{$review->review_id}})">
                                                                    <input type="hidden" name="like_mood" id="like_mood_input{{$review->review_id}}" value="0">
                                                                    <span class="txt_like">분위기가 좋아요</span>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-danger" name="like_food" id="likeBtn4{{$review->review_id}}" onclick="food({{$review->review_id}})">
                                                                    <input type="hidden" name="like_food" id="like_food_input{{$review->review_id}}" value="0">
                                                                    <span class="txt_like">주변에 먹거리가 많아요</span>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-warning" name="like_toilet" id="likeBtn5{{$review->review_id}}" onclick="toilet({{$review->review_id}})">
                                                                    <input type="hidden" name="like_toilet" id="like_toilet_input{{$review->review_id}}" value="0">
                                                                    <span class="txt_like">화장실이 깨끗해요</span>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-info" name="like_parking" id="likeBtn6{{$review->review_id}}" onclick="parking({{$review->review_id}})">
                                                                    <input type="hidden" name="like_parking" id="like_parking_input{{$review->review_id}}" value="0">
                                                                    <span class="txt_like">주차가 쉬워요</span>
                                                                </button>
                                                                <button type="button" class="btn btn-outline-dark" name="like_cost" id="likeBtn7{{$review->review_id}}" onclick="cost({{$review->review_id}})">
                                                                    <input type="hidden" name="like_cost" id="like_cost_input{{$review->review_id}}" value="0">
                                                                    <span class="txt_like">가성비 좋아요</span>
                                                                </button>
                                                            </div>
                                                            <input type="hidden" name="festival_id" id="festival-id-input{{$review->review_id}}" value="">
                                                            <fieldset id="starRate{{$review->review_id}}">
                                                                <span class="text-bold">별점을 선택해주세요</span>
                                                                <input type="radio" name="rate" value="5" id="rate1{{$review->review_id}}"><label for="rate1{{$review->review_id}}">★</label>
                                                                <input type="radio" name="rate" value="4" id="rate2{{$review->review_id}}"><label for="rate2{{$review->review_id}}">★</label>
                                                                <input type="radio" name="rate" value="3" id="rate3{{$review->review_id}}"><label for="rate3{{$review->review_id}}">★</label>
                                                                <input type="radio" name="rate" value="2" id="rate4{{$review->review_id}}"><label for="rate4{{$review->review_id}}">★</label>
                                                                <input type="radio" name="rate" value="1" id="rate5{{$review->review_id}}"><label for="rate5{{$review->review_id}}">★</label>
                                                            </fieldset>
                                                            <p id="selectedRating{{$review->review_id}}"></p>
                                                            <div>
                                                                <textarea id="reviewcomment{{$review->review_id}}" class="col-auto form-control" name="review_content" placeholder="댓글을 입력하세요" required></textarea>
                                                            </div>
                                                            <br>
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="putRevieList({{$review->review_id}})">수정</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
</div>

    {{-- 별점 스크립트 --}}
    <script>
        const radioButtons = document.getElementById('starRate').querySelectorAll('input[name="rate"]');
        radioButtons.forEach((radio) => {
            radio.addEventListener('change', (event) => {
                const selectedRating = document.getElementById('selectedRating');
                selectedRating.textContent = `선택한 별점: ${event.target.value}/5`;
            });
        });
        // ====================
        // 수정 별점
        // ====================
        let rateValue='';
        function changeStar(reviewID) {
            const reviewRadio = document.getElementById('starRate'+reviewID).querySelectorAll('input[name="rate"]');
            const selectedRating = document.getElementById('selectedRating'+reviewID);
            reviewRadio.forEach((radio) => {
                radio.addEventListener('change', (event) => {
                    const selectedRating = document.getElementById('selectedRating'+reviewID);
                    selectedRating.textContent = `선택한 별점: ${event.target.value}/5`;
                    rateValue=event.target.value;
                });
            });
        }
    </script>
    {{-- 현재페이지 숫자 추출 --}}
    <script>
        // var initialUrl = window.location.href;
        // var numericPart = initialUrl.match(/\d+/)[0];

        // document.getElementById("festival-id-input").value = numericPart;
    </script>
<script>
    function handleButtonClick(buttonId) {
        var inputElement = document.getElementById(buttonId);

        if (inputElement.value==='0') {
            inputElement.value = "1";
        }else{
            inputElement.value = "0";
        }
    }
    function toggleActiveClass(buttonId) {
        const button = document.getElementById(buttonId);
        if (button.classList[2]==='active') {
            button.classList.remove('active')
        }else{
            button.classList.add('active');
        }
    }

    document.getElementById('likeBtn1').addEventListener('click', function () {
        handleButtonClick('like_experience_input');
        toggleActiveClass('likeBtn1');
    });

    document.getElementById('likeBtn2').addEventListener('click', function () {
        handleButtonClick('like_theme_input');
        toggleActiveClass('likeBtn2');
    });

    document.getElementById('likeBtn3').addEventListener('click', function () {
        handleButtonClick('like_mood_input');
        toggleActiveClass('likeBtn3');
    });

    document.getElementById('likeBtn4').addEventListener('click', function () {
        handleButtonClick('like_food_input');
        toggleActiveClass('likeBtn4');
    });

    document.getElementById('likeBtn5').addEventListener('click', function () {
        handleButtonClick('like_toilet_input');
        toggleActiveClass('likeBtn5');
    });

    document.getElementById('likeBtn6').addEventListener('click', function () {
        handleButtonClick('like_parking_input');
        toggleActiveClass('likeBtn6');
    });

    document.getElementById('likeBtn7').addEventListener('click', function () {
        handleButtonClick('like_cost_input');
        toggleActiveClass('likeBtn7');
    });
    //--------------------------------------
    // Function to handle button click 수정
    //--------------------------------------
    function handleButtonClickChang(buttonId) {
        var inputElement = document.getElementById(buttonId);

        if (inputElement.value==='0') {
            inputElement.value = "1";
        }else{
            inputElement.value = "0";
        }
    }

    function toggleActiveClassChang(buttonId) {
        const button = document.getElementById(buttonId);
        if (button.classList[2]==='active') {
            button.classList.remove('active')
        }else{
            button.classList.add('active');
        }
    }

    function experience(reviewId) {
        handleButtonClickChang('like_experience_input'+reviewId);
        toggleActiveClassChang('likeBtn1'+reviewId);
    }
    function theme(reviewId) {
        handleButtonClickChang('like_theme_input'+reviewId);
        toggleActiveClassChang('likeBtn2'+reviewId);
    }
    function mood(reviewId) {
        handleButtonClickChang('like_mood_input'+reviewId);
        toggleActiveClassChang('likeBtn3'+reviewId);
    }
    function food(reviewId) {
        handleButtonClickChang('like_food_input'+reviewId);
        toggleActiveClassChang('likeBtn4'+reviewId);
    }
    function toilet(reviewId) {
        handleButtonClickChang('like_toilet_input'+reviewId);
        toggleActiveClassChang('likeBtn5'+reviewId);
    }
    function parking(reviewId) {
        handleButtonClickChang('like_parking_input'+reviewId);
        toggleActiveClassChang('likeBtn6'+reviewId);
    }
    function cost(reviewId) {
        handleButtonClickChang('like_cost_input'+reviewId);
        toggleActiveClassChang('likeBtn7'+reviewId);
    }
</script>

    {{-- 연관축제 --}}
    <h1 style="padding-top:30px;">이런 축제는 어때요?</h1>
    <div class="row" style="text-align:center;">
        @php
        // 현재 날짜 가져오기
        $currentDate = date('Y-m-d');
        // 현재 개최 중인 축제를 무작위로 3개 선택
        $recom = \App\Models\Festival::where('festival_start_date', '<=', $currentDate)
                                    ->where('festival_end_date', '>=', $currentDate)
                                    ->inRandomOrder()
                                    ->limit(3)
                                    ->get();
        @endphp
        @foreach ($recom as $item)
            <div class='col-4' style="max-width:400px; max-height:600px;">
                <a href="{{route('fes.detail',['id'=>$item->festival_id])}}">
                    @if ($item->poster_img)
                        <img src="{{$item->poster_img}}" alt="{{$item->festival_title}}" class="img-fluid" style="width:400px; height:400px;  border:1px solid lightgray; object-fit:cover; border-radius:10px;">
                    @else
                        <img src='{{asset('img/festival.jpg')}}' alt="{{$item->festival_title}}" class="img-fluid" >
                    @endif
                </a>
                <h5 style="font-family: 'Noto Sans KR', sans-serif;">{{$item->festival_title}}</h5>
            </div>
        @endforeach
    </div>

<script>
    //수정 API
    function putRevieList(reviewId){
        const host=document.location.hostname
        const contestValue=document.getElementById('reviewcomment'+reviewId).value;
        const experienceValue=document.getElementById('like_experience_input'+reviewId).value;
        const themeValue=document.getElementById('like_theme_input'+reviewId).value;
        const moodValue=document.getElementById('like_mood_input'+reviewId).value;
        const foodValue=document.getElementById('like_food_input'+reviewId).value;
        const toiletValue=document.getElementById('like_toilet_input'+reviewId).value;
        const parkingValue=document.getElementById('like_parking_input'+reviewId).value;
        const costValue=document.getElementById('like_cost_input'+reviewId).value;
        axios.put('/api/reviews/'+reviewId,{
            content:contestValue,
            rate:rateValue,
            experience:experienceValue,
            theme:themeValue,
            mood:moodValue,
            food:foodValue,
            toilet:toiletValue,
            parking:parkingValue,
            cost:costValue
        })
        .then(res=>{
            console.log(res.data);
            let today = new Date();
            let year = today.getFullYear(); // 년도
            let month = today.getMonth() + 1;  // 월
            let date = today.getDate();  // 날짜
            let hours = today.getHours(); // 시
            let minutes = today.getMinutes();  // 분
            let seconds = today.getSeconds();  // 초
            let updateTime=year + '-' + month + '-' + date+' '+hours+':'+minutes+':'+seconds
            const targetReview=document.getElementById('review'+reviewId); //수정할 위치
            let tempStr='';

                    tempStr+=`
                        <div class="post-comments">
                            <img src="/img/profile/`+res.data.user_profile+`" alt="" class="img-thumbnail img-fluid" style="width:40px;height:40px;border-radius:50%;border:none;object-fit:cover;">
                            별점:`+res.data.rate+` `;

                            if (res.data.like_experience==="1") {
                                tempStr+=
                                `<button type="button" class="btn btn-outline-primary btn-sm custom-btn" name="like_experience">
                                        <span class="txt_like">체험프로그램</span>
                                </button> `
                            }
                            if (res.data.like_theme==="1") {
                                tempStr+=
                                ` <button type="button" class="btn btn-outline-secondary btn-sm custom-btnn" name="like_theme">
                                        <span class="txt_like">테마</span>
                                </button> `
                            }
                            if (res.data.like_mood==="1") {
                                tempStr+=
                                `<button type="button" class="btn btn-outline-success btn-sm custom-btn"" name="like_mood">
                                        <span class="txt_like">분위기</span>
                                </button> `
                            }
                            if (res.data.like_food==="1") {
                                tempStr+=
                                `<button type="button" class="btn btn-outline-danger btn-sm custom-btn" name="like_food">
                                        <span class="txt_like">먹거리</span>
                                </button> `
                            }
                            if (res.data.like_toilet==="1") {
                                tempStr+=
                                `<button type="button" class="btn btn-outline-warning btn-sm custom-btn" name="like_toilet">
                                        <span class="txt_like">화장실</span>
                                </button> `
                            }
                            if (res.data.like_parking==="1") {
                                tempStr+=
                                `<button type="button" class="btn btn-outline-info btn-sm custom-btn" name="like_parking">
                                        <span class="txt_like">주차</span>
                                </button> `
                            }
                            if (res.data.like_cost==="1") {
                                tempStr+=
                                `<button type="button" class="btn btn-outline-dark btn-sm custom-btn" name="like_cost">
                                        <span class="txt_like">가성비</span>
                                </button> `
                            }
                            tempStr+=`
                            <p class="meta">닉네임: `+res.data.user_nickname+` 작성일: `+updateTime+`</p>
                            <p>`+res.data.review_content+`</p>

                            <div class="button-group" style="display: flex; gap: 5px;">
                                <form action="{!! route('review.delete') !!}" method="post" name="removefrm_`+res.data.review_id+`">
                                    @csrf
                                    @method('delete')
                                    <input type="hidden" name="festival_id" id="festival-id-input`+res.data.review_id+`" value="`+res.data.review_id+`">
                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModalToggle_`+res.data.review_id+`">삭제</button>
                                    <div class="modal fade" id="exampleModalToggle_`+res.data.review_id+`" aria-hidden="true" aria-labelledby="exampleModalToggleLabel_`+res.data.review_id+`" tabindex="-1">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalToggleLabel_`+res.data.review_id+`">삭제 확인</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    정말로 삭제 하시겠습니까?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger">확인</button>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal-update`+res.data.review_id+`" onclick="changeStar(`+res.data.review_id+`)">수정</button>
                                <div class="modal fade" id="exampleModal-update`+res.data.review_id+`" tabindex="-1" aria-labelledby="exampleModalLabel-update`+res.data.review_id+`" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel-update{`+res.data.review_id+`">리뷰 수정</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form class="mb-3 myform" name="myform" id="myform`+res.data.review_id+`" method="" action="">
                                                <div class="modal-body">
                                                    <div class="group_like">
                                                        <br>
                                                        <strong class="tit_group">이 장소의 추천포인트는?<span class="txt_guide">(중복선택 가능)</span></strong>
                                                        <br>
                                                        <div class="box_like">
                                                            <button type="button" class="btn btn-outline-primary" name="like_experience" id="likeBtn1`+res.data.review_id+`" onclick="experience(`+res.data.review_id+`)">
                                                                <input type="hidden" name="like_experience" id="like_experience_input`+res.data.review_id+`" value="0">
                                                                <span class="txt_like">체험프로그램이 많아요</span>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-secondary" name="like_theme" id="likeBtn2`+res.data.review_id+`" onclick="theme(`+res.data.review_id+`)">
                                                                <input type="hidden" name="like_theme" id="like_theme_input`+res.data.review_id+`" value="0">
                                                                <span class="txt_like">테마가 재미있어요</span>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-success" name="like_mood" id="likeBtn3`+res.data.review_id+`" onclick="mood(`+res.data.review_id+`)">
                                                                <input type="hidden" name="like_mood" id="like_mood_input`+res.data.review_id+`" value="0">
                                                                <span class="txt_like">분위기가 좋아요</span>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-danger" name="like_food" id="likeBtn4`+res.data.review_id+`" onclick="food(`+res.data.review_id+`)">
                                                                <input type="hidden" name="like_food" id="like_food_input`+res.data.review_id+`" value="0">
                                                                <span class="txt_like">주변에 먹거리가 많아요</span>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-warning" name="like_toilet" id="likeBtn5`+res.data.review_id+`" onclick="toilet(`+res.data.review_id+`)">
                                                                <input type="hidden" name="like_toilet" id="like_toilet_input`+res.data.review_id+`" value="0">
                                                                <span class="txt_like">화장실이 깨끗해요</span>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-info" name="like_parking" id="likeBtn6`+res.data.review_id+`" onclick="parking(`+res.data.review_id+`)">
                                                                <input type="hidden" name="like_parking" id="like_parking_input`+res.data.review_id+`" value="0">
                                                                <span class="txt_like">주차가 쉬워요</span>
                                                            </button>
                                                            <button type="button" class="btn btn-outline-dark" name="like_cost" id="likeBtn7`+res.data.review_id+`" onclick="cost(`+res.data.review_id+`)">
                                                                <input type="hidden" name="like_cost" id="like_cost_input`+res.data.review_id+`" value="0">
                                                                <span class="txt_like">가성비 좋아요</span>
                                                            </button>
                                                        </div>
                                                        <input type="hidden" name="festival_id" id="festival-id-input`+res.data.review_id+`" value="">
                                                        <fieldset id="starRate`+res.data.review_id+`">
                                                            <span class="text-bold">별점을 선택해주세요</span>
                                                            <input type="radio" name="rate" value="5" id="rate1`+res.data.review_id+`"><label for="rate1`+res.data.review_id+`">★</label>
                                                            <input type="radio" name="rate" value="4" id="rate2`+res.data.review_id+`"><label for="rate2`+res.data.review_id+`">★</label>
                                                            <input type="radio" name="rate" value="3" id="rate3`+res.data.review_id+`"><label for="rate3`+res.data.review_id+`">★</label>
                                                            <input type="radio" name="rate" value="2" id="rate4`+res.data.review_id+`"><label for="rate4`+res.data.review_id+`">★</label>
                                                            <input type="radio" name="rate" value="1" id="rate5`+res.data.review_id+`"><label for="rate5`+res.data.review_id+`">★</label>
                                                        </fieldset>
                                                        <p id="selectedRating`+res.data.review_id+`"></p>
                                                        <div>
                                                            <textarea id="reviewcomment`+res.data.review_id+`" class="col-auto form-control" name="review_content" placeholder="댓글을 입력하세요" required></textarea>
                                                        </div>
                                                        <br>
                                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close" onclick="putRevieList(`+res.data.review_id+`)">수정</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            `;
                            targetReview.innerHTML=tempStr;
            //별
            const star=document.getElementById('star');
            let starStr=`
                <span class="ico_star star_rate">
                        <span class="ico_star inner_star" style="width:`+res.data.star_percentage+`%"></span>
                </span>
                <span style="font-size:1.4rem; margin-left:10px;">평균:`+res.data.star+`점(`+res.data.count+`)건</span>
                `;
                star.innerHTML=starStr;
            //테마
            const recommend=document.getElementById('recommend');
            let recStr=`
            <button type="button" class="btn btn-outline-primary btn-sm custom-btn">
                    <span class="txt_like">체험프로그램이 많아요 (`+res.data.experienceCnt+`)</span>
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm custom-btn" name="like_theme">
                    <span class="txt_like">테마가 재미있어요 (`+res.data.themeCnt+`)</span>
                </button>
                <button type="button" class="btn btn-outline-success btn-sm custom-btn" name="like_mood">
                    <span class="txt_like">분위기가 좋아요 (`+res.data.moodCnt+`)</span>
                </button>
                <button type="button" class="btn btn-outline-danger btn-sm custom-btn" name="like_food">
                    <span class="txt_like">주변에 먹거리가 많아요 (`+res.data.foodCnt+`)</span>
                </button>
                <button type="button" class="btn btn-outline-warning btn-sm custom-btn" name="like_toilet">
                    <span class="txt_like">화장실이 깨끗해요 (`+res.data.toiletCnt+`)</span>
                </button>
                <button type="button" class="btn btn-outline-info btn-sm custom-btn" name="like_parking">
                    <span class="txt_like">주차가 쉬워요 (`+res.data.parkingCnt+`)</span>
                </button>
                <button type="button" class="btn btn-outline-dark btn-sm custom-btn" name="like_cost">
                    <span class="txt_like">가성비 좋아요 (`+res.data.costCnt+`)</span>
                </button>
            `;
            recommend.innerHTML=recStr;
        })
        .catch(err=>{
            console.log(err);
        })
    }
</script>
<script>
                function popup(e){
            var url = "{!! route('insert.report', ['type' => '2']) !!}";
            url = url + "&no=" + e;
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }
</script>
</section>
@endsection
