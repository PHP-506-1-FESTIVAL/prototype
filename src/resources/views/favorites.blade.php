@extends('layout.layout')

@section('title','찜 목록')

@section('content')

<header class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow">
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
            </ul>

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
        </div>
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
        </div>


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
            </table>

        {{-- 커스텀 페이지네이션 --}}
        {!! $data->links('vendor.pagination.custom') !!}

        </div>
        </main>
    </div>
</div>

@endsection