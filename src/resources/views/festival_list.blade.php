@extends('layout.layout')

@section('title','축제 목록')

@section('content')
<link rel="stylesheet" href="/css/festival.css">
<script src="{{asset('js/festival.js')}}"></script>

{{-- 더보기 왔을때 실행 --}}
<form action="">
    <input type="hidden" name="" id="teststr" value="{{isset($str->fesStr)?$str->fesStr : ","}}">
</form>

{{-- 비주얼배너 --}}
@php
    $banner = \App\Models\Festival::whereIn('festival_id', [322, 556, 412])->get();
@endphp
<div class="profile-container">
    @foreach ($banner as $festival)
        @if ($festival->festival_id === 322)
            @php
                $backgroundImage = 'https://sokorea.or.kr/img/mna5.jpg';
                $festivalTitle = $festival->festival_title;
                $description = '발달장애인과 비장애인이 함께 만들고 즐겨온 전세계유일의 국제 발달장애인문화축제';
            @endphp
        @elseif ($festival->festival_id === 556)
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
{{-- <div class="profile-container">
	<div class="profile-box" style="background-image: url('https://cdn.visitkorea.or.kr/img/call?cmd=VIEW&id=e52bf8f5-fcd0-43d7-945a-6c04f9c64c5b');">
		<div class="profile-box-content">
			<h2 style="color:white;">동대문디자인플라자(DDP)</h2>
			<p>가장 매력적인 서울 야경을 볼 수 있는 동대문에 위치한 복합 문화공간</p>
		</div>
	</div>
	<div class="profile-box" style="background-image: url('https://cdn.visitkorea.or.kr/img/call?cmd=VIEW&id=58a44a35-5f34-4a39-a780-a292d8e76a3d');">
		<div class="profile-box-content">
			<h2 style="color:white;">부산 감천문화마을</h2>
			<p>반려동물과 어린왕자 포토존에서 견생샷 남길 수 있는 곳</p>
		</div>
	</div>
	<div class="profile-box" style="background-image: url('https://cdn.visitkorea.or.kr/img/call?cmd=VIEW&id=72046952-ba47-42b3-ad2b-d38d28f96805');">
		<div class="profile-box-content">
			<h2 style="color:white;">담양 메타세쿼이아길</h2>
			<p>가로수가 만든 초록빛 동굴</p>
		</div>
	</div>
</div> --}}
{{-- <div class="row">
    @php
    $count = 0;
    $today = date('Y-m-d');
    @endphp
    @foreach ($data as $festival)
        @if ($count < 3 && in_array($festival->festival_id, [1, 257, 300]))
        <div class="profile-container col-4">
            <a href="{{ route('fes.detail', ['id' => $festival->festival_id]) }}" style="text-decoration-line: none;">
                <div class="profile-container">
                    <div class="profile-box" style="background-image: url('{{ $festival->poster_img ? $festival->poster_img : "/img/festival.jpg" }}');">
                        <div class="profile-box-content">
                            <h2>{{ $festival->festival_title }}</h2>
                            <p>{{ $festival->description }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @php $count++; @endphp
        @endif
    @endforeach
</div> --}}
{{-- <div class="row">
    @php
    $count = 0;
    $today = date('Y-m-d');
    @endphp
    @foreach ($data as $festival)
        @if ($count < 3)
        <div class="col-4">
            <a href="{{ route('fes.detail', ['id' => $festival->festival_id]) }}" style="text-decoration-line: none;">
                <span class="btn {{ ($today < $festival->festival_start_date) ? 'btn-success' : (($today > $festival->festival_end_date) ? 'btn-secondary' : 'btn-primary') }}">
                    {{ ($today < $festival->festival_start_date) ? '진행예정' : (($today > $festival->festival_end_date) ? '진행종료' : '진행중') }}
                </span>
                <div class="profile-container">
                    <div class="profile-box" style="background-image: url('{{ $festival->poster_img ? $festival->poster_img : "/img/festival.jpg" }}');">
                        <div class="profile-box-content">
                            <h2>{{ $festival->festival_title }}</h2>
                            <p>{{ $festival->festival_start_date }} ~ {{ $festival->festival_end_date }}</p>
                            <p>{{ $festival->area_code }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endif
        @php $count++; @endphp
    @endforeach
</div> --}}
{{-- 검색부분 --}}
<br>
<div class="inner">
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
                <div>
                    <button class="btn btn-outline-danger btn-lg btn-block">
                        <span>
                            초기화 <img src="https://korean.visitkorea.or.kr/kfes/resources/img/reset_ico.png" alt="초기화" style="width:20px; height:20px;">
                        </span>
                    </button>
                    <button type="button" class="btn btn-success btn-lg btn-block" id="btnSearch" onclick="aaaname()">
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
{{-- <div class="sort mt-3" style="text-align:right;">
    <button class="btn btn-success" onclick="sortByPopularity()">인기도</button>
    <button class="btn btn-warning" id="sortByLatestBtn" onclick="sortByLatest()">최신순</button>
    <a href="{{ route('main.request')}}" class="btn btn-info">요청페이지</a>
</div> --}}
<div class="image-container" id="festivalContainer">
@php
$count = 0;
@endphp
@foreach ($data as $festival)
    @if ($count < 9)
        <a href="{{ route('fes.detail', ['id' => $festival->festival_id]) }}" style="text-decoration: none;">
            <div class="card">
                @php
                $today = date('Y-m-d');
                $startDate = $festival->festival_start_date;
                $endDate = $festival->festival_end_date;
                if ($today < $startDate) {
                    $statusClass = 'btn-success';
                    $statusText = '';
                    $daysRemaining = date_diff(date_create($today), date_create($startDate))->format('%a');
                    $statusText .= ' D-' . $daysRemaining . '';
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
{{-- 이동버튼 --}}
{{-- <button class="moveTopBtn" title="맨 위로"></button>
<script>
    const $topBtn = document.querySelector(".moveTopBtn");

    $topBtn.onclick = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });
    }
</script> --}}
@endsection
