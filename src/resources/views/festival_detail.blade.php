@extends('layout.layout')

@section('title', '축제정보상세')

@section('content')
{{-- 축제 정보 --}}
<div class="festival-detail">
    <h2>{{ $festival->festival_title }}</h2>
    <img src="{{ $festival->poster_img }}" alt="포스터이미지">
    <p>Start Date: {{ $festival->festival_start_date }}</p>
    <p>End Date: {{ $festival->festival_end_date }}</p>
    <p>Area: 
        @php
        $areaName = '';
        switch($festival->area_code) {
            case 1:
                $areaName = '서울';
                break;
            case 2:
                $areaName = '인천';
                break;
            case 3:
                $areaName = '대전';
                break;
            case 4:
                $areaName = '대구';
                break;
            case 5:
                $areaName = '광주';
                break;
            case 6:
                $areaName = '부산';
                break;
            case 7:
                $areaName = '울산';
                break;
            case 8:
                $areaName = '세종';
                break;
            case 31:
                $areaName = '경기';
                break;
            case 32:
                $areaName = '강원';
                break;
            case 33:
                $areaName = '충북';
                break;
            case 34:
                $areaName = '충남';
                break;
            case 35:
                $areaName = '경북';
                break;
            case 36:
                $areaName = '경남';
                break;
            case 37:
                $areaName = '전북';
                break;
            case 38:
                $areaName = '전남';
                break;
            case 39:
                $areaName = '제주';
                break;
            default:
                $areaName = 'Unknown';
        }
        @endphp
        {{ $areaName }}
    </p>
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
<br><hr>

{{-- 댓글 --}}
{{-- @include('layout.comment') --}}

@endsection
