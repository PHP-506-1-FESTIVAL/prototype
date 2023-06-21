const api = 'http://localhost/api/mainapi/'
const domaine = 'http://localhost/'
const fesDetail = 'fesdetail/'
function aaaname() {
    let searchDate = document.getElementById('searchDate').value
    let searchArea = document.getElementById('searchArea').value
    let strVal=searchArea+","+searchDate
    make_api_list(strVal)
}

// const bbb = searchArea.value
str_val=searchDate+searchArea
function make_api_list(str_val) {
    const url = api+str_val;
        fetch(url)
            .then((res) => { return res.json() })
            .then((date) => target([date]))
            // .catch(console.log(date))
            .finally()
}

function target(date) {
    let targetDiv = document.getElementById('festivalContainer');
    let tempStr = ""; // Initialize an empty string to store the generated HTML

    if (date[0].length === 0) {
        tempStr = "<p>찾는 결과값이 없습니다.</p>";
    } else {
        for (let index = 0; index < date[0].length; index++) {
            const id = date[0][index].festival_id;
            const img = date[0][index].poster_img;
            const start = date[0][index].festival_start_date;
            const end = date[0][index].festival_end_date;
            const title = date[0][index].festival_title;
            const area = date[0][index].area;

            tempStr += '<a href="' + domaine + fesDetail + id + '" style="text-decoration: none;">' +
                '<div class="card">';

            if (img !== "") {
                tempStr += '<img class="card-img-top" src="' + img + '" alt="Poster Image">';
            } else {
                tempStr += '<img class="card-img-top" src="/img/festival.jpg" alt="No Image">';
            }

            tempStr += '<div class="overlay">' +
                '<h2>' + title + '</h2>' +
                '<p>' + start + ' ~ ' + end + '</p>' +
                '<p>' + area + '</p>' +
                '</div>' +
                '</div>' +
                '</a>';
        }
    }

    targetDiv.innerHTML = tempStr; // Set the generated HTML as the content of the targetDiv
}



    // // 검색된 목록 이외의 요소 제거
    // for (let i = date[0].length; i < targetDiv.length; i++) {
    //     targetDiv[i].style.display = 'none';
    // }
