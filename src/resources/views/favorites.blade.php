@extends('layout.layout')

@section('title','찜 목록')

@section('content')

    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">찜 목록</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">메인</a></li>
                        <li>찜 목록</li>
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
                                <li><a class="active" href="{{route('user.favorites')}}"><i class="lni lni-heart"></i> 찜 목록</a></li>
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
                <div class="col-lg-9 col-md-12 col-12">
                    <div class="main-content">
                        <div class="dashboard-block mt-0">
                            <h3 class="block-title">찜 목록</h3>
                            <!-- Start Items Area -->
                            <div class="my-items">
                                <!-- Start List Title -->
                                <div class="item-list-title">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-3 col-12">
                                            <p>찜 번호</p>
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-12">
                                            <p>축제 이름</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>축제 시작</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p>축제 종료</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- End List Title -->
                                @forelse($data as $key => $val)
                                <!-- Start Single List -->
                                <div class="single-item-list">
                                    <div class="row align-items-center">
                                        <div class="col-lg-2 col-md-3 col-12">
                                            <p>{{$data[$key]->favorite_id}}</p>
                                        </div>
                                        <div class="col-lg-6 col-md-5 col-12">
                                            <div class="item-image">
                                                <img src="{{$data[$key]->poster_img}}" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="/fesdetail/{{$data[$key]->festival_id}}">{{$data[$key]->festival_title}}</a></h3>
                                                    <span class="price">{{$data[$key]->area_code}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12">
                                            <p>{{$data[$key]->festival_start_date}}</p>
                                        </div>
                                        <div class="col-lg-2 col-md-2 col-12 align-right">
                                            <p>{{$data[$key]->festival_end_date}}</p>
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
                                            <div class="item-image">
                                                <img src="https://via.placeholder.com/100x100" alt="#">
                                                <div class="content">
                                                    <h3 class="title"><a href="javascript:void(0)">찜한 축제가 없습니다.</a></h3>
                                                    <span class="price"></span>
                                                </div>
                                            </div>
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

{{-- <header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    </div>
</header>

    <div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
            <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('user.favorites')}}">
                <span data-feather="home" class="align-text-bottom"></span>
                찜 목록
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.articles')}}">
                <span data-feather="file" class="align-text-bottom"></span>
                작성 글 목록
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.comments')}}">
                <span data-feather="shopping-cart" class="align-text-bottom"></span>
                작성 댓글 목록
                </a>
            </li>
            </ul> --}}

            {{-- <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>Saved reports</span>
            <a class="link-secondary" href="#" aria-label="Add a new report">
                <span data-feather="plus-circle" class="align-text-bottom"></span>
            </a>
            </h6>
            <ul class="nav flex-column mb-2">
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Current month
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Last quarter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Social engagement
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                <span data-feather="file-text" class="align-text-bottom"></span>
                Year-end sale
                </a>
            </li>
            </ul> --}}
        {{-- </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">찜 목록</h1>
            {{-- <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar" class="align-text-bottom"></span>
                This week
            </button>
            </div> --}}
        {{-- </div>


        <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                <th scope="col">찜 번호</th>
                <th scope="col">축제 이름</th>
                <th scope="col">축제 시작</th>
                <th scope="col">축제 종료</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $key => $val)
                    <tr>
                    <td>{{$data[$key]->favorite_id}}</td>
                    <td><a href="/fesdetail/{{$data[$key]->festival_id}}">{{$data[$key]->festival_title}}</a></td>
                    <td>{{$data[$key]->festival_start_date}}</td>
                    <td>{{$data[$key]->festival_end_date}}</td>
                @empty
                    <tr>
                    <td></td>
                    <td>찜한 축제가 없습니다.</td>
                    <td></td>
                    <td></td>
                @endforelse
            </tbody>
            </table> --}}

        {{-- 커스텀 페이지네이션 --}}
        {{-- {!! $data->links('vendor.pagination.custom') !!}

        </div>
        </main>
    </div>
</div> --}}

@endsection