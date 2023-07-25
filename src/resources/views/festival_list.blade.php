@extends('layout.layout')

@section('title','축제 목록')

@section('content')
<link rel="stylesheet" href="/css/festival.css">
{{-- 더보기 왔을때 실행 --}}
<form action="">
    <input type="hidden" name="" id="onload" value="{{isset($str->fesStr)?$str->fesStr:","}}">
</form>

{{-- 비주얼배너 --}}
@php
    $banner = \App\Models\Festival::whereIn('festival_id', [2193, 2463, 2301])->get();
@endphp
<div class="profile-container">
    @foreach ($banner as $festival)
        @if ($festival->festival_id === 2193)
            @php
                $backgroundImage = 'https://sokorea.or.kr/img/mna5.jpg';
                $festivalTitle = $festival->festival_title;
                $description = '발달장애인과 비장애인이 함께 만들고 즐겨온 전세계유일의 국제 발달장애인문화축제';
            @endphp
        @elseif ($festival->festival_id === 2463)
            @php
                $backgroundImage = 'https://cdn.imweb.me/thumbnail/20230529/fef8d075c2292.jpg';
                $festivalTitle = $festival->festival_title;
                $description = 'K-ROCK의 발상지, 인천에서 즐기는 국내 대표 아웃도어 음악축제';
            @endphp
        @else
            @php
                $backgroundImage = 'https://search.pstatic.net/common?quality=75&direct=true&src=https%3A%2F%2Fcsearch-phinf.pstatic.net%2F20220706_211%2F1657105883433RFst6_PNG%2F2689776_image2_1.png';
                $festivalTitle = $festival->festival_title;
                $description = '다양한 치킨과 맥주를 비롯해 공연, 음악, 이색 체험을 즐기는 문화관광축제';
            @endphp
        @endif
        <div class="profile-box" style="background-image: url('{{ $backgroundImage }}');">
            <a href="{{ route('fes.detail', ['id' => $festival->festival_id]) }}" style="text-decoration-line: none;">
                <div class="profile-box-content">
                    <h2 style="color:white;">{{ $festivalTitle }}</h2>
                    <p>{{ $description }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>
{{-- 검색부분 --}}
<br>
<div class="listinner">
    <form name="festivalSearch" id="festivalSearch" class="festival_search">
        <div class="search_box_wrap" >
            <div class="select_box select_date" style="display:flex; align-items:center">
                <label for="searchDate"></label>
                <select class="form-select form-select-lg" name="searchDate" id="searchDate" title="시기 선택">
                    <option value="">시기</option>
                    <option value="01">01월</option>
                    <option value="02">02월</option>
                    <option value="03">03월</option>
                    <option value="04">04월</option>
                    <option value="05">05월</option>
                    <option value="06">06월</option>
                    <option value="07">07월</option>
                    <option value="08">08월</option>
                    <option value="09">09월</option>
                    <option value="10">10월</option>
                    <option value="11">11월</option>
                    <option value="12">12월</option>
                </select>
            </div>
            <div class="select_box select_area" style="display:flex; align-items:center">
                <label for="searchArea"></label>
                <select class="form-select form-select-lg" name="searchArea" id="searchArea" title="지역 선택">
                    <option value="">지역</option>
                    <option value="1">서울</option>
                    <option value="2">인천</option>
                    <option value="3">대전</option>
                    <option value="4">대구</option>
                    <option value="5">광주</option>
                    <option value="6">부산</option>
                    <option value="7">울산</option>
                    <option value="8">세종</option>
                    <option value="31">경기</option>
                    <option value="32">강원</option>
                    <option value="33">충북</option>
                    <option value="34">충남</option>
                    <option value="35">경북</option>
                    <option value="36">경남</option>
                    <option value="37">전북</option>
                    <option value="38">전남</option>
                    <option value="39">제주</option>
                </select>
            </div>
            <div class="btn_box">
                <div class="button">
                    <button class="btn  btn-alt btn-lg btn-block">
                        <span>
                            초기화 <img src="https://korean.visitkorea.or.kr/kfes/resources/img/reset_ico.png" alt="초기화" style="width:20px; height:20px;">
                        </span>
                    </button>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="btnSearch" onclick="aaaname()" style="padding:11px; padding-left:20px; padding-right:20px;">
                        <span>
                            검색 <img src="https://korean.visitkorea.or.kr/kfes/resources/img/shortcut_black_ico.svg" alt="검색" style="width:30px; height:30px; filter: brightness(0) invert(1);">
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<br>
{{-- 메인출력 --}}
<div class="image-container" id="festivalContainer">
@php
$count = 0;
@endphp
@foreach ($data as $festival)
    @if ($count < 9)
        <a href="{{ route('fes.detail', ['id' => $festival->festival_id]) }}" style="text-decoration: none;">
            <div class="card">
                <button type="button" class="btn {{ $festival->statusClass }}" id="ing">
                    {{ $festival->statusText }}
                </button>
                @if ($festival->poster_img)
                    <img class="card-img-top" src="{{ $festival->poster_img }}" alt="Poster Image" loading="lazy">
                @else
                    <img class="card-img-top" src="/img/festival.jpg" alt="No Image" loading="lazy">
                @endif
                <div class="overlay">
                    <h2>{{ $festival->festival_title }}</h2>
                    <p>{{ $festival->festival_start_date }} ~ {{ $festival->festival_end_date }}</p>
                    <p id='area'>{{$festival->area_code}}</p>
                </div>
            </div>
        </a>
    @endif
    @php $count++; @endphp
@endforeach
</div>
<script src="{{asset('js/festival.js')}}"></script>
@endsection
