@extends('layout.layout')

@section('title', '축제정보상세')

@section('content')
{{-- 축제 정보 --}}
<div class="festival-detail">
    <div>
        <p>축제정보</p>
        <h2>{{ $festival->festival_title }}</h2>
        {{-- <p>❤{{ $festival->festival_hit }}</p> --}}
        <p>
        @if (isset($jjmFlg[0]->favorite_id))
            ❤
        @else
            ♡
        @endif
            {{ $festival->festival_hit }}</p>
        @php
            $today = date('Y-m-d');
            $startDate = $festival->festival_start_date;
            $endDate = $festival->festival_end_date;

            if ($today < $startDate) {
                $statusClass = 'btn-success';
                $statusText = '진행예정';
                $daysRemaining = date_diff(date_create($today), date_create($startDate))->format('%a');
                $statusText .= ' D-' . $daysRemaining . '일';
            } elseif ($today > $endDate) {
                $statusClass = 'btn-secondary';
                $statusText = '진행종료';
            } else {
                $statusClass = 'btn-primary';
                $statusText = '진행중';
            }
        @endphp

        <button type="button" class="btn {{ $statusClass }}" id="ing">
            {{ $statusText }}
        </button>

        {{-- 찜기능 --}}
        <form action="{{route('favorite.jjm')}}" method="post">
            @csrf
            @if (isset($jjmFlg[0]->favorite_id))
            @method('delete')
            @endif
            <input type="hidden" name="test" value="{{session()->get('user_id').','.$festival->festival_id}}">
            <button type="submit">찜하기</button>
        </form>
    </div> 
    <div>
        @if ($festival->poster_img)
            <img class="img" style="padding:10px; width:400px; height:600px; object-fit: cover;" src="{{ $festival->poster_img }}" alt="Poster Image">
        @else
            <img class="img" style="padding:10px; width:400px; height:600px; object-fit: cover;" src="/img/festival.jpg" alt="No Image">

        @endif
    </div>
    <div>
        <p>기간: {{ $festival->festival_start_date }} ~ {{ $festival->festival_end_date }}</p>
        <p>지역:{{ $festival->area_code }}
        </p>
    </div>
</div>
{{-- 지도 --}}
<div>
<h1>지도</h1>
    <div id="map" style="width:1200px; height:400px;"></div>
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
    </div>
<button type="button" class="btn btn-warning" onclick="openKakaoView()">길찾기 <img src="https://cdn-icons-png.flaticon.com/512/2413/2413825.png" alt="길찾기 아이콘" style="width: 22px; height: 22px;"></button>

{{-- 댓글 --}}
{{-- @include('layout.comment') --}}
@endsection
