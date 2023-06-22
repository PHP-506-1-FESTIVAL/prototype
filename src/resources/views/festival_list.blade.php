@extends('layout.layout')

@section('title','축제 목록')

@section('content')
<link rel="stylesheet" href="/css/festival.css">
<script src="{{asset('js/festival.js')}}"></script>

{{-- 검색부분 --}}
<div class="inner">
    <form name="festivalSearch" id="festivalSearch" class="festival_search" >
        <div class="search_box_wrap">
            <div class="select_box select_date col-md-4">
                <label for="searchDate"></label>
                <select class="form-select form-select-lg" name="searchDate" id="searchDate" title="시기 선택">
                    <option value="">시기</option>
                    {{-- <option value="A">진행중</option>
                    <option value="B">진행예정</option> --}}
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
            <div class="select_box select_area col-md-4">
                <label for="searchArea"></label>
                <select class="form-select form-select-lg" name="searchArea" id="searchArea" title="지역 선택" >
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
                    <button class="btn btn-danger btn-lg btn-block"><span>초기화</span></button>
                    <button type='button' class="btn btn-primary btn-lg btn-block" id="btnSearch" onclick='aaaname()'><span>검색</span></button>
                </div>
            </div>
        </div>
    </form>
</div>
<br>

{{-- 비주얼배너 --}}
<div class="profile-container">
	<div class="profile-box" style="background-image: url('https://cdn.visitkorea.or.kr/img/call?cmd=VIEW&id=e52bf8f5-fcd0-43d7-945a-6c04f9c64c5b');">
		<div class="profile-box-content">
			<h2>동대문디자인플라자(DDP)</h2>
			<p>가장 매력적인 서울 야경을 볼 수 있는 동대문에 위치한 복합 문화공간</p>
		</div>
	</div>
	<div class="profile-box" style="background-image: url('https://cdn.visitkorea.or.kr/img/call?cmd=VIEW&id=58a44a35-5f34-4a39-a780-a292d8e76a3d');">
		<div class="profile-box-content">
			<h2>부산 감천문화마을</h2>
			<p>반려동물과 어린왕자 포토존에서 견생샷 남길 수 있는 곳</p>
		</div>
	</div>
	<div class="profile-box" style="background-image: url('https://cdn.visitkorea.or.kr/img/call?cmd=VIEW&id=72046952-ba47-42b3-ad2b-d38d28f96805');">
		<div class="profile-box-content">
			<h2>담양 메타세쿼이아길</h2>
			<p>가로수가 만든 초록빛 동굴</p>
		</div>
	</div>
</div>
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

{{-- 메인출력 --}}
<div class="sort mt-3" style="text-align:right;">
    <button class="btn btn-success" onclick="sortByPopularity()">인기도</button>
    <button class="btn btn-warning" id="sortByLatestBtn" onclick="sortByLatest()">최신순</button>
    <a href="{{ route('main.request')}}" class="btn btn-info">요청페이지</a>
</div>
<div class="image-container" id="festivalContainer">
@php
$count = 0;
@endphp

@foreach ($data as $festival)
    @if ($count < 9)
        <a href="{{ route('fes.detail', ['id' => $festival->festival_id]) }}" style="text-decoration: none;">
            <div data-hits="{{ $festival->festival_hit }}" data-start-date="{{ $festival->festival_start_date }}" data-end-date="{{ $festival->festival_end_date }}">
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
            </div>
        </a>
    @endif
    @php $count++; @endphp
@endforeach

</div>
<script>

</script>
{{-- 이동버튼 --}}
<button class="moveTopBtn" title="맨 위로"></button>
<script>
    const $topBtn = document.querySelector(".moveTopBtn");

    $topBtn.onclick = () => {
    window.scrollTo({ top: 0, behavior: "smooth" });  
    }
</script>

@endsection