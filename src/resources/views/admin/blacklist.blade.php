@extends('layout.adminlayout')

@section('title', '블랙리스트')

@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>블랙리스트 관리</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">메인</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.blacklist') }}">블랙리스트</a></li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><strong>블랙리스트 관리</strong></h5>
                        
                        {{-- 검색창 --}}
                        {{-- <header id="header" class="header">
                        <div class="search-bar" >
                            <form class="search-form d-flex align-items-center" method="POST" action="{{ route('admin.search') }}">
                                @csrf
                                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>
                        </div> --}}
                        <br><br>

                        {{-- 블랙리스트 목록 --}}
                        <table class="table datatable table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">이름</th>
                                    <th scope="col">이메일</th>
                                    <th scope="col">성별</th>
                                    <th scope="col">생일</th>
                                    <th scope="col">닉네임</th>
                                    <th scope="col">블랙사유</th>   {{-- ----- 230720 add 컬럼추가 신유진 ----- --}}
                                    {{-- <th scope="col">프로필</th> --}}
                                    {{-- <th scope="col">주소</th> --}}   {{-- ----- 230720 del 블랙사유추가로 삭제 신유진 ----- --}}
                                    {{-- <th scope="col">상세주소</th>
                                    <th scope="col">우편주소</th> --}}
                                    <th scope="col">마케팅</th>
                                    <th scope="col">이메일</th>
                                    <th scope="col">삭제일</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->user_id }}</th>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->user_email }}</td>
                                    <td>{{ $user->user_gender == 0 ? '남자' : '여자' }}</td>
                                    <td>{{ $user->user_birthdate }}</td>
                                    <td>{{ $user->user_nickname }}</td>
                                    <td>
                                        {{-- {{ $user->blacklist_no }} --}} {{-- ----- 230720 del 블랙리스트 사유 추가 신유진 ----- --}}
                                        @switch($user->blacklist_no)    {{-- ----- 230720 add 블랙리스트 사유 추가 신유진 ----- --}}
                                            @case('0')
                                            신고 누적
                                            @break
                                            @case('1')
                                            이상 패턴으로 감지
                                            @break
                                            @case('2')
                                            블랙리스트로 등록된 고객과 동일 IP인 경우
                                            @break
                                            @case('3')
                                            지속적 악성 댓글 및 게시글 작성
                                            @break
                                            @case('4')
                                            기타
                                            @break
                                            $@default
                                            (정보없음)
                                        @endswitch
                                    </td>
                                    {{-- <td><img src="/img/profile/{{ $user->user_profile }}" alt="" class="img-thumbnail img-fluid" style="width:30px;height:30px;border-radius:50%;border:none;object-fit:cover;"></td> --}}
                                    {{-- <td>{{ $user->user_address }}</td> --}}
                                    {{-- <td>{{ $user->user_address_detail }}</td> --}}
                                    {{-- <td>{{ $user->user_zipcode }}</td> --}}
                                    <td>{{ $user->user_marketing_agreement == 1 ? '동의' : '비동의' }}</td>
                                    <td>{{ $user->user_email_agreement == 1 ? '동의' : '비동의' }}</td>
                                    <td>{{ $user->banned_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $users->links('vendor.pagination.custom2') !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection