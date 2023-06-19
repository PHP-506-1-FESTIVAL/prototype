const resource = 'http://localhost/api/mainapi/'
let month = document.getElementById('month');
function changText(item) {
    if (item===undefined) {
        month.innerHTML='전체';
    }
    else
        month.innerHTML=item;
}

// function make_list(date) {

//     date.forEach(item => {
//         console.log(item)
//         const a = document.createElement('img')
//         a.setAttribute('src', item.image)
//         a.setAttribute('loading', 'lazy')

//         document.body.appendChild(a);

//     });
// }
function make_api_list(area_code) {


    const url = resource+area_code;
        fetch(url)
            .then((res) => { return res.json() })
            .then((date) => target([date]))
            // .catch(console.log)
            .finally()
            const moreFes= document.getElementById('moreFes').childNodes[1]
            // moreFes.setAttribute("href","{{route('main.FesOrder', ['id' => "+area_code+"])}}")//안먹히네
            moreFes.setAttribute("href","http://localhost/fesorder/"+area_code)//Todo
}

function target(date) {

    let targetDiv = document.querySelectorAll('#Recommend');
    for (let index = 0; index < date[0].length; index++) {
        // console.log(date)
        targetDiv[index].childNodes[1].setAttribute('alt',date[0][index].festival_title);
        if (date[0][index].poster_img==="") {
            targetDiv[index].childNodes[1].setAttribute('src',"https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Red_x.svg/768px-Red_x.svg.png");
        }
        else{
            targetDiv[index].childNodes[1].setAttribute('src',date[0][index].poster_img);
        }
        }

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
let AC34 = document.getElementById('AC34').childNodes[0];
let AC35 = document.getElementById('AC35').childNodes[0];
let AC36 = document.getElementById('AC36').childNodes[0];
let AC37 = document.getElementById('AC37');
let AC38 = document.getElementById('AC38').childNodes[0];
let AC39 = document.getElementById('AC39');

function resColor() {
    AC1.style.fill='#A8A8A8';
    AC2.style.fill='#A8A8A8';
    AC3.style.fill='#A8A8A8';
    AC4.style.fill='#A8A8A8';
    AC5.style.fill='#A8A8A8';
    AC6.style.fill='#A8A8A8';
    AC7.style.fill='#A8A8A8';
    AC8.style.fill='#A8A8A8';
    AC31.style.fill='#A8A8A8';
    AC32.style.fill='#A8A8A8';
    AC33.style.fill='#A8A8A8';
    AC34.style.fill='#A8A8A8';
    AC35.style.fill='#A8A8A8';
    AC36.style.fill='#A8A8A8';
    AC37.style.fill='#A8A8A8';
    AC38.style.fill='#A8A8A8';
    AC39.style.fill='#A8A8A8';
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
    AC1.style.fill='red';
    make_api_list(1);
})
AC2.addEventListener('click',()=>{
    resColor();
    AC2.style.fill='red';
    make_api_list(2);
})
AC3.addEventListener('click',()=>{
    resColor();
    AC3.style.fill='red';
    make_api_list(3);
})
AC4.addEventListener('click',()=>{
    resColor();
    AC4.style.fill='red';
    make_api_list(4);
})
AC5.addEventListener('click',()=>{
    resColor();
    AC5.style.fill='red';
    make_api_list(5);
})
AC6.addEventListener('click',()=>{
    resColor();
    AC6.style.fill='red';
    make_api_list(6);
})
AC7.addEventListener('click',()=>{
    resColor();
    AC7.style.fill='red';
    make_api_list(7);
})
AC8.addEventListener('click',()=>{
    resColor();
    AC8.style.fill='red';
    make_api_list(8);
})
AC31.addEventListener('click',()=>{
    resColor();
    AC31.style.fill='red';
    make_api_list(31);
})
AC32.addEventListener('click',()=>{
    resColor();
    AC32.style.fill='red';
    make_api_list(32);
})
AC33.addEventListener('click',()=>{
    resColor();
    AC33.style.fill='red';
    make_api_list(33);
})
AC34.addEventListener('click',()=>{
    resColor();
    AC34.style.fill='red';
    make_api_list(34);
})
AC35.addEventListener('click',()=>{
    resColor();
    AC35.style.fill='red';
    make_api_list(35);
})
AC36.addEventListener('click',()=>{
    resColor();
    AC36.style.fill='red';
    make_api_list(36);
})
AC37.addEventListener('click',()=>{
    resColor();
    AC37.style.fill='red';
    make_api_list(37);
})
AC38.addEventListener('click',()=>{
    resColor();
    AC38.style.fill='red';
    make_api_list(38);
})
AC39.addEventListener('click',()=>{
    resColor();
    AC39.style.fill='red';
    make_api_list(39);
})

