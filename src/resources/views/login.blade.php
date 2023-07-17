@extends('layout.layout')

@section('title','로그인')

@section('content')

    @if (session('signup_flg') === '1')
        <script>alert('회원가입이 완료되었습니다.');</script>
        <script>alert('다시 한번 로그인 해 주세요.');</script>
        {{session()->forget('signup_flg');}}
    @endif

    @if (session('withdraw_flg') === '1')
        <script>alert('회원 탈퇴가 완료되었습니다.');</script>
        {{session()->forget('withdraw_flg');}}
    @endif

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
                                        <a href="{{route('find.mail')}}" class="lost-pass">비밀번호 찾기</a>
                                    </div>
                                </div>
                            </div>
                            @include('layout.errormsg')
                            <div class="button">
                                <button type="submit" class="btn">로그인</button>
                            </div>
                            <p class="outer-link">계정이 없으신가요? <a href="{{route('regist.mail')}}">회원가입</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login section -->

@endsection
