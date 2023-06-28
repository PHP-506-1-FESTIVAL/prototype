@extends('layout.layout')

@section('title','작성 댓글 목록')

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">작성 댓글 목록</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">메인</a></li>
                        <li>작성 댓글 목록</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

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
                                <li><a class="active" href="{{route('user.comments')}}"><i class="lni lni-comments"></i> 작성 댓글 목록</a></li>
                                <li><a href="/user/pwchk/1"><i class="lni lni-trash"></i> 회원탈퇴</a></li>
                            </ul>
                            <div class="button">
                                <a class="btn" href="{{route('user.logout')}}">로그아웃</a>
                            </div>
                        </div>
                    </div>
                    <!-- Start Dashboard Sidebar -->
                </div>
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">작성 댓글 목록</h3>
                            <!-- Start Items Area -->
                            <div class="my-items">
                                <!-- Start List Title -->
                                <div class="item-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-3 col-12">
                                            <p>댓글 번호</p>
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-12">
                                            <p>댓글 내용</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>구분</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p>작성 날짜</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End List Title -->
                                @forelse($data as $key => $val)
                                <!-- Start Single List -->
                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-3 col-12">
                                            <p>{{$data[$key]->comment_id}}</p>
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-12">
                                            <p><a href="/board/{{$data[$key]->board_id}}" style="color:#888;">{{$data[$key]->comment_content}}</a></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>{{($data[$key]->comment_type === '0') ? '축제정보' : '축제톡톡' }}</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p>{{substr($data[$key]->created_at, 0, 10)}}</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single List -->
                                @empty
                                <!-- Start Single List -->
                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-3 col-12">
                                            <p></p>
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-12">
                                            <p>작성한 댓글이 없습니다.</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p></p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single List -->
                                @endforelse
                                {{-- 커스텀 페이지네이션 --}}
                                {!! $data->links('vendor.pagination.custom') !!}
                            </div>
                            <!-- End Items Area -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Dashboard Section -->

@endsection