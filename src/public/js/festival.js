const api = 'http://localhost/api/mainapi/'; // API 기본 URL
const domaine = 'http://localhost/'; // 도메인 URL
const fesDetail = 'fesdetail/'; // 페스티벌 상세 URL

function aaaname() {
  const searchDate = document.getElementById('searchDate').value; // 검색 날짜 값을 가져옵니다.
  const searchArea = document.getElementById('searchArea').value; // 검색 지역 값을 가져옵니다.
  const strVal = searchArea + ',' + searchDate; // 검색 지역과 날짜를 결합합니다.
  makeApiList(strVal); // 결합된 값을 사용하여 API를 호출합니다.
}

function makeApiList(strVal) {
  const url = api + strVal; // 결합된 값으로 API URL을 생성합니다.
  fetch(url) // API에 GET 요청을 보냅니다.
    .then((res) => res.json()) // 응답을 JSON 형식으로 변환합니다.
    .then((date) => target([date])) // JSON 데이터를 target 함수에 전달합니다.
    .catch((error) => console.log(error)) // 요청 중 발생한 오류를 기록합니다.
    .finally(() => {}); // 정리 작업이나 마무리 작업을 수행합니다.
}

function target(date) {
  const targetDiv = document.getElementById('festivalContainer'); // 대상 div 요소를 가져옵니다.
  let tempStr = ""; // 생성된 HTML을 저장하기 위한 빈 문자열을 초기화합니다.

  if (date[0].length === 0) {
    // 검색 결과가 없는 경우를 확인합니다.
    tempStr = "<p>찾는 결과값이 없습니다.</p>"; // 결과 없음을 나타내는 메시지를 설정합니다.
  } else {
    for (let index = 0; index < date[0].length; index++) {
      // 검색 데이터의 각 결과에 대해 반복합니다.
      const id = date[0][index].festival_id; // 페스티벌 ID를 가져옵니다.
      const img = date[0][index].poster_img; // 포스터 이미지 URL을 가져옵니다.
      const start = date[0][index].festival_start_date; // 페스티벌 시작 날짜를 가져옵니다.
      const end = date[0][index].festival_end_date; // 페스티벌 종료 날짜를 가져옵니다.
      const title = date[0][index].festival_title; // 페스티벌 제목을 가져옵니다.
      const area = date[0][index].area; // 지역 정보를 가져옵니다.

      tempStr += `
        <a href="${domaine}${fesDetail}${id}" style="text-decoration: none;">
          <div class="card">
            ${img !== "" ? `<img class="card-img-top" src="${img}" alt="포스터 이미지">` : `<img class="card-img-top" src="/img/festival.jpg" alt="이미지 없음">`}
            <div class="overlay">
              <h2>${title}</h2>
              <p>${start} ~ ${end}</p>
              <p>${area}</p>
            </div>
          </div>
        </a>`;
    }
  }

  targetDiv.innerHTML = tempStr;
}
//메인 인기도/최신순
//인기도 
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

  if (hitsB !== hitsA) {
      return hitsB - hitsA;
  }

  var statusA = getStatus(startDateA, endDateA, today);
  var statusB = getStatus(startDateB, endDateB, today);

  if (statusB !== statusA) {
      return statusOrder(statusB) - statusOrder(statusA);
  }

  return startDateA - startDateB;
  });

  var container = document.getElementById('festivalContainer');
  container.innerHTML = '';

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

//최신순
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
  container.innerHTML = '';

  sortedFestivals.forEach(function(festival) {
      container.appendChild(festival.parentNode);
  });
}