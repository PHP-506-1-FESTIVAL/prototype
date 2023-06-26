@extends('layout.layout')

@section('title', '축제정보상세')

@section('content')
<link rel="stylesheet" href="/css/festival.css">
<script src="{{asset('js/festival.js')}}"></script>
<br><br><br><br><br>
<div class="detailall">
    <link rel="stylesheet" href="/css/festival.css">
    <div class="festival-detail">
        <div class="div1">
            <h1>축제정보</h1>
            <h3>{{ $festival->festival_title }} @if (isset($jjmFlg[0]->favorite_id)) 💖 @else 🤍 @endif {{ $favoriteCount }}</h3>
            @php
                $today = date('Y-m-d');
                $startDate = $festival->festival_start_date;
                $endDate = $festival->festival_end_date;

                if ($today < $startDate) {
                    $statusClass = 'btn-success';
                    $statusText = '진행예정 D-' . date_diff(date_create($today), date_create($startDate))->format('%a') . '일';
                } elseif ($today > $endDate) {
                    $statusClass = 'btn-secondary';
                    $statusText = '진행종료';
                } else {
                    $statusClass = 'btn-primary';
                    $statusText = '진행중';
                }
            @endphp
            <button type="button" class="btn {{ $statusClass }}"  style="margin: 2px;" id="ing">
                {{ $statusText }}
            </button>
        </div>

        <div class="div2">
            <img class="img" style="width:400px; height:600px; object-fit: cover;" src="{{ $festival->poster_img ? $festival->poster_img : '/img/festival.jpg' }}" alt="{{ $festival->poster_img ? 'Poster Image' : 'No Image' }}">
        </div>
        <div class="div3">
            <div class="div3in">
            <p style="font-size: 25px;">
                <img src="https://korean.visitkorea.or.kr/kfes/resources/img/valentine_day.png" alt="날짜 아이콘" style="width: 80px; height: 80px">
                {{ $festival->festival_start_date }} ~ {{ $festival->festival_end_date }}
            </p>
            <br>
            <p style="font-size: 25px;">
                <img src="https://korean.visitkorea.or.kr/kfes/resources/img/location_ico.png" alt="지역 아이콘" style="width: 80px; height: 80px;">
                {{ $festival->area_code }}
            </p>
            <br>
            <p style="font-size: 25px;">
                <img src="https://korean.visitkorea.or.kr/kfes/resources/img/coin_ico.png" alt="체험료 아이콘" style="width: 80px; height: 80px;"> 유/무료 (체험별 상이)
            </p>
            <br>
            <p style="font-size: 25px;">
                <img src="https://korean.visitkorea.or.kr/kfes/resources/img/call_ico.png" alt="전화 아이콘" style="width: 80px; height: 80px;">
                @if ($festival->tel)
                    {{ $festival->tel }}
                @else
                    연락처 없음
                @endif
                <br><br><br>
            </p>
            {{-- 찜하기 --}}
            <form action="{{ route('favorite.jjm') }}" method="post">
                @csrf
                @if (isset($jjmFlg[0]->favorite_id))
                    @method('delete')
                @endif
                <input type="hidden" name="test" value="{{ session()->get('user_id').','.$festival->festival_id }}">
                <button type="submit" style="border:none; background:none; padding:0;">
                    <img src="https://emojigraph.org/media/joypixels/red-heart_2764-fe0f.png" alt="찜하기" style="width: 60px; height: 60px; cursor: pointer;">찜하기 
                </button>
            {{-- 다음지도 --}}
                <button type="button" class="btn" onclick="openKakaoView()"><img src="data:image/png;base64,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" alt="길찾기 아이콘" style="width: 60px; height: 60px;">길 찾기 </button>
            {{-- 네이버검색 --}}
                <button class="btn" onclick="searchOnNaver('{{ $festival->festival_title }}')">
                    <img src="https://imweb.me/img/naver_pay_img_04.png?44251234" alt="네이버 아이콘" style="width: 60px; height: 60px;"> 상세 검색 
                </button>

                <script>
                    function searchOnNaver(keyword) {
                        var encodedKeyword = encodeURIComponent(keyword);
                        var searchUrl = 'https://search.naver.com/search.naver?query=' + encodedKeyword;
                        window.open(searchUrl, '_blank');
                    }
                </script>
                {{-- 뒤로가기 --}}
                <a id="back">
                <img src="https://media.istockphoto.com/id/953455676/ko/%EB%B2%A1%ED%84%B0/%EC%95%84%EC%9D%B4%EC%BD%98-%EB%B2%A1%ED%84%B0-%EC%9D%BC%EB%9F%AC%EC%8A%A4%ED%8A%B8-%EB%A0%88%EC%9D%B4-%EC%85%98%EC%9D%84-%EB%8B%A4%EC%8B%9C-%EB%92%A4%EB%A1%9C-%EB%B2%84%ED%8A%BC-%EC%95%84%EC%9D%B4%EC%BD%98-%EB%B2%A1%ED%84%B0%EC%9E%85%EB%8B%88%EB%8B%A4-%EB%92%A4%EB%A1%9C-%ED%99%94%EC%82%B4%ED%91%9C-%EC%95%84%EC%9D%B4%EC%BD%98.jpg?s=612x612&w=0&k=20&c=fw0CDhBuqZnC5IfAd8Jdm7d6HAP5ipBePx7i3yLJRsY=" alt="이미지" style="width: 50px; height: 50px;">
                이전페이지
                </a>
                <script>
                    document.querySelector('#back').onclick = function() {
                        history.back();
                    };
                </script>
            </form>
            </div>
        </div>
    </div>

    <br><h1>지도</h1>
    <div id="map" style="border: 1px solid ligtgrey; width:1180px; height:400px;"></div>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=c445a81938b242294a005dc47ac83f13&libraries=services"></script>
    <script>
        var container = document.getElementById('map');
        var mapx = {{ $festival->map_x }};
        var mapy = {{ $festival->map_y }};
        var options = {
            center: new kakao.maps.LatLng(mapy, mapx),
            level: 3
        };

        var map = new kakao.maps.Map(container, options);

        function openKakaoView() {
            var link = "https://map.kakao.com/link/to/도착장소," + mapy + "," + mapx;
            window.open(link);
        }
    </script>
    {{-- 연관축제 --}}
    <br>
    <h1>이런 축제는 어때요?</h1>
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
                        <img src="{{$item->poster_img}}" alt="{{$item->festival_title}}" class="img-fluid" style="width:400px; height:400px;  border: 1px solid gray; object-fit:cover;">
                    @else
                        <img src='{{asset('img/festival.jpg')}}' alt="{{$item->festival_title}}" class="img-fluid" >
                    @endif
                </a>
                <h5>{{$item->festival_title}}</h5>
            </div>
        @endforeach
    </div>
</div>

{{-- 댓글 --}}
{{-- @include('layout.comment') --}}


@endsection
