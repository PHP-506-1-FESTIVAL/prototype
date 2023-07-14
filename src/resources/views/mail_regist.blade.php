<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('mail.send')}}" method="post">
        @csrf
        <label for="user">이메일</label>
        <input type="text" name="user">
        <button type="submit">확인</button>
    </form>
</body>
</html>
