@extends('layout.layout')

@section('title','축제정보상세')

@section('content')
{{-- 축제 정보 --}}
<div class="container">
<h1>축제 정보</h1>
    <div class="parent">
        @foreach ($data as $item)
        <div class="div1">
            축제 제목: {{ $item->festival_title }}
            <br>축제진행중:
            @if (now() >= $item->festival_start_date && now() <= $item->festival_end_date)
                진행중
            @else
                종료됨
            @endif
                <br>기간: {{ $item->festival_start_date }} ~ {{ $item->festival_end_date }}<br>찜: [찜 로직 추가]
            </div>

            <div class="div2">
                <img src="{{ $item->poster_img }}" style="width:100%; height:auto; object-fit: fill;" alt="포스터">
            </div>

            <div class="div3">
                시작일: {{ $item->festival_start_date }} ~ 종료일: {{ $item->festival_end_date }}
                <br>지역:
                @switch($item->area_code)
                    @case(1)
                        @lang('서울')
                        @break
                    @case(2)
                        @lang('인천')
                        @break
                    @case(3)
                        @lang('대전')
                        @break
                    @case(4)
                        @lang('대구')
                        @break
                    @case(5)
                        @lang('광주')
                        @break
                    @case(6)
                        @lang('부산')
                        @break
                    @case(7)
                        @lang('울산')
                        @break
                    @case(8)
                        @lang('세종')
                        @break
                    @case(31)
                        @lang('경기')
                        @break
                    @case(32)
                        @lang('강원')
                        @break
                    @case(33)
                        @lang('충북')
                        @break
                    @case(34)
                        @lang('충남')
                        @break
                    @case(35)
                        @lang('경북')
                        @break
                    @case(36)
                        @lang('경남')
                        @break
                    @case(37)
                        @lang('전북')
                        @break
                    @case(38)
                        @lang('전남')
                        @break
                    @case(39)
                        @lang('제주')
                        @break
                    @default
                        @lang('default')
                @endswitch

                {{-- <br>좌표x: {{ $item->map_x }} 
                <br>좌표y: {{ $item->map_y }} --}}
                <br>장소: 장소는 좌표로 지도검색해서 결과값 집어넣기
                <br>전화: {{ $item->tel }}
            </div>
        @endforeach
    </div>

{{-- 지도 --}}
<h1>지도</h1>
<div id="map" style="width:1200px; height:400px;"></div>
    <div id="routeBtn">
        <button type="button" class="btn btn-primary" onclick="openKakaoView()">길찾기</button>
    </div>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=3b69612f6e4716fa9f2fdbedb810321e&libraries=services"></script>
    <script>
        var container = document.getElementById('map');
        var mapx = <?php echo ($item->map_x) ?>;
        var mapy = <?php echo ($item->map_y) ?>;
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
<br><hr>

{{-- 댓글 --}}
@include('layout.comment')

@endsection