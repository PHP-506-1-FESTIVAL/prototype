@extends('layout.adminlayout')

@section('title', '찜 유저')

@section('content')
<main id="main" class="main">
<div class="pagetitle">
    <h1>찜 유저</h1>
    <nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">메인</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">찜</a></li>
    </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title"><strong>찜 유저</strong></h5>

            {{-- 검색창 --}}
            <div id="header" class="header" style="box-shadow: 0px 0px 0px; width:360px;">
                <div class="search-bar">
                    <form class="search-form d-flex align-items-center" method="GET" action="{{ route('admJjim.search') }}">
                        <label for="inputDate" class="col-sm-2 col-form-label">날짜</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" name="date">
                        </div>
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>

            {{-- 유저목록 --}}
            <table class="table datatable table-hover">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">이름</th>
                <th scope="col">이메일</th>
                <th scope="col">닉네임</th>
                <th scope="col">축제</th>
                <th scope="col">축제 기간</th>
                <th scope="col">이메일</th>
                <th scope="col">상세메일</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jjim as $key=>$item)
                <tr>
                    <th scope="row">{{ $item->favorite_id }}</th>
                    <td>{{ $users[$key]->user_name }}</td>
                    <td>{{ $users[$key]->user_email }}</td>
                    <td>{{ $users[$key]->user_nickname }}</td>
                    <td>{{ $item->festival_title }}</td>
                    <td>
                        {{ $item->festival_start_date }}
                        ~
                        {{ $item->festival_end_date }}
                    </td>
                    <td>{{ $users[$key]->user_email_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>
                        <div>
                            <a href="javascript:popup({{$item->favorite_id}})">
                                <i class="bi bi-envelope-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            {!! $jjim->appends(request()->input())->links('vendor.pagination.custom2') !!}
        </div>
        </div>
    </div>
    </div>
</section>
</main>
<script>
    function popup(e){
        let url = "{!! route('admJjim.articled') !!}";
        url +='?id=' + e;
        const name = "popup test";
        const option = "width = 500, height = 500, top = 100, left = 200, location = no"
        window.open(url, name, option);
    }
</script>
@endsection
