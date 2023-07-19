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
                            @if (session('kakao_flg')==='1')
                                <img src="{{session()->get('user_profile')}}" alt="#" style="object-fit:cover;">
                            @else
                                <img src="/img/profile/{{session()->get('user_profile')}}" alt="#" style="object-fit:cover;">
                            @endif
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
                                <li><a href="my-items.html"><i class="lni lni-bolt-alt"></i> 광고 목록</a></li>
                                <li><a class="active" href="{{route('main.request')}}"><i class="lni lni-circle-plus"></i> 광고 요청</a></li>
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

@endsection
