@extends('layout.layout')

@section('title','축제 목록')

@section('content')
{{-- 검색부분 --}}
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .inner {
            text-align: center;
        }

        .select_box {
            margin-right: 10px;
        }

        .btn_box {
            margin-left: 10px;
        }

        .search_box_wrap {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    </style>
</head>
<body>

    <div class="inner">
        <form name="festivalSearch" id="festivalSearch" class="festival_search" >
            <div class="search_box_wrap">
                <div class="select_box select_date col-md-4">
                    <label for="searchDate"></label>
                    <select class="form-select form-select-lg" name="searchDate" id="searchDate" title="시기 선택">
                        <option value="">시기</option>
                        <option value="A">진행중</option>
                        <option value="B">진행예정</option>
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
</body>
</html>

<br>


</html>

{{-- 비주얼배너 --}}
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
<title>Home</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
<style>
*,*:after,*:before{
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	-ms-box-sizing: border-box;
	box-sizing: border-box;
}
body{
	font-family: arial;
	font-size: 16px;
	margin: 0;
	background: #fff;
}

.profile-container{
	display: flex;
}
.profile-box{
	flex-basis: calc(33.333%);
	position: relative;
	overflow: hidden;
	height: 400px;
    width: 300px;
	background-size:  auto 120%;
	background-repeat: no-repeat;
	background-position: center center;
	transition: all 0.6s ease-out;
	position: relative;
	border-right: 1px solid #000;
	display: flex;
	align-items: flex-end;
	padding: 40px;
}
.profile-box-content{
	padding: 30px;
	color: #fff;
	font-size: 18px;
	opacity: 0;
	position: relative;
	left: -30px;
}

.profile-box-content h2{
	margin:0 0 20px;
}
.profile-box-content p:last-child{
	margin: 0;
}
.profile-box:hover .profile-box-content{
	opacity: 1;
	transition: all 0.3s ease-out 0.6s ;
	left: 0;
}
.profile-box:last-child{
	border:0px;
}
.profile-container:hover .profile-box{
	flex-basis: calc(15%);
}
.profile-container:hover .profile-box:hover{
	flex-basis: calc(70%);
	transition: all 0.4s ease-out;
	z-index: 1;
}
</style>
</head>
<body>

<div class="row">
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
</div>

</body>
</html>

{{-- 메인출력 --}}
<!DOCTYPE html>
<html>
<head>
<style>
.image-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.image-container div {
    margin: 10px;
    height: 360px;
    width: 480px;
}

.card {
    width: 300px;
    height: 400px;
}

.card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.overlay {
    position: absolute;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: flex-end;
    opacity: 0;
    transition: opacity 0.3s ease;
    background-color: rgba(0, 0, 0, 0.7);
    color: #ffffff;
    max-height: 140px;
    max-width: 460px;
    bottom:0px;
}

.overlay h2 {
    font-size: 24px;
    margin-bottom: 10px;
}

.overlay p {
    margin-bottom: 10px;
}

.image-container div:hover .overlay {
    opacity: 1;
}

#ing {
    position: absolute;
}
.heart{
    border:0;
    top:0;
    right:0;
    background-color: transparent;
    position: absolute;
}
/* Bootstrap CDN */
@import url('https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css');

</style>
</head>
<body>

    <div class="sort mt-3" style="text-align:right;">
        <button class="btn btn-success" onclick="sortByPopularity()">인기도</button>
        <button class="btn btn-warning" id="sortByLatestBtn" onclick="sortByLatest()">최신순</button>
    </div>
    <div class="image-container" id="festivalContainer">
        @foreach ($data as $festival)
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

                        <button type="button" class="heart" onclick="changeText(event)" style="border-radius: 5px; background-color: rgba(255, 255, 255, 0.5);">{{ $festival->festival_hit }}🤍</button>

                        @if ($festival->poster_img)
                            <img class="card-img-top" src="{{ $festival->poster_img }}" alt="Poster Image">
                        @else
                            <img class="card-img-top" src="/img/festival.jpg" alt="No Image">
                        @endif

                        <div class="overlay">
                            <h2>{{ $festival->festival_title }}</h2>
                            <p>{{ $festival->festival_start_date }} ~ {{ $festival->festival_end_date }}</p>
                            <p>
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
                    </div>
                </div>
            </a>
        @endforeach
    </div>

<script>

// 정렬 버튼 클릭 시 호출되는 함수 - 인기도 순으로 정렬
function sortByPopularity() {
  var festivals = Array.from(document.querySelectorAll('[data-hits]'));
  var today = new Date();

  festivals.sort(function(a, b) {
    var startDateA = new Date(a.getAttribute('data-start-date'));
    var endDateA = new Date(a.getAttribute('data-end-date'));
    var startDateB = new Date(b.getAttribute('data-start-date'));
    var endDateB = new Date(b.getAttribute('data-end-date'));

    var hitsA = parseInt(a.getAttribute('data-hits'));
    var hitsB = parseInt(b.getAttribute('data-hits'));

    // Sort by hits (popularity)
    if (hitsB !== hitsA) {
      return hitsB - hitsA;
    }

    var statusA = getStatus(startDateA, endDateA, today);
    var statusB = getStatus(startDateB, endDateB, today);

    // Sort by status if hits are equal
    if (statusB !== statusA) {
      return statusOrder(statusB) - statusOrder(statusA);
    }

    // Sort by start date if hits and status are equal
    return startDateA - startDateB;
  });

  var container = document.getElementById('festivalContainer');
  container.innerHTML = ''; // Clear previous content

  festivals.forEach(function(festival) {
    container.appendChild(festival.parentNode);
  });
}
// 축제의 진행 상태를 반환하는 함수
function getStatus(startDate, endDate, today) {
  if (startDate <= today && today <= endDate) {
    return '진행중';
  } else if (today < startDate) {
    return '진행예정';
  } else {
    return '진행완료';
  }
}

// 진행 상태의 정렬 순서를 반환하는 함수
function statusOrder(status) {
  switch (status) {
    case '진행중':
      return 1;
    case '진행예정':
      return 2;
    case '진행완료':
      return 3;
    default:
      return 0;
  }
}

// 최신순으로 정렬
function sortByLatest() {
  var festivals = Array.from(document.querySelectorAll('[data-hits]'));
  var today = new Date();

  var ongoingFestivals = [];
  var upcomingFestivals = [];
  var completedFestivals = [];

  festivals.forEach(function(festival) {
    var startDate = new Date(festival.getAttribute('data-start-date'));
    var endDate = new Date(festival.getAttribute('data-end-date'));
    var status = getStatus(startDate, endDate, today);

    if (status === '진행중') {
      ongoingFestivals.push(festival);
    } else if (status === '진행예정') {
      upcomingFestivals.push(festival);
    } else if (status === '진행완료') {
      completedFestivals.push(festival);
    }
  });

  var sortedFestivals = ongoingFestivals.concat(upcomingFestivals).concat(completedFestivals);

  var container = document.getElementById('festivalContainer');
  container.innerHTML = ''; // Clear previous content

  sortedFestivals.forEach(function(festival) {
    container.appendChild(festival.parentNode);
  });
}





// 이벤트 리스너를 통해 최신순 버튼 클릭 시 sortByLatest 함수 호출
document.getElementById('sortByLatestBtn').addEventListener('click', sortByLatest);

function changeText(event) {
    var button = event.target;
    if (button.innerText === '🤍') {
        button.innerText = '❤';
    } else {
        button.innerText = '🤍';
    }
}
</script>
</div>
</html>


{{-- 이동버튼 --}}
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .moveTopBtn {
            position: fixed;
            bottom: 1rem;
            right: 1rem;
            width: 4rem;
            height: 4rem;
            background: url("https://cdn-icons-png.flaticon.com/512/55/55008.png") no-repeat center center;
            background-size: cover;
            border-radius: 50%;
            border: none;
            outline: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <button class="moveTopBtn" title="맨 위로"></button>
    <script>
        const $topBtn = document.querySelector(".moveTopBtn");

        $topBtn.onclick = () => {
            window.scrollTo({ top: 0, behavior: "smooth" });  
        }
    </script>
</body>
</html>
{{-- 관련축제 --}}

<script src="{{asset('js/festival.js')}}"></script>
@endsection