const api = 'http://localhost/api/mainapi/'
const domaine = 'http://localhost/'
const fesOrder = 'feslist/'
const fesDetail = 'fesdetail/'
let noneImg='img/festival.jpg';


// let month = document.getElementById('month');

// function make_list(date) {

//     date.forEach(item => {
//         console.log(item)
//         const a = document.createElement('img')
//         a.setAttribute('src', item.image)
//         a.setAttribute('loading', 'lazy')

//         document.body.appendChild(a);

//     });
// }
function changText() {
    const monthStr=document.getElementById('category').value
    const changVal = document.getElementById('fesOrederIp');
    changVal.setAttribute('value',","+monthStr);
    resColor()
}

function make_api_list(str_val) {


    const url = api+str_val;
        fetch(url)
            .then((res) => { return res.json() })
            .then((date) => target([date]))
            // .catch(console.log)
            .finally()
            const changVal = document.getElementById('fesOrederIp');
            // moreFes.setAttribute("href","{{route('main.FesOrder', ['id' => "+area_code+"])}}")//안먹히네
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
            <div class="col-6 col-sm-6">
                <div class="single-city wow fadeInUp" data-wow-delay=".2s">
                    <a href="${domaine}${fesDetail}${id}" class="info-box">
                        <div class="image">
                        ${img !== "" ? `<img class="img-fluid" src="${img}" alt="${title}">` : `<img class="img-fluid" src="/img/festival.jpg" alt="${title}">`}
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
            <div class="col-6 col-sm-6">
                <div class="single-city wow fadeInUp" data-wow-delay=".2s">
                    <a href="${domaine}${fesDetail}${id}" class="info-box">
                        <div class="image">
                        ${img !== "" ? `<img class="img-fluid" src="${img}" alt="${title}">` : `<img class="img-fluid" src="/img/festival.jpg" alt="${title}">`}
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
// let AC34 AC35 AC36 AC38 그룹 형식
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

function resColor() {
    AC1.style.fill='#e9e9e9';
    AC2.style.fill='#e9e9e9';
    AC3.style.fill='#e9e9e9';
    AC4.style.fill='#e9e9e9';
    AC5.style.fill='#e9e9e9';
    AC6.style.fill='#e9e9e9';
    AC7.style.fill='#e9e9e9';
    AC8.style.fill='#e9e9e9';
    AC31.style.fill='#e9e9e9';
    AC32.style.fill='#e9e9e9';
    AC33.style.fill='#e9e9e9';
    AC37.style.fill='#e9e9e9';
    AC39.style.fill='#e9e9e9';
    AC35.style.fill='#e9e9e9';
    AC36.style.fill='#e9e9e9';
    AC38.style.fill='#e9e9e9';
    AC34.style.fill='#e9e9e9';



}

// AC1.addEventListener('click',()=>alert('체크'))
// let color_flg1=true
// let color_flg2=0
// AC1.addEventListener('click',()=>{
//     if (color_flg1) {
//         color_flg1=false;
//         color_flg2=1;
//         resColor();
//         console.log(color_flg1+":"+color_flg2);
//         AC1.style.fill='red';
//         make_api_list(1);
//     } else {
//         if (color_flg2===1) {
//             color_flg1=true;
//             console.log(color_flg1+":"+color_flg2);
//             resColor();
//         } else {
//             color_flg2=1;
//             console.log(color_flg1+":"+color_flg2);
//             AC1.style.fill='red';
//             make_api_list(1);
//         }
//     }
// })
// AC2.addEventListener('click',()=>{
//     if (color_flg1) {
//         color_flg1=false;
//         color_flg2=2;
//         console.log(color_flg1+":"+color_flg2);
//         resColor();
//         AC2.style.fill='red';
//         make_api_list(1);
//     } else {
//         if (color_flg2===2) {
//             color_flg1=true;
//             console.log(color_flg1+":"+color_flg2);
//             resColor();
//         } else {
//             color_flg2=2;
//             console.log(color_flg1+":"+color_flg2);
//             AC2.style.fill='red';
//             make_api_list(1);
//         }
//     }
// })

AC1.addEventListener('click',()=>{
    resColor();
    AC1.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(1+","+monthStr);
})
AC2.addEventListener('click',()=>{
    resColor();
    AC2.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(2+","+monthStr);
})
AC3.addEventListener('click',()=>{
    resColor();
    AC3.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(3+","+monthStr);
})
AC4.addEventListener('click',()=>{
    resColor();
    AC4.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(4+","+monthStr);
})
AC5.addEventListener('click',()=>{
    resColor();
    AC5.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(5+","+monthStr);
})
AC6.addEventListener('click',()=>{
    resColor();
    AC6.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(6+","+monthStr);
})
AC7.addEventListener('click',()=>{
    resColor();
    AC7.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(7+","+monthStr);
})
AC8.addEventListener('click',()=>{
    resColor();
    AC8.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(8+","+monthStr);
})
AC31.addEventListener('click',()=>{
    resColor();
    AC31.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(31+","+monthStr);
})
AC32.addEventListener('click',()=>{
    resColor();
    AC32.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(32+","+monthStr);
})
AC33.addEventListener('click',()=>{
    resColor();
    AC33.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(33+","+monthStr);
})
AC34.addEventListener('click',()=>{
    resColor();
    AC34.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(34+","+monthStr);
})
AC35.addEventListener('click',()=>{
    resColor();
    AC35.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(35+","+monthStr);
})
AC36.addEventListener('click',()=>{
    resColor();
    AC36.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(36+","+monthStr);
})
AC37.addEventListener('click',()=>{
    resColor();
    AC37.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(37+","+monthStr);
})
AC38.addEventListener('click',()=>{
    resColor();
    AC38.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(38+","+monthStr);
})
AC39.addEventListener('click',()=>{
    resColor();
    AC39.style.fill='#5830E0';
    const monthStr=document.getElementById('category').value
    make_api_list(39+","+monthStr);
})

function FesSub() {
    const frm=document.getElementById('fesOrderFrm')
    frm.submit();
}
