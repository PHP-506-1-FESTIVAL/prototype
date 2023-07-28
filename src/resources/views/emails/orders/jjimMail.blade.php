<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <a class="navbar-brand" href="{{route('main')}}">
        <img src="https://i.ibb.co/PrJKj3m/logo.png" alt="Logo">
    </a>
    <hr>
    <h1>{{$data->festival_title}}</h1>
    <br>
    <div>
        <p>
            <strong>{{$data->user_nickname}}</strong>님 찜한 축제가 얼마남지 않았습니다.
            <br>
            <strong>{{$data->festival_title}}</strong>축제가 <strong>{{$data->festival_start_date}}</strong>에 시작합니다
        </p>
    </div>
    <div style="
        display: flex;">
        <img src="{{$data->poster_img}}" alt="{{route('fes.detail',['id'=>$data->festival_id])}}" style="margin: 1% auto;">
        <br>
    </div>
    <div style="
    display: grid;
    justify-content: center;
    align-items: center;
    ">
        <br>
        <a href="{{route('fes.detail',['id'=>$data->festival_id])}}">
        <button style="
            background-color: #5830E0;
            color: #fff;
            border: 0;
            border-radius: 4%;
            width: 20vw;
            height: 10vh;
            font-size: x-large;
            margin: 0 auto;
            "
            >바로 가기</button>
            </a>
    </div>
    <br>
    <div style="
    background-color: #081828;
    width: 100%;
    color: #fff;
    display: grid;
    grid-template-columns: 1fr 3fr 1fr;
    ">
        <div style="grid-column: 2/3;">
            <div><h3>Team</h3><h4>여기 어때요, 좋죠?</h4></div>
            <p>
                이가원 | 박진영 | 김재성 | 신유진
            </p>
        </div>
    </div>
</body>
</html>
