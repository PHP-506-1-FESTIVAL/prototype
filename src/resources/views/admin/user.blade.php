@extends('layout.adminlayout')

@section('title','유저관리')

@section('content')

<main id="main" class="main">
  <div class="pagetitle">
    <h1>유저관리</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Data</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Datatables</h5>
            <p>Add lightweight datatables to your project with using the <a href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to conver to a datatable</p>

            <!-- Table with stripped rows -->
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
                  <th scope="col">마켓팅 동의</th>
                  <th scope="col">이메일 동의</th>
                  <th scope="col">생성일</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($users->take(10) as $user)
                  @foreach ($users as $user) 
                  <tr>
                      <th scope="row">{{ $user->user_id }}</th>
                      <td>{{ $user->user_name }}</td>
                      <td>{{ $user->user_email }}</td>
                      <td>@if ($user->user_gender == 1)남자 @elseif ($user->user_gender == 0)여자 @endif</td>
                      <td>{{ $user->user_birthdate }}</td>
                      <td>{{ $user->user_nickname }}</td>
                      <td><img src="{{ $user->user_profile }}" alt="Profile Image" style="width:30px; height:30px;"></td>
                      <td>{{ $user->user_address }}</td>
                      <td>{{ $user->user_address_detail }}</td>
                      <td>{{ $user->user_zipcode }}</td>
                      <td>{{ $user->user_marketing_agreement == 1 ? '동의' : '비동의' }}</td>
                      <td>{{ $user->user_marketing_agreement == 1 ? '동의' : '비동의' }}</td>
                      <td>{{ $user->created_at->format('d-m-y') }}</td>
                  </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

{{-- <main id="main" class="main">
  <div class="pagetitle">
    <h1>유저관리</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">유저 목록</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead style="font-size:0.8rem;">
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
                  <th scope="col">마케팅 동의</th>
                  <th scope="col">이메일 동의</th>
                  <th scope="col">생성일</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data as $data)
                  <tr class="user-row">
                    <th scope="row">{{ $user->user_id }}</th>
                    <td>{{ $data->user_name }}</td>
                    <td>{{ $data->user_email }}</td>
                    <td>@if ($user->user_gender == 1)남자 @elseif ($user->user_gender == 0)여자 @endif</td>
                    <td>{{ $data->user_gender == 1 ? '남자' : '여자' }}</td>
                    <td>{{ $data->user_birthdate }}</td>
                    <td>{{ $data->user_nickname }}</td>
                    <td>
                      @if (!empty($data->user_profile))
                        <a href="{{ $data->user_profile }}" target="_blank">
                          <img src="{{ $data->user_profile }}" alt="Profile Image" style="width:30px; height:30px;">
                        </a>
                      @endif
                    </td>
                    <td>{{ $data->user_address }}</td>
                    <td>{{ $data->user_address_detail }}</td>
                    <td>{{ $data->user_zipcode }}</td>
                    <td>{{ $data->user_marketing_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>{{ $data->user_email_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>{{ $data->created_at->format('d-m-y') }}</td>
                    <td><button type="button" class="btn btn-danger btn-sm">삭제</button></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {!! $data->links('vendor.pagination.custom2') !!}
          </div>
        </div>
      </div>
    </div>
  </section>
</main> --}}

{{-- <main id="main" class="main">
  <div class="pagetitle">
    <h1>유저관리</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
        <li class="breadcrumb-item active">Users</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">유저 목록</h5>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead style="font-size:0.8rem;">
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
                  <th scope="col">마케팅 동의</th>
                  <th scope="col">이메일 동의</th>
                  <th scope="col">생성일</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr class="user-row">
                    <th scope="row">{{ $user->user_id }}</th>
                    <td>{{ $user->user_name }}</td>
                    <td>{{ $user->user_email }}</td>
                    <td>@if ($user->user_gender == 1)남자 @elseif ($user->user_gender == 0)여자 @endif</td>
                    <td>{{ $user->user_birthdate }}</td>
                    <td>{{ $user->user_nickname }}</td>
                    <td>
                      @if (!empty($user->user_profile))
                        <a href="{{ $user->user_profile }}" target="_blank">
                          <img src="{{ $user->user_profile }}" alt="Profile Image" style="width:30px; height:30px;">
                        </a>
                      @endif
                    </td>
                    <td>{{ $user->user_address }}</td>
                    <td>{{ $user->user_address_detail }}</td>
                    <td>{{ $user->user_zipcode }}</td>
                    <td>{{ $user->user_marketing_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>{{ $user->user_email_agreement == 1 ? '동의' : '비동의' }}</td>
                    <td>{{ $user->created_at->format('d-m-y') }}</td>
                    <td><button type="button" class="btn btn-danger btn-sm">삭제</button></td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            <!-- Pagination with icons -->
            <nav aria-label="Page navigation example">
              <ul class="pagination">
                <!-- Previous Page Link -->
                @if ($users->onFirstPage())
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                @else
                  <li class="page-item">
                    <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                @endif

                <!-- Pagination Elements -->
                @foreach ($users->getUrlRange(1, $users->lastPage()) as $page => $url)
                  @if ($page == $users->currentPage())
                    <li class="page-item active"><a class="page-link" href="#">{{ $page }}</a></li>
                  @else
                    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                  @endif
                @endforeach

                <!-- Next Page Link -->
                @if ($users->hasMorePages())
                  <li class="page-item">
                    <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                @else
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                @endif
              </ul>
            </nav><!-- End Pagination with icons -->

          </div>
        </div>
      </div>
    </div>
  </section>
</main> --}}

@endsection