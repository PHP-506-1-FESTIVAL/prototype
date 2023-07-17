@extends('layout.layout')

@section('title','로그인')

@section('content')



    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">회원가입</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">메인</a></li>
                        <li>회원가입</li>
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
                        <h4 class="title">계정 만들기</h4>
                        <form action="{{route('mail.send')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label>이메일</label>
                                <input name="email" type="email" id="email">
                            </div>
                            @include('layout.errormsg')
                            <div class="button">
                                <button type="submit" class="btn">메일 발송</button>
                            </div>
                            <p class="outer-link">계정이 이미 존재한가요? <a href="{{route('user.login')}}">로그인</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login section -->

@endsection

