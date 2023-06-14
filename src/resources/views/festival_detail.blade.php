<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>카카오 지도 길찾기</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<style>
*{
    
}
.angry-grid {
    display: grid; 

    grid-template-rows: 1fr 1fr 1fr;
    grid-template-columns: 1fr 1fr 1fr;
    
    gap: 0px;
    height: 100%;
    width:1200px;
    
}
#item-0 {

    background-color: #D59DF7; 
    grid-row-start: 1;
    grid-column-start: 1;

    grid-row-end: 2;
    grid-column-end: 4; 
}
#item-1 {

    background-color: #989D96; 
    grid-row-start: 2;
    grid-column-start: 1;

    grid-row-end: 4;
    grid-column-end: 2;
}
#item-2 {

    background-color: #DAB78D; 
    grid-row-start: 2;
    grid-column-start: 2;

    grid-row-end: 3;
    grid-column-end: 4;
}
#item-3 {

    background-color: #DDFDBD; 
    grid-row-start: 3;
    grid-column-start: 2;

    grid-row-end: 4;
    grid-column-end: 4;
}
</style>
</head>

<body>
{{-- 축제 정보 --}}
<h1>공공api</h1>
    <div id="api-response"></div>

    <script>
    // API 요청 URL
    const apiUrl = "https://apis.data.go.kr/B551011/KorService1/searchFestival1?serviceKey=%2Bo8Vb5NgOSYJzSk0%2BzIXmtmXJjrt8BEfzTWdSne%2BbWytU6UOZxtWQpwXvNBYPcnxx1PUuTYdhZ6tq7sp%2BwksMw%3D%3D&numOfRows=100&pageNo=1&MobileOS=ETC&MobileApp=AppTest&_type=json&listYN=Y&arrange=d&eventStartDate=20230101";

    // API 요청
    fetch(apiUrl)
        .then(response => response.json())
        .then(data => {
            const response = data; // JSON 응답 데이터
            const items = response.response.body.items.item;

            // HTML 요소를 생성하여 데이터 출력
            const container = document.getElementById("api-response");
            items.forEach(item => {
                const { title, tel, firstimage, eventstartdate, eventenddate} = item;
                const itemDiv = document.createElement("div");
                itemDiv.innerHTML = `
                    <h2>축제명: ${title}</h2>
                    <p>전화번호: ${tel}</p>
                    <p>시작일: ${eventstartdate}</p>
                    <p>종료일: ${eventenddate}</p>
                    <img src="${firstimage}" alt="First Image">
                    <hr>
                `;
                container.appendChild(itemDiv);
            });
        })
        .catch(error => console.error(error));
    </script>

<span>
<h1>축제 정보</h1>
<div class="angry-grid">
    <div id="item-0">축제 제목, 축제진행중, 기간, 찜</div>
    <div id="item-1">포스터</div>
    <div id="item-2">축제 내용(기간, 장소, 유/무료(체험별 상이), 장소, 전화</div>
    <div id="item-3">홈페이지 있다면 홈페이지링크  </div>
</div>
</span>  
<br>

{{-- 길찾기 test --}} 
<h1>카카오 길찾기</h1>
	<div id="map" style="width:1200px;height:400px;"></div>
    <div id="routeBtn">
		<button type="button" class="btn btn-primary" onclick="openKakaoRoadView()">길찾기</button>
	</div>
	<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=3b69612f6e4716fa9f2fdbedb810321e"></script>
	<script>
		var container = document.getElementById('map');
		var options = {
			center: new kakao.maps.LatLng(35.159613, 129.163515),
			level: 3
		};
	var map = new kakao.maps.Map(container, options);
    
	function openKakaoRoadView() {
		window.open("https://map.kakao.com/link/to/공공API불러올장소이름EX해운대,35.159613, 129.163515");
	}
</script>
<br>
{{-- 댓글 --}}
    <h1>댓글</h1>
    <div>
        <div>
        <div class="input-group mb-3" style="width:1200px;">
            <input type="text" class="form-control" placeholder="로그인후 소중한 댓글을 남겨주세요" aria-label="Recipient's username" aria-describedby="button-addon2">
            <button class="btn btn-primary" type="button" id="button-addon2">등록</button>
        </div>
    </div>
</body>
</html>
