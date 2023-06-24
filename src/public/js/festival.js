const api = 'http://localhost/api/mainapi/'; // API 기본 URL
const apiAll = 'http://localhost/api/mainapiall/'; // API 기본 URL
const domaine = 'http://localhost/'; // 도메인 URL
const fesDetail = 'fesdetail/'; // 페스티벌 상세 URL
let strVal=",";
let a=9;
let c=true;

function aaaname() {
  const searchDate = document.getElementById('searchDate').value; // 검색 날짜 값을 가져옵니다.
  const searchArea = document.getElementById('searchArea').value; // 검색 지역 값을 가져옵니다.
  strVal = searchArea + ',' + searchDate; // 검색 지역과 날짜를 결합합니다.
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
  const targetDiv = document.getElementById('festivalContainer');
  let tempStr = "";

  if (date[0].length === 0) {
    tempStr = "<p>찾는 결과값이 없습니다.</p>";
  } else {
    for (let index = 0; index < date[0].length; index++) {
      const id = date[0][index].festival_id;
      const img = date[0][index].poster_img;
      const start = date[0][index].festival_start_date;
      const end = date[0][index].festival_end_date;
      const title = date[0][index].festival_title;
      const area = date[0][index].area_code;

      const today = new Date().toISOString().slice(0, 10); // 현재 날짜를 YYYY-MM-DD 형식으로 가져옵니다.
      let statusClass = "";
      let statusText = "";

      if (today < start) {
        statusClass = "btn-success";
        const daysDiff = Math.floor((new Date(start) - new Date(today)) / (1000 * 60 * 60 * 24)); // 날짜 차이 계산
        statusText = `D-${daysDiff}`;
      } else if (today > end) {
        statusClass = "btn-secondary";
        statusText = "진행종료";
      } else {
        statusClass = "btn-primary";
        statusText = "진행중";
      }

      tempStr += `
        <a href="${domaine}${fesDetail}${id}" style="text-decoration: none;">
          <div class="card">
          <button type="button" class="btn ${statusClass}" style="margin: 2px;" id="ing">${statusText}</button>
            ${img !== "" ? `<img class="card-img-top" src="${img}" alt="포스터 이미지">` : `<img class="card-img-top" src="/img/festival.jpg" alt="이미지 없음">`}
            <div class="overlay">
              <h2>${title}</h2>
              <p>${start} ~ ${end}</p>
              <p>${area}</p>
              
            </div>
          </div>
        </a>`;
    }
    c = false;
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
let time=null;
window.addEventListener('scroll', () => {

  if (!time) {
    time = setTimeout(() => {
      time = null;
      if (Math.ceil(window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        makeApiAllList()
        console.log(window.innerHeight + window.scrollY + ':' + document.body.offsetHeight);
      }
    }, 1000);
  }
});

function makeApiAllList() {
  if(c){
    const url = apiAll;
    fetch(url)
    .then((res) => res.json())
    .then((data) => targetall([data]))
    .catch((error) => console.log(error))
    .finally(() => {});
  }
}

function targetall(data) {
  const targetDiv = document.getElementById('festivalContainer');

  if (data[0].length === 0) {
    const pElement = document.createElement('p');
    pElement.textContent = '찾는 결과값이 없습니다.';
    targetDiv.appendChild(pElement);
  } else {
    b = a;
    for (let index = b; index < b + 9 && index < data[0].length; index++) {
      const id = data[0][index].festival_id;
      const img = data[0][index].poster_img;
      const start = data[0][index].festival_start_date;
      const end = data[0][index].festival_end_date;
      const title = data[0][index].festival_title;
      const area = data[0][index].area_code;

      const aTag = document.createElement('a');
      aTag.href = `${domaine}${fesDetail}${id}`;
      aTag.style.textDecoration = 'none';

      const divElement = document.createElement('div');
      divElement.className = 'card';

      const imgElement = document.createElement('img');
      imgElement.className = 'card-img-top';
      imgElement.alt = '포스터 이미지';
      imgElement.src = img !== '' ? img : '/img/festival.jpg';
      imgElement.loading = 'lazy';
      divElement.appendChild(imgElement);

      const overlayDiv = document.createElement('div');
      overlayDiv.className = 'overlay';

      const h2Element = document.createElement('h2');
      h2Element.textContent = title;
      overlayDiv.appendChild(h2Element);

      const pElement1 = document.createElement('p');
      pElement1.textContent = `${start} ~ ${end}`;
      overlayDiv.appendChild(pElement1);

      const pElement2 = document.createElement('p');
      pElement2.textContent = area;
      overlayDiv.appendChild(pElement2);

      const buttonElement = document.createElement('button');
      buttonElement.type = 'button';
      buttonElement.className = `btn ${getStatusClass(start, end, new Date())}`;
      buttonElement.style.margin = '2px';
      buttonElement.id = 'ing';
      buttonElement.textContent = getStatusText(start, end, new Date());
      divElement.appendChild(buttonElement);

      divElement.appendChild(overlayDiv);
      aTag.appendChild(divElement);
      targetDiv.appendChild(aTag);
    }

    if (a < data[0].length) {
      a += 9;
    }
  }
}

function getStatus(start, end, today) {
  const todayDate = today.toISOString().slice(0, 10); // 현재 날짜를 YYYY-MM-DD 형식으로 가져옵니다.

  if (todayDate < start) {
    const daysDiff = Math.floor((new Date(start) - new Date(todayDate)) / (1000 * 60 * 60 * 24)); // 날짜 차이 계산
    return `진행예정 D-${daysDiff}일`;
  } else if (todayDate > end) {
    return '진행종료';
  } else {
    return '진행중';
  }
}

function getStatusClass(start, end, today) {
  const todayDate = today.toISOString().slice(0, 10); // 현재 날짜를 YYYY-MM-DD 형식으로 가져옵니다.

  if (todayDate < start) {
    return 'btn-success';
  } else if (todayDate > end) {
    return 'btn-secondary';
  } else {
    return 'btn-primary';
  }
}

function getStatusText(start, end, today) {
  const todayDate = today.toISOString().slice(0, 10); // 현재 날짜를 YYYY-MM-DD 형식으로 가져옵니다.

  if (todayDate < start) {
    const daysDiff = Math.floor((new Date(start) - new Date(todayDate)) / (1000 * 60 * 60 * 24)); // 날짜 차이 계산
    return `D-${daysDiff}`;
  } else if (todayDate > end) {
    return '진행종료';
  } else {
    return '진행중';
  }
}
