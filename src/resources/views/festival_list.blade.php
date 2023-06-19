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

.search_box_wrap .select_box,
.search_box_wrap .btn_box {
    flex: 1;
}
</style>
</head>
<body>
    <div class="inner">
        <div class="blind">검색영역</div>
        <form name="festivalSearch" id="festivalSearch" class="festival_search">
                <legend class="blind">축제 검색</legend>
                <div class="search_box_wrap">
                    <div class="select_box select_date col-md-4">
                        <label for="searchDate"></label>
                        <select class="form-select form-select-lg" name="searchDate" id="searchDate" title="시기 선택">
                            <option value="">시기</option>
                            <option value="A">개최중</option>
                            <option value="B">개최예정</option>
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
                        <select class="form-select form-select-lg " name="searchArea" id="searchArea" title="지역 선택">
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
                            <button class="btn btn-danger btn-lg btn-block " onclick="resetSearchForm()"><span>초기화</span></button>
                            <button class="btn btn-primary btn-lg btn-block" id="btnSearch" onclick="searchFestivals()"><span>검색</span></button>
                        </div>
                    </div>
                </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>

{{-- 비주얼배너 --}}
{{-- 인기도/최신순 --}}
<div class="sort mt-3 "style="text-align:right;">
    <button class="btn btn-success" onclick="sortByPopularity()">인기도</button>
    <button class="btn btn-warning" onclick="sortByLatest()">최신순</button>
</div>
    <script>
        function handleSortChange() {
            var sortSelect = document.getElementById("sortSelect");
            var selectedValue = sortSelect.value;
            
            // Redirect to the appropriate URL based on the selected sort option
            switch (selectedValue) {
                case "popularity":
                    window.location.href = "?sort=popularity";
                    break;
                case "latest":
                    window.location.href = "?sort=latest";
                    break;
                default:
                    // Handle default case or custom sorting logic
                    break;
            }
        }
    </script>
{{-- 메인출력 --}}
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .image-container div {
            margin: 10px;
            text-align: center;
            height:500px;
            width: 500px;
        }

        .card {
            width: 500px;
            height: 500px;
        }

        .card-img-top {
            width: 100%;
            height: 100%;
            object-fit: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-end;
            opacity: 0;
            transition: opacity 0.3s ease;
            background-color: rgba(0, 0, 0, 0.5);
            color: #ffffff;
            padding: 20px;
            width: 80%;
            height: 80%;
            box-sizing: border-box;
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

        /* Media queries for responsive layout */
        @media (max-width: 500px) {
            .card {
                width: 100%;
                height: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="image-container">
        @foreach ($data as $festival)
            <div onclick="window.location.href='detail.php?id={{ $festival->festival_id }}';">
                @if ($festival->poster_img)
                    <div class="card">
                        <img class="card-img-top" src="{{ $festival->poster_img }}" alt="Poster Image">
                        <div class="overlay">
                            <h2>{{ $festival->festival_title }}</h2>
                            <p>{{ $festival->festival_start_date }} ~ {{ $festival->festival_end_date }}</p>
                            <p>
                                @switch($festival->area_code)
                                    @case(1)
                                        서울
                                        @break
                                    @case(2)
                                        인천
                                        @break
                                    @case(3)
                                        대전
                                        @break
                                    @case(4)
                                        대구
                                        @break
                                    @case(5)
                                        광주
                                        @break
                                    @case(6)
                                        부산
                                        @break
                                    @case(7)
                                        울산
                                        @break
                                    @case(8)
                                        세종
                                        @break
                                    @case(31)
                                        경기
                                        @break
                                    @case(32)
                                        강원
                                        @break
                                    @case(33)
                                        충북
                                        @break
                                    @case(34)
                                        충남
                                        @break
                                    @case(35)
                                        경북
                                        @break
                                    @case(36)
                                        경남
                                        @break
                                    @case(37)
                                        전북
                                        @break
                                    @case(38)
                                        전남
                                        @break
                                    @case(39)
                                        제주
                                        @break
                                    @default
                                        Unknown
                                @endswitch
                            </p>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <img class="card-img-top" src="https://adventure.co.kr/wp-content/uploads/2020/09/no-image.jpg" alt="No Image">
                        <div class="overlay">
                            <h2>{{ $festival->festival_title }}</h2>
                            <p>{{ $festival->festival_start_date }} ~ {{ $festival->festival_end_date }}</p>
                            <p>
                                @switch($festival->area_code)
                                    @case(1)
                                        서울
                                        @break
                                    @case(2)
                                        인천
                                        @break
                                    @case(3)
                                        대전
                                        @break
                                    @case(4)
                                        대구
                                        @break
                                    @case(5)
                                        광주
                                        @break
                                    @case(6)
                                        부산
                                        @break
                                    @case(7)
                                        울산
                                        @break
                                    @case(8)
                                        세종
                                        @break
                                    @case(31)
                                        경기
                                        @break
                                    @case(32)
                                        강원
                                        @break
                                    @case(33)
                                        충북
                                        @break
                                    @case(34)
                                        충남
                                        @break
                                    @case(35)
                                        경북
                                        @break
                                    @case(36)
                                        경남
                                        @break
                                    @case(37)
                                        전북
                                        @break
                                    @case(38)
                                        전남
                                        @break
                                    @case(39)
                                        제주
                                        @break
                                    @default
                                        Unknown
                                @endswitch
                            </p>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
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

    // 버튼 클릭 시 맨 위로 이동
    $topBtn.onclick = () => {
        window.scrollTo({ top: 0, behavior: "smooth" });  
    }
    </script>
</body>
</html>

@endsection