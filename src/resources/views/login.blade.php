@extends('layout.layout')

@section('title','로그인')

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">로그인</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">메인</a></li>
                        <li>로그인</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- start login section -->
    <section class="login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">로그인</h4>
                        <form action="{{route('user.loginpost')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>이메일</label>
                                <input name="email" type="email" id="email">
                            </div>
                            <div class="form-group">
                                <label>비밀번호</label>
                                <input name="password" type="password" id="password" >
                            </div>
                            <div class="check-and-pass">
                                <div class="row align-items-center">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input width-auto"
                                                id="exampleCheck1">
                                            <label class="form-check-label">아이디 기억하기</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <a href="javascript:void(0)" class="lost-pass">비밀번호 찾기</a>
                                    </div>
                                </div>
                            </div>
                            @include('layout.errormsg') 
                            <div class="button">
                                <button type="submit" class="btn">로그인</button>
                            </div>
                            <p class="outer-link">계정이 없으신가요? <a href="{{route('user.terms')}}">회원가입</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login section -->

{{-- <div class="container mt-5" style="max-width:400px;">
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
            <button type="button" class="btn btn-light me-1" onclick="location.href='{{route('user.terms')}}'">회원가입</button>
            <button type="submit" class="btn btn-primary ms-1">로그인</button>
        </div>
        <div class="container text-center mt-4" style="font-size:0.8rem">
        비밀번호를 잊으셨나요? <a href="">비밀번호 찾기</a>
        </div>
    </form>
</div> --}}
    
@endsection