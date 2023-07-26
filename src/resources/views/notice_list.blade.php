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
								</div>
							</div>

							<!-- Start Item List Title -->
							<div class="item-list-title">
								<div class="row align-items-center">
									<div class="col-lg-1 col-md-1 col-12">
										<p>No</p>
									</div>
									<div class="col-lg-9 col-md-5 col-12">
										<p>제목</p>
									</div>
									<div class="col-lg-1 col-md-2 col-12">
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
									<div class="col-lg-9 col-md-5 col-12">
										<div class="content">
											<p class="title"><a href="{{route('notice.show', ['id' => $notice->notice_id])}}">{{ $notice->notice_title }}</a></p>
										</div>
									</div>
									<div class="col-lg-1 col-md-2 col-12">
										{{-- <p>{{ $notice->created_at }}</p> --}}
										<p>{{substr($notice->created_at, 0, 10)}}</p>
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
                            {!! $notices->links('vendor.pagination.custom') !!}
							<!--/ End Pagination -->
						</div>
						<!-- End Items Area -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
