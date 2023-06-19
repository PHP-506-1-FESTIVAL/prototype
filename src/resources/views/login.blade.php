@extends('layout.layout')

@section('title','로그인')

@section('content')

<div class="container mt-5" style="max-width:400px;">
    <h1 class="mb-4" style="text-align:center">로그인</h1>
    <form action="{{route('user.loginpost')}}" method="post">
        @csrf
        <div class="form-floating mb-3">
            <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
            <label for="email">이메일</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            <label for="password">비밀번호</label>
        </div>
        
        <div class="mt-3 mb-4 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">로그인 상태 유지</label>
        </div>
        @include('layout.errormsg') 
        <div class="col-12" style="display:grid; grid-template-columns:1fr 1fr; justify-content:center;">
            <button type="button" class="btn btn-light me-1" onclick="location.href='{{route('user.signup')}}'">회원가입</button>
            <button type="submit" class="btn btn-primary ms-1">로그인</button>
        </div>
        <div class="container text-center mt-4" style="font-size:0.8rem">
        비밀번호를 잊으셨나요? <a href="">비밀번호 찾기</a>
        </div>
    </form>
</div>
    
@endsection