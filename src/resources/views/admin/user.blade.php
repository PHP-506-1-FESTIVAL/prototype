@extends('layout.adminlayout')

@section('title', '유저관리')

@section('content')
<main id="main" class="main">
  <div class="pagetitle">
    <h1>유저관리</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.main') }}">메인</a></li>
        <li class="breadcrumb-item"><a href="{{ route('admin.user') }}">유저</a></li>
      </ol>
    </nav>
  </div>

  <section class="section">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title"><strong>유저 관리</strong></h5>
            
            {{-- 검색창 --}}
            <div id="header" class="header" style="box-shadow: 0px 0px 0px; width:360px;">
              <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="POST" action="{{ route('admin.search') }}">
                  @csrf
                  <input type="text" name="query" placeholder="이름,이메일,닉네임 검색" title="Enter search keyword">
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
                  <th scope="col">성별</th>
                  <th scope="col">생일</th>
                  <th scope="col">닉네임</th>
                  {{-- <th scope="col">프로필</th> --}}
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
                    {{-- <td><img src="/img/profile/{{ $user->user_profile }}" alt="" class="img-thumbnail img-fluid" style="width:30px;height:30px;border-radius:50%;border:none;object-fit:cover;"></td> --}}
                    <td>{{ $user->user_address }}</td>
                    <td>{{ $user->user_address_detail }}</td>
                    <td>{{ $user->user_zipcode }}</td>
                    <td>{{ $user->user_marketing_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>{{ $user->user_email_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>{{ $user->created_at->format('y-m-d') }}</td>
                    <td>
                      <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal{{ $user->user_id }}">정지</button>
                      {{-- <div class="modal fade" id="basicModal{{ $user->user_id }}" tabindex="-1">
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
                              <form action="{{ route('admin.userpost', ['id' => $user->user_id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{  $user->user_id }}">
                                <button type="submit" class="btn btn-danger">네</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div> --}}
                      <div class="modal fade" id="basicModal{{ $user->user_id }}" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalToggleLabel">유저 블랙리스트 처리</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              user ID : {{ $user->user_id }} 의 블랙리스트 처리를 시작합니다.
                              <form action="{{ route('admin.userpost', ['id' => $user->user_id]) }}" method="POST">
                                  @csrf
                                  <div class="row">
                                      <div class="col-12">
                                          <div class="search-input">
                                              <label for="category"><i class="lni lni-grid-alt theme-color"></i></label>
                                              <select name="category" id="category" required>
                                                  <option value="" selected disabled>신고 사유 선택</option>
                                                  <option value="0">신고 누적</option>
                                                  <option value="1">이상 패턴으로 감지</option>
                                                  <option value="2">블랙리스트로 등록된 고객과 동일 IP인 경우</option>
                                                  <option value="3">지속적 악성 댓글 및 게시글 작성</option>
                                                  <option value="4">기타</option>
                                              </select>
                                          </div>
                                      </div>
                                      <div class="col-12">
                                          <div class="search-input">
                                              <label for="detail"><i class="lni lni-pencil-alt theme-color"></i></label>
                                              <input type="text" name="detail" id="detail" placeholder="상세 내용 입력" size=37 maxlength =500>
                                              {{-- <input type="hidden" name="type" value="{{$type}}"> --}}
                                              {{-- <input type="hidden" name="no" value="{{$no}}"> --}}
                                          </div>
                                      </div>
                                      {{-- <div class="col-12">
                                          <div class="search-btn button">
                                              <button class="btn" type="submit"><i class="lni lni-telegram-original"></i> 보내기</button>
                                              <button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">네</button>
                                          </div>
                                      </div> --}}
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">아니요</button>
                                        <form action="{{ route('admin.userpost', ['id' => $user->user_id]) }}" method="POST">
                                          @csrf
                                          <input type="hidden" name="user_id" value="{{  $user->user_id }}">
                                          <button type="submit" class="btn btn-danger" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">네</button>
                                        </form>
                                      </div>
                                      <input type="hidden" name="user_id" value="{{  $user->user_id }}">
                                  </div>
                              </form>
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
