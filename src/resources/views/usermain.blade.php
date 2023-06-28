@extends('layout.layout')

@section('title','마이페이지')

@section('content')

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
                                <li><a class="active" href="{{route('user.main')}}"><i class="lni lni-user"></i>
                                        마이페이지</a></li>
                                <li><a href="/user/pwchk/0"><i class="lni lni-pencil-alt"></i> 회원정보 수정</a>
                                </li>
                                <li><a href="{{route('user.favorites')}}"><i class="lni lni-heart"></i> 찜 목록</a></li>
                                <li><a href="{{route('user.articles')}}"><i class="lni lni-pencil"></i> 작성 글 목록</a></li>
                                <li><a href="{{route('user.comments')}}"><i class="lni lni-comments"></i> 작성 댓글 목록</a></li>
                                <li><a href="/user/pwchk/1"><i class="lni lni-trash"></i> 회원탈퇴</a></li>
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
                        <!-- Start Details Lists -->
                        <div class="details-lists">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- Start Single List -->
                                    <div class="single-list">
                                        <div class="list-icon">
                                            <i class="lni lni-heart"></i>
                                        </div>
                                        <h3>
                                            {{$data[0]}}
                                            <span>찜</span>
                                        </h3>
                                    </div>
                                    <!-- End Single List -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- Start Single List -->
                                    <div class="single-list two">
                                        <div class="list-icon">
                                            <i class="lni lni-pencil"></i>
                                        </div>
                                        <h3>
                                            {{$data[1]}}
                                            <span>글</span>
                                        </h3>
                                    </div>
                                    <!-- End Single List -->
                                </div>
                                <div class="col-lg-4 col-md-4 col-12">
                                    <!-- Start Single List -->
                                    <div class="single-list three">
                                        <div class="list-icon">
                                            <i class="lni lni-comments"></i>
                                        </div>
                                        <h3>
                                            {{$data[2]}}
                                            <span>댓글</span>
                                        </h3>
                                    </div>
                                    <!-- End Single List -->
                                </div>
                            </div>
                        </div>
                        <!-- End Details Lists -->
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <!-- Start Activity Log -->
                                <div class="activity-log dashboard-block">
                                    <h3 class="block-title">최근 작성한 글</h3>
                                    <ul>
                                        @forelse($board as $key => $val)
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-pencil"></i>
                                            </div>
                                            <a href="/board/{{$board[$key]->board_id}}" class="title">{{$board[$key]->board_title}}</a>
                                            <span class="time">{{substr($board[$key]->created_at, 2, 14)}}</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        @empty
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-pencil"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">아직 작성한 글이 없습니다.</a>
                                        </li>
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- End Activity Log -->
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <!-- Start Recent Items -->
                                <div class="activity-log dashboard-block">
                                    <h3 class="block-title">최근 작성한 댓글</h3>
                                    <ul>
                                        @forelse($comment as $key => $val)
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-comments"></i>
                                            </div>
                                            <a href="/board/{{$comment[$key]->board_id}}" class="title">{{$comment[$key]->comment_content}}</a>
                                            <span class="time">{{substr($comment[$key]->created_at, 2, 14)}}</span>
                                            <span class="remove"><a href="javascript:void(0)"><i class="lni lni-close"></i></a></span>
                                        </li>
                                        @empty
                                        <li>
                                            <div class="log-icon">
                                                <i class="lni lni-comments"></i>
                                            </div>
                                            <a href="javascript:void(0)" class="title">아직 작성한 댓글이 없습니다.</a>
                                        </li>
                                        @endforelse
                                    </ul>
                                </div>
                                <!-- End Recent Items -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard Section -->

{{-- <main>
    <div class="container py-4" style="max-width:1000px;">
        <header class="pb-3 mb-4 border-bottom">
            <a href="{{route('user.main')}}" class="d-flex align-items-center text-dark text-decoration-none">
                <h1>마이페이지</h1>
            </a>
        </header>

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
                    <img src="/img/profile/{{session()->get('user_profile')}}" alt="프로필" class="mb-4" style="width:100px; height:100px; object-fit:cover; border-radius:50%;">
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
                            <a href="{{route('user.favorites')}}">
                                <div class="rounded-3 mb-2" style="width:80px; height:80px; background-color:gray;"></div>
                            </a>
                            <p>찜 목록</p>
                        </div>
                        <div class="col-4 text-center" style="display:grid; justify-content:center;">
                            <a href="{{route('user.articles')}}">
                                <div class="rounded-3 mb-2" style="width:80px; height:80px; background-color:gray;"></div>
                            </a>
                            <p>작성 글</p>
                        </div>
                        <div class="col-4 text-center" style="display:grid; justify-content:center;">
                            <a href="{{route('user.comments')}}">
                                <div class="rounded-3 mb-2" style="width:80px; height:80px; background-color:gray;"></div>
                            </a>
                            <p>작성 댓글</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main> --}}


@endsection