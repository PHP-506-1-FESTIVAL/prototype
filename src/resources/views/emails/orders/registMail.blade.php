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
    <h1>{{$mailData['mail_title']}}</h1>
    <br>
    <a href="http://localhost/distributor/mail/{{$mailData['mail_token']}}"><button style="
        background-color: #5830E0;
        color: #fff;
        border: 0;
        border-radius: 4%;
        width: 20vw;
        height: 10vh;
        font-size: x-large;
        display: grid;
        margin: 0 auto;
        justify-content: center;
        align-items: center;
        ">인증 완료</button></a>
        <br>
        <hr>
        <p>{{$mailData['mail_content']}}</p>
        <hr>
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
