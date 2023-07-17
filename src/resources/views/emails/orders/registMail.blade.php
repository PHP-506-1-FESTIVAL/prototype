<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>제목</h1>
    <p>{{$mailData['mail_token']}}</p>
    <a href="http://localhost/regist/mail/{{$mailData['mail_token']}}">링크이동</a>
</body>
</html>
