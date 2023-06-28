@extends('layout.layout')

@section('title','공지사항')

@section('content')
{{-- 메인>공지사항 --}}
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="breadcrumbs-content">
					<h1 class="page-title"><a href="{{route('board.index')}}">공지사항</a></h1>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<ul class="breadcrumb-nav">
					<li><a href="{{route('main')}}">메인</a></li>
					<li><a href="{{route('notice.index')}}">공지사항</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Dashboard Section -->
<section class="dashboard section-board">
	<div class="container">
		<div class="row">
			<div class="board-list-ct col-lg-12 col-md-12 col-12">
				<div class="main-content">
					<div class="dashboard-block mt-0">
						{{-- <h3 class="block-title">My Ads</h3> --}}
						<!-- Start Items Area -->
						<div class="board-list-items my-items"> {{-- my-items --}}
							<div class="board-items-top container">
								<div class="row">
									{{-- // 검색 --}}
									<div class="col-md-11">
										<form class="d-flex" method="POST" action="{{route('notice.search')}}">
                                            @csrf
                                            <input class="form-control me-2 dropdown-toggle headersearch" type="search" placeholder="검색어를 입력하세요." aria-label="Search" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" autocomplete="off" name="search" maxlength='100' style="height:35px;">
                                            <div class="button">
                                                <button class="btn" type="submit" style="width:60px; height:35px; padding:5px;">검색</button>
                                            </div>
                                        </form>
									</div>
									{{-- // 정렬기능 --}}
									{{-- <div class="col-md-1">
										<li class="board-array nav-item dropdown">
											<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">정렬</a>
											<ul class="dropdown-menu">
											<li><a class="dropdown-item" href="#">최신순</a></li>
											<li><a class="dropdown-item" href="#">오래된순</a></li>
											<li><hr class="dropdown-divider"></li>
											<li><a class="dropdown-item" href="#">모든 정렬 삭제</a></li>
											</ul>
										</li>
									</div> --}}
								</div>
							</div>

							<!-- Start Item List Title -->
							<div class="item-list-title">
								<div class="row align-items-center">
									<div class="col-lg-1 col-md-1 col-12">
										<p>No</p>
									</div>
									<div class="col-lg-5 col-md-5 col-12">
										<p>제목</p>
									</div>
									<div class="col-lg-2 col-md-2 col-12">
										<p>작성일</p>
									</div>
									<div class="col-lg-1 col-md-1 col-12">
										<p>조회수</p>
									</div>
								</div>
							</div>
							<!-- End List Title -->
                            @forelse($notices as $notice)
							<!-- Start Single List -->
							<div class="board-list-item single-item-list boardline">
								<div class="row align-items-center">
									<div class="col-lg-1 col-md-1 col-12">
                                        {{ $notice->notice_id }}
									</div>
									<div class="col-lg-5 col-md-5 col-12">
										<div class="content">
											<p class="title"><a href="{{route('notice.show', ['id' => $notice->notice_id])}}">{{ $notice->notice_title }}</a></p>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-12">
										<p>{{ $notice->created_at }}</p>
									</div>
									<div class="col-lg-1 col-md-1 col-12">
										<p>{{ $notice->notice_hit }}</p>
									</div>
								</div>
							</div>
							<!-- End Single List -->
							@empty
							<div class="board-list-item single-item-list boardline">
								<div class="row align-items-center">
									<div class="col-lg-1 col-md-1 col-12">

									</div>
									<div class="col-lg-5 col-md-5 col-12">
										<div class="content">
											<p>게시글 없음</p>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-12">

									</div>
									<div class="col-lg-1 col-md-1 col-12">

									</div>
								</div>
							</div>
							@endforelse


							<!-- Pagination -->
							{{-- <div class="pagination left">
								<ul class="pagination-list">
									<li><a href="javascript:void(0)">1</a></li>
									<li class="active"><a href="javascript:void(0)">2</a></li>
									<li><a href="javascript:void(0)">3</a></li>
									<li><a href="javascript:void(0)">4</a></li>
									<li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
								</ul> --}}
                            {!! $notices->links('vendor.pagination.custom') !!}
							{{-- </div> --}}
							<!--/ End Pagination -->
						</div>
						<!-- End Items Area -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


{{-- // 공지사항(배경넣고 위치 잡아주기) --}}
{{-- <h2 class="mt-0 mb-0">공지사항</h2> --}}
{{-- // navbar(검색,정렬) --}}
{{-- <nav class="navbar navbar-expand-lg">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<div class="d-grid gap-2 d-md-flex mx-auto">
				<form class="d-flex" role="search">
					<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
					<button class="btn btn-outline-success" type="submit">Search</button>
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">정렬</a>
							<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="#">최신순</a></li>
							<li><a class="dropdown-item" href="#">오래된순</a></li>
							<li><a class="dropdown-item" href="#">?</a></li>
							<li><a class="dropdown-item" href="#">?</a></li>
							<li><a class="dropdown-item" href="#">?</a></li>
							<li><hr class="dropdown-divider"></li>
							<li><a class="dropdown-item" href="#">모든 정렬 삭제</a></li>
							</ul>
						</li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</nav> --}}
{{-- // Tables --}}
{{-- <table class="table" >
    <caption></caption>
    <colgroup>
        <col width="5%"/>
        <col width="70%"/>
        <col width="25%"/>
    </colgroup>
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">제목</th>
            <th scope="col">작성일</th>
        </tr>
    </thead>
    <tbody class="table-group-divider"> --}}
        {{-- @if($notices->isEmpty()) --}}
        {{-- @if(!isset($notices))
            <tr>
                <td></td>
                <td>공지사항이 없습니다.</td>
                <td></td>
            </tr>
        @else
            @forelse($notices as $notice)
            <tr>
                <td>{{ $notice->notice_id }}</td>
                <td><a href="{{route('notice.show', ['id' => $notice->notice_id])}}">{{ $notice->notice_title }}</a></td> --}}
                {{-- <td>{{ $notice->notice_title }}</td> --}}
                {{-- <td>{{ $notice->created_at }}</td>
            </tr>
            <tr>
                @empty
                    <td>!!!!!</td>
                    <td>게시글 없음</td>
                    <td>!!!!!</td>
            </tr>
            @endforelse
        @endif

    </tbody>
</table> --}}

{{-- // Pagination --}}
    {{-- 라라벨 기본 지원 페이지네이션 --}}
    {{-- {!! $notice->links('vendor.pagination.custom') !!} --}}
@endsection
