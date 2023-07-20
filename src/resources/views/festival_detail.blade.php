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
    {{-- 리뷰 --}}
    {{-- @include('layout.list_comment') --}}
    <style>
    #myform fieldset{
        display: inline-block;
        direction: rtl;
        border:0;
    }
    #myform fieldset legend{
        text-align: right;
    }
    #myform input[type=radio]{
        display: none;
    }
    #myform label{
        font-size: 3em;
        color: transparent;
        text-shadow: 0 0 0 #f0f0f0;
    }
    #myform label:hover{
        text-shadow: 0 0 0 rgba(250, 208, 0, 0.99);
    }
    #myform label:hover ~ label{
        text-shadow: 0 0 0 rgba(250, 208, 0, 0.99);
    }
    #myform input[type=radio]:checked ~ label{
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
    </style>
    <div>
    {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">글작성</button>

    <!-- 모달 창 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">리뷰 작성</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="group_like">
                        <br>
                        <strong class="tit_group">이 장소의 추천포인트는?<span class="txt_guide">(중복선택 가능)</span></strong>
                        <br>
                        <div class="box_like">
                            <button type="button" class="btn btn-outline-primary" data-name="체험" data-id="1">
                                <span class="txt_like">체험프로그램이 많아요</span><span class="ico_comm ico_like2"></span>
                            </button>
                            <button type="button" class="btn btn-outline-secondary" data-name="테마" data-id="2">
                                <span class="txt_like">테마가 재미있어요</span><span class="ico_comm ico_like2"></span>
                            </button>
                            <button type="button" class="btn btn-outline-success" data-name="분위기" data-id="3">
                                <span class="txt_like">분위기가 좋아요</span><span class="ico_comm ico_like2"></span>
                            </button>
                            <button type="button" class="btn btn-outline-danger" data-name="먹거리" data-id="4">
                                <span class="txt_like">주변에 먹거리가 많아요</span><span class="ico_comm ico_like2"></span>
                            </button>
                            <button type="button" class="btn btn-outline-warning" data-name="화장실" data-id="5">
                                <span class="txt_like">화장실이 깨끗해요</span><span class="ico_comm ico_like2"></span>
                            </button>
                            <button type="button" class="btn btn-outline-info" data-name="주차" data-id="6">
                                <span class="txt_like">주차가 쉬워요</span><span class="ico_comm ico_like2"></span>
                            </button>
                            <button type="button" class="btn btn-outline-dark" data-name="가성비" data-id="7">
                                <span class="txt_like">가성비 좋아요</span><span class="ico_comm ico_like2"></span>
                            </button>
                        </div>
                    </div>
                    <form class="mb-3" name="myform" id="myform" method="post">
                        <fieldset>
                            <span class="text-bold">별점을 선택해주세요</span>
                            <input type="radio" name="reviewStar" value="5" id="rate1" ><label for="rate1">★</label>
                            <input type="radio" name="reviewStar" value="4" id="rate2"><label for="rate2">★</label>
                            <input type="radio" name="reviewStar" value="3" id="rate3"><label for="rate3">★</label>
                            <input type="radio" name="reviewStar" value="2" id="rate4"><label for="rate4">★</label>
                            <input type="radio" name="reviewStar" value="1" id="rate5"><label for="rate5">★</label>
                        </fieldset>
                        <p id="selectedRating"></p>            
                        <div>
                            <textarea class="col-auto form-control" type="text" id="reviewContents" placeholder="작성내용은 축제리스트에 노출되며 다른 사용자들이 볼 수 있으니, 서로를 배려하는 마음을 담아 작성해 주세요."></textarea>
                        </div>
                        <br>
                        <button type="button" class="btn btn-danger">제출</button>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <div>
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">글작성</button>

        <!-- 모달 창 -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">리뷰 작성</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="mb-3" name="myform" id="myform" method="post" action="{{ route('review.create') }}">
                    <div class="modal-body">
                        <div class="group_like">
                            <br>
                            <strong class="tit_group">이 장소의 추천포인트는?<span class="txt_guide">(중복선택 가능)</span></strong>
                            <br>
                            <div class="box_like">
                                <button type="button" class="btn btn-outline-primary" name="like_experience" id="likeBtn1">
                                    <input type="hidden" name="like_experience" id="like_experience_input" value="">
                                    <span class="txt_like">체험프로그램이 많아요</span>
                                </button>
                                <button type="button" class="btn btn-outline-secondary" name="like_theme" id="likeBtn2>
                                    <input type="hidden" name="like_theme" id="like_theme_input" value="">
                                    <span class="txt_like">테마가 재미있어요</span>
                                </button>
                                <button type="button" class="btn btn-outline-success" name="like_mood" id="likeBtn3">
                                    <input type="hidden" name="like_mood" id="like_mood_input" value="">
                                    <span class="txt_like">분위기가 좋아요</span>
                                </button>
                                <button type="button" class="btn btn-outline-danger" name="like_food" id="likeBtn4">
                                    <input type="hidden" name="like_food" id="like_food_input" value="">
                                    <span class="txt_like">주변에 먹거리가 많아요</span>
                                </button>
                                <button type="button" class="btn btn-outline-warning" name="like_toilet" id="likeBtn5">
                                    <input type="hidden" name="like_toilet" id="like_toilet_input" value="">
                                    <span class="txt_like">화장실이 깨끗해요</span>
                                </button>
                                <button type="button" class="btn btn-outline-info" name="like_parking" id="likeBtn6">
                                    <input type="hidden" name="like_parking" id="like_parking_input" value="">
                                    <span class="txt_like">주차가 쉬워요</span>
                                </button>
                                <button type="button" class="btn btn-outline-dark" name="like_cost" id="likeBtn7">
                                    <input type="hidden" name="like_cost" id="like_cost_input" value="">
                                    <span class="txt_like">가성비 좋아요</span>
                                </button>
                        </div>
                            @csrf
                            <input type="hidden" name="festival_id" id="festival-id-input" value="">
                            <fieldset>
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
    <script>//버튼클릭
        const buttons = document.querySelectorAll('.box_like button');

        buttons.forEach(button => {
            button.addEventListener('click', () => {
            button.classList.toggle('active');
            });
        });
    </script>
    {{-- 별점 스크립트 --}}
    <script>
        const radioButtons = document.querySelectorAll('input[name="rate"]');
        const selectedRating = document.getElementById('selectedRating');

        radioButtons.forEach((radio) => {
            radio.addEventListener('change', (event) => {
                selectedRating.textContent = `선택한 별점: ${event.target.value}/5`;
            });
        });
    </script>
    {{-- 현재페이지 숫자 추출 --}}
    <script>
        var initialUrl = window.location.href;
        var numericPart = initialUrl.match(/\d+/)[0];

        document.getElementById("festival-id-input").value = numericPart;
    </script>
<!-- Include this script in your HTML file -->
<script>
    // Function to handle button click
    function handleButtonClick(buttonId) {
        // Get the corresponding input element
        var inputElement = document.getElementById(buttonId + '_input');

        // Check if the input element exists
        if (inputElement) {
            // Set the value to "1"
            inputElement.value = "1";
        }
    }

    // Function to toggle active class on buttons
    function toggleActiveClass(buttonId) {
        // Remove active class from all buttons
        var buttons = document.getElementsByClassName('btn');
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].classList.remove('active');
        }

        // Add active class to the clicked button
        var button = document.getElementById(buttonId);
        if (button) {
            button.classList.add('active');
        }
    }

    // Add click event listeners to all buttons
    document.getElementById('likeBtn1').addEventListener('click', function () {
        handleButtonClick('like_experience');
        toggleActiveClass('likeBtn1');
    });

    document.getElementById('likeBtn2').addEventListener('click', function () {
        handleButtonClick('like_theme');
        toggleActiveClass('likeBtn2');
    });

    document.getElementById('likeBtn3').addEventListener('click', function () {
        handleButtonClick('like_mood');
        toggleActiveClass('likeBtn3');
    });

    document.getElementById('likeBtn4').addEventListener('click', function () {
        handleButtonClick('like_food');
        toggleActiveClass('likeBtn4');
    });

    document.getElementById('likeBtn5').addEventListener('click', function () {
        handleButtonClick('like_toilet');
        toggleActiveClass('likeBtn5');
    });

    document.getElementById('likeBtn6').addEventListener('click', function () {
        handleButtonClick('like_parking');
        toggleActiveClass('likeBtn6');
    });

    document.getElementById('likeBtn7').addEventListener('click', function () {
        handleButtonClick('like_cost');
        toggleActiveClass('likeBtn7');
    });
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
</div>
</section>
<script src="{{asset('js/festival.js')}}"></script>
@endsection
