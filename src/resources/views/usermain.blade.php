@extends('layout.layout')

@section('title','마이페이지')

@section('content')

<main>
    <div class="container py-4" style="max-width:1000px;">
        <header class="pb-3 mb-4 border-bottom">
            <a href="{{route('user.main')}}" class="d-flex align-items-center text-dark text-decoration-none">
                <h1>마이페이지</h1>
            </a>
        </header>

        {{-- <div class="p-5 mb-4 bg-light rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Custom jumbotron</h1>
                <p class="col-md-8 fs-4">Using a series of utilities, you can create this jumbotron, just like the one in previous versions of Bootstrap. Check out the examples below for how you can remix and restyle it to your liking.</p>
                <button class="btn btn-primary btn-lg" type="button">Example button</button>
            </div>
        </div> --}}

        {{-- <div class="row align-items-md-stretch">
            <div class="col-md-5 mb-4">
                <div class="h-100 p-5 text-bg-dark rounded-3">
                <h2>Change the background</h2>
                <p>Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then, mix and match with additional component themes and more.</p>
                <button class="btn btn-outline-light" type="button">Example button</button>
                </div>
            </div>
            <div class="col-md-7">
                <div class="h-100 p-5 bg-light border rounded-3">
                <h2>Add borders</h2>
                <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both column's content for equal-height.</p>
                <button class="btn btn-outline-secondary" type="button">Example button</button>
                </div>
            </div>
        </div> --}}

        <div class="row align-items-md-stretch">
            <div class="col-md-5 mb-4 text-center">
                <div class="h-100 p-4 text-bg-dark rounded-3">
                    <div class="dropdown mb-4" style="display:grid;">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="justify-self:end;"></button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{route('user.edit')}}">회원정보 변경</a></li>
                            <li><a class="dropdown-item" href="{{route('user.logout')}}">로그아웃</a></li>
                        </ul>
                    </div>
                    <img src="/img/profile/{{session()->get('user_profile')}}" alt="프로필" class="mb-4" style="width:100px; height:100px; object-fit:contain; border-radius:50%;">
                    <p style="color:white;">반가워요!</p>
                    <p style="font-size: 25px">{{session()->get('user_nickname')}} 님</p>
                    <a href="" class="align-items-center text-bg-dark text-decoration-none"><p>프로필 이미지 변경 ></p></a>
                </div>
            </div>
            <div class="col-md-7">
                <h4 class="mb-3">나의 활동</h4>
                <div class="container-fluid h-100 p-5 bg-light border rounded-3">
                    <div class="row">
                        <div class="col-4 text-center" style="display:grid; justify-content:center;">
                            <div class="rounded-3 mb-2" style="width:80px; height:80px; background-color:gray;"></div>
                            <p>찜 목록</p>
                        </div>
                        <div class="col-4 text-center" style="display:grid; justify-content:center;">
                            <div class="rounded-3 mb-2" style="width:80px; height:80px; background-color:gray;"></div>
                            <p>작성 글</p>
                        </div>
                        <div class="col-4 text-center" style="display:grid; justify-content:center;">
                            <div class="rounded-3 mb-2" style="width:80px; height:80px; background-color:gray;"></div>
                            <p>작성 댓글</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@endsection