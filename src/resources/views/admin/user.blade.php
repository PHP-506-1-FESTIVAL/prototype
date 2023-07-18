@extends('layout.adminlayout')

@section('title', '유저관리')

@section('content')
<style>
.search-bar{
  border: 0;
    font-size: 14px;
    color: #012970;
    border: 1px solid rgba(1, 41, 112, 0.2);
    padding: 7px 38px 7px 8px;
    border-radius: 3px;
    transition: 0.3s;
    width: 100%;
}
</style>
<main id="main" class="main">
  <div class="pagetitle">
    <h1>유저관리</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">메인</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">유저</a></li>
        <li class="breadcrumb-item active">유저관리</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">유저 관리</h5>
            
            {{-- 검색창 --}}
            {{-- <header id="header" class="header"> --}}
            <div class="search-bar" >
              <form class="search-form d-flex align-items-center" method="POST" action="{{ route('admin.search') }}">
                @csrf
                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
              </form>
            </div>

            {{-- 유저목록 --}}
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">이름</th>
                  <th scope="col">이메일</th>
                  <th scope="col">성별</th>
                  <th scope="col">생일</th>
                  <th scope="col">닉네임</th>
                  <th scope="col">프로필</th>
                  <th scope="col">주소</th>
                  <th scope="col">상세주소</th>
                  <th scope="col">우편주소</th>
                  <th scope="col">마케팅</th>
                  <th scope="col">이메일</th>
                  <th scope="col">생성일</th>
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
                    <td><img src="/img/profile/{{ $user->user_profile }}" alt="" class="img-thumbnail img-fluid" style="width:30px;height:30px;border-radius:50%;border:none;object-fit:cover;"></td>
                    <td>{{ $user->user_address }}</td>
                    <td>{{ $user->user_address_detail }}</td>
                    <td>{{ $user->user_zipcode }}</td>
                    <td>{{ $user->user_marketing_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>{{ $user->user_email_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>{{ $user->created_at->format('y-m-d') }}</td>
                    <td>
                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal{{ $user->user_id }}">처리</button>
                      <div class="modal fade" id="basicModal{{ $user->user_id }}" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">블랙리스트</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              해당 유저를 블랙리스트 처리하시겠습니까?
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">아니요</button>
                              <button type="button" class="btn btn-danger">네</button>
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
