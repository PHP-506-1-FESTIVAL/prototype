let month = document.getElementById('month')
function changText(item) {
    if (item===undefined) {
        month.innerHTML='전체'
    }
    else
        month.innerHTML=item
}
let Recommend = document.getElementById('Recommend')
function make_list(date) {

    date.forEach(item => {
        console.log(item)
        const a = document.createElement('img')
        a.setAttribute('src', item.image)
        a.setAttribute('loading', 'lazy')

        document.body.appendChild(a);

    });
}
function make_api_list(area_code) {


    const url = "http://localhost/api/mainapi/"+area_code
        fetch(url)
            .then((res) => { return res.json() })
            .then((date) => make_list([date]))
            .catch(console.log)
            .finally(scrollFlg=true)
}
