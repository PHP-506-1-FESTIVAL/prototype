const api = 'http://localhost/api/mainapi/'
const domaine = 'http://localhost/'
const fesOrder = 'feslist/'
const fesDetail = 'fesdetail/'
let noneImg='img/festival.jpg';

function changeText() {
    const monthStr=document.getElementById('category').value;
    const changVal = document.getElementById('fesOrederIp');
    changVal.setAttribute('value',","+monthStr);
    resColor();
    make_api_list(","+monthStr);
}

function make_api_list(str_val) {


    const url = api+str_val;
        fetch(url)
            .then((res) => { return res.json() })
            .then((date) => target([date]))
            .finally()
            const changVal = document.getElementById('fesOrederIp');
            changVal.setAttribute('value',str_val);
}

function target(date) {
    let tempStr="";
    let targetDiv = document.getElementById('Recommend');
    if (date[0].length === 0) {
        tempStr = "<p>찾는 결과값이 없습니다.</p>";
    } else {
        if (date[0].length<4) {
            for (let index = 0; index < date[0].length; index++){
                const id = date[0][index].festival_id;
            const img = date[0][index].poster_img;
            const start = date[0][index].festival_start_date;
            const end = date[0][index].festival_end_date;
            const title = date[0][index].festival_title;
            const area = date[0][index].area_code;
            const statusClass=date[0][index].statusClass
            const statusText=date[0][index].statusText

            tempStr += `
            <div class="col-12">
                <div class="single-city wow fadeInUp" data-wow-delay=".2s">
                    <a href="${domaine}${fesDetail}${id}" class="info-box">
                        <div class="image">
                        ${img !== "" ? `<img class="img-fluid" src="${img}" alt="${title}" style="width:550px; height:360px; object-fit:cover;">` : `<img class="img-fluid" src="/img/festival.jpg" alt="${title}">`}
                        </div>
                        <p class="date ${statusClass}">${statusText}</p>
                        <div class="content" style="text-align: left!important;">
                            <h4 class="name">
                                ${title}
                                <span>${start}~${end}</span>
                                <span>${area}</span>
                            </h4>
                        </div>
                        <div class="more-btn">
                            <i class="lni lni-circle-plus"></i>
                        </div>
                    </a>
                </div>
            </div>`
            }
        } else {
            for (let index = 0; index < 4; index++){
                const id = date[0][index].festival_id;
            const img = date[0][index].poster_img;
            const start = date[0][index].festival_start_date;
            const end = date[0][index].festival_end_date;
            const title = date[0][index].festival_title;
            const area = date[0][index].area_code;
            const statusClass=date[0][index].statusClass
            const statusText=date[0][index].statusText

            tempStr += `
            <div class="col-12">
                <div class="single-city wow fadeInUp" data-wow-delay=".2s">
                    <a href="${domaine}${fesDetail}${id}" class="info-box">
                        <div class="image">
                        ${img !== "" ? `<img class="img-fluid" style="width:550px; height:360px; object-fit:cover;" src="${img}" alt="${title}">` : `<img class="img-fluid" src="/img/festival.jpg" alt="${title}">`}
                        </div>
                        <p class="date ${statusClass}">${statusText}</p>
                        <div class="content" style="text-align: left!important;">
                            <h4 class="name">
                                ${title}
                                <span>${start}~${end}</span>
                                <span>${area}</span>
                            </h4>
                        </div>
                        <div class="more-btn">
                            <i class="lni lni-circle-plus"></i>
                        </div>
                    </a>
                </div>
            </div>`
        }
        }
        c = false;
        tempStr +=`
        <div></div>
        <div class="button" style="padding: 10px; margin: 10px;">
            <button type="button" class="btn" onclick="FesSub()">더보기</button>
        </div>`
    }
    targetDiv.innerHTML = tempStr;
}

// area_code
// 1서울
// 2인천
// 3대전
// 4대구
// 5광주
// 6부산
// 7울산
// 8세종
// 31경기
// 32강원
// 33충북
// 34충남
// 35경북
// 36경남
// 37전북
// 38전남
// 39제주
let AC1 = document.getElementById('AC1');
let AC2 = document.getElementById('AC2');
let AC3 = document.getElementById('AC3');
let AC4 = document.getElementById('AC4');
let AC5 = document.getElementById('AC5');
let AC6 = document.getElementById('AC6');
let AC7 = document.getElementById('AC7');
let AC8 = document.getElementById('AC8');
let AC31 = document.getElementById('AC31');
let AC32 = document.getElementById('AC32');
let AC33= document.getElementById('AC33');
let AC34 = document.getElementById('AC34');
let AC35 = document.getElementById('AC35');
let AC36 = document.getElementById('AC36');
let AC37 = document.getElementById('AC37');
let AC38 = document.getElementById('AC38');
let AC39 = document.getElementById('AC39');

function resSelect() {
    for (let i = 0; i <= 8; i++) {
        let key = 'selectAC'+i;
        let selitem = document.getElementById(key);
        selitem.removeAttribute('selected');
    }
    for (let i = 31; i <= 39; i++) {
        let key = 'selectAC'+i;
        let selitem = document.getElementById(key);
        selitem.removeAttribute('selected');
    }
}

function resColor() {
    AC1.style.fill='';
    AC2.style.fill='';
    AC3.style.fill='';
    AC4.style.fill='';
    AC5.style.fill='';
    AC6.style.fill='';
    AC7.style.fill='';
    AC8.style.fill='';
    AC31.style.fill='';
    AC32.style.fill='';
    AC33.style.fill='';
    AC37.style.fill='';
    AC39.style.fill='';
    AC35.style.fill='';
    AC36.style.fill='';
    AC38.style.fill='';
    AC34.style.fill='';
}

AC1.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC1.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(1+","+monthStr);
    document.getElementById('selectAC1').setAttribute('selected', true);
})
AC2.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC2.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(2+","+monthStr);
    document.getElementById('selectAC2').setAttribute('selected', true);
})
AC3.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC3.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(3+","+monthStr);
    document.getElementById('selectAC3').setAttribute('selected', true);
})
AC4.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC4.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(4+","+monthStr);
    document.getElementById('selectAC4').setAttribute('selected', true);
})
AC5.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC5.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(5+","+monthStr);
    document.getElementById('selectAC5').setAttribute('selected', true);
})
AC6.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC6.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(6+","+monthStr);
    document.getElementById('selectAC6').setAttribute('selected', true);
})
AC7.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC7.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(7+","+monthStr);
    document.getElementById('selectAC7').setAttribute('selected', true);
})
AC8.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC8.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(8+","+monthStr);
    document.getElementById('selectAC8').setAttribute('selected', true);
})
AC31.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC31.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(31+","+monthStr);
    document.getElementById('selectAC31').setAttribute('selected', true);
})
AC32.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC32.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(32+","+monthStr);
    document.getElementById('selectAC32').setAttribute('selected', true);
})
AC33.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC33.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(33+","+monthStr);
    document.getElementById('selectAC33').setAttribute('selected', true);
})
AC34.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC34.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(34+","+monthStr);
    document.getElementById('selectAC34').setAttribute('selected', true);
})
AC35.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC35.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(35+","+monthStr);
    document.getElementById('selectAC35').setAttribute('selected', true);
})
AC36.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC36.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(36+","+monthStr);
    document.getElementById('selectAC36').setAttribute('selected', true);
})
AC37.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC37.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(37+","+monthStr);
    document.getElementById('selectAC37').setAttribute('selected', true);
})
AC38.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC38.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(38+","+monthStr);
    document.getElementById('selectAC38').setAttribute('selected', true);
})
AC39.addEventListener('click',()=>{
    resColor();
    resSelect();
    AC39.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value;
    make_api_list(39+","+monthStr);
    document.getElementById('selectAC39').setAttribute('selected', true);
})

function FesSub() {
    const frm=document.getElementById('fesOrderFrm')
    frm.submit();
}

function changeArea() {
    const area = document.getElementById('category2').value;
    const key = document.getElementById(area);
    let areano = area.substr(2);
    resColor();
    key.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(areano+","+monthStr);
}