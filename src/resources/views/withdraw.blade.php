@extends('layout.layout')

@section('title','회원탈퇴')

@section('content')

    @if(!(session()->has('pwchk_flg')))
        <script>window.location.href = "{{route('pwchk')}}";</script>
    @endif

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">마이페이지</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">메인</a></li>
                        <li>마이페이지</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Dashboard Section -->
    <section class="dashboard section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Start Dashboard Sidebar -->
                    <div class="dashboard-sidebar">
                        <div class="user-image">
                            <img src="/img/profile/{{session()->get('user_profile')}}" alt="#" style="object-fit:cover;">
                            <h3>{{session()->get('user_nickname')}}
                                <span><a href="javascript:void(0)">{{session()->get('user_email')}}</a></span>
                            </h3>
                        </div>
                        <div class="dashboard-menu">
                            <ul>
                                <li><a href="{{route('user.main')}}"><i class="lni lni-user"></i>
                                        마이페이지</a></li>
                                <li><a href="/user/pwchk/0"><i class="lni lni-pencil-alt"></i> 회원정보 수정</a>
                                </li>
                                <li><a href="{{route('user.favorites')}}"><i class="lni lni-heart"></i> 찜 목록</a></li>
                                <li><a href="{{route('user.articles')}}"><i class="lni lni-pencil"></i> 작성 글 목록</a></li>
                                <li><a href="{{route('user.comments')}}"><i class="lni lni-comments"></i> 작성 댓글 목록</a></li>
                                <li><a class="active" href="/user/pwchk/1"><i class="lni lni-trash"></i> 회원탈퇴</a></li>
                            </ul>
                            <div class="button">
                                <a class="btn" href="{{route('user.logout')}}">로그아웃</a>
                            </div>
                        </div>
                    </div>
                    <!-- Start Dashboard Sidebar -->
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="main-content">
                        <div class="dashboard-block close-content mt-0">
                            <h2>회원탈퇴</h2>
                            <div class="container" style="display:grid; justify-content:center; max-width:800px;">
                                <form action="{{route('user.withdrawpost')}}" method="post" class="needs-validation" enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-12 text-start mt-4">
                                        <h5>주의하세요!</h5>
                                        <p>탈퇴 시 삭제되는 정보를 확인하세요.<br>한번 삭제된 정보는 복구가 불가능합니다.</p>
                                    </div>
                                    <div class="mt-3 mb-5 text-start">
                                        <h4>계정 및 프로필 정보 삭제</h4>
                                        <h4>관심 축제 찜 내역 삭제</h4>
                                        <h4>작성 게시글, 댓글 삭제</h4>
                                    </div>

                                    <div class="col-12 text-start">
                                        <h5>탈퇴하시는 이유를 알려주세요.</h5>
                                        <p>향후 사이트 개선에 도움이 됩니다.</p>
                                    </div>

                                    <div class="my-3 text-start">
                                        <div class="form-check">
                                            <input id="wr1" name="wr" type="radio" class="form-check-input" value="1" checked required>
                                            <label class="form-check-label" for="wr1">기록 삭제 목적</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="wr2" name="wr" type="radio" class="form-check-input" value="2" required>
                                            <label class="form-check-label" for="wr2">이용이 불편하고 장애가 많아서</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="wr3" name="wr" type="radio" class="form-check-input" value="3" required>
                                            <label class="form-check-label" for="wr3">다른 사이트가 더 좋아서</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="wr4" name="wr" type="radio" class="form-check-input" value="4" required>
                                            <label class="form-check-label" for="wr4">사용빈도가 낮아서</label>
                                        </div>
                                        <div class="form-check">
                                            <input id="wr5" name="wr" type="radio" class="form-check-input" value="5" required>
                                            <label class="form-check-label" for="wr5">콘텐츠 불만</label>
                                        </div>
                                    </div>

                                    <div class="button">
                                        <button type="submit" class="btn">탈퇴하기</button>
                                        <button type="button" onclick="location.href='{{route('user.main')}}'" class="btn btn-alt">취소</button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard Section -->

{{-- <div class="container">
    <main>
        <div class="py-5 text-center">
            <h1 class="mb-3">회원탈퇴</h1>
        </div>
        
        <div class="container" style="max-width:500px;">
            <form action="{{route('user.withdrawpost')}}" method="post" class="needs-validation" enctype="multipart/form-data">
                @csrf

                <div class="col-12">
                    <h3>주의하세요!</h3>
                    <p>탈퇴 시 삭제되는 정보를 확인하세요.<br>한번 삭제된 정보는 복구가 불가능합니다.</p>
                </div>
                <div class="mb-5" style="font-weight:900">
                    <p>계정 및 프로필 정보 삭제<br>관심 축제 찜 내역 삭제<br>작성 게시글, 댓글 삭제</p>
                </div>

                <div class="col-12">
                    <h5>탈퇴하시는 이유를 알려주세요.</h5>
                    <p>향후 사이트 개선에 도움이 됩니다.</p>
                </div>

                <div class="my-3">
                    <div class="form-check">
                        <input id="wr1" name="wr" type="radio" class="form-check-input" value="1" checked required>
                        <label class="form-check-label" for="wr1">기록 삭제 목적</label>
                    </div>
                    <div class="form-check">
                        <input id="wr2" name="wr" type="radio" class="form-check-input" value="2" required>
                        <label class="form-check-label" for="wr2">이용이 불편하고 장애가 많아서</label>
                    </div>
                    <div class="form-check">
                        <input id="wr3" name="wr" type="radio" class="form-check-input" value="3" required>
                        <label class="form-check-label" for="wr3">다른 사이트가 더 좋아서</label>
                    </div>
                    <div class="form-check">
                        <input id="wr4" name="wr" type="radio" class="form-check-input" value="4" required>
                        <label class="form-check-label" for="wr4">사용빈도가 낮아서</label>
                    </div>
                    <div class="form-check">
                        <input id="wr5" name="wr" type="radio" class="form-check-input" value="5" required>
                        <label class="form-check-label" for="wr5">콘텐츠 불만</label>
                    </div>
                </div>

                <hr class="my-5">

                <div class="col-12" style="display:grid; grid-template-columns:1fr 1fr; justify-content:center;">
                    <button class="btn btn-light btn-lg me-2" type="button"onclick="location.href='{{route('user.main')}}'">취소</button>
                    <button class="btn btn-danger btn-lg ms-2" type="submit">탈퇴하기</button>
                </div>

            </form>
        </div>
    </main>

</div> --}}

@endsection