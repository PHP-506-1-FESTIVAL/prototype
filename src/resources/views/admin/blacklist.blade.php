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
                                    <th scope="col">정지 사유 (상세 내용)</th>   {{-- ----- 230720 add 컬럼추가 신유진 ----- --}}
                                    <th scope="col">마케팅</th>
                                    <th scope="col">이메일</th>
                                    <th scope="col">정지일</th>
                                    <th scope="col">작업</th>
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
                                        <br>
                                        ({{ $user->blacklist_detail }})
                                    </td>
                                    <td>{{ $user->user_marketing_agreement == 1 ? '동의' : '비동의' }}</td>
                                    <td>{{ $user->user_email_agreement == 1 ? '동의' : '비동의' }}</td>
                                    <td>{{ $user->banned_at}}</td>
                                    <td>
                                    <!-- Button to trigger the modal -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rollbackModal{{ $user->user_id }}">
                                        복구
                                    </button>
                                    
                                    <!-- Modal window for confirmation -->
                                    <div class="modal fade" id="rollbackModal{{ $user->user_id }}" tabindex="-1" aria-labelledby="rollbackModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="rollbackModalLabel">블랙리스트 복구</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>이 사용자를 블랙리스트에서 복구하시겠습니까?</p>
                                                </div>
                                                <div class="modal-footer">
                                                <form action="{{ route('admin.unblacklist', ['user_id' => $user->user_id]) }}" method="post">
                                                    @csrf
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                                                    <button type="submit" class="btn btn-danger">복구</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
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