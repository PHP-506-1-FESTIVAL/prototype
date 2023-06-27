@extends('layout.layout')

@section('title','축제톡톡')

@section('content')

<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="breadcrumbs-content">
					<h1 class="page-title"><a href="{{route('board.index')}}">축제톡톡</a></h1>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<ul class="breadcrumb-nav">
					<li><a href="{{route('main')}}">메인</a></li>
					<li><a href="{{route('board.index')}}">축제톡톡</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Dashboard Section -->
<section class="dashboard section">
	<div class="container">
		<div class="row">
			<div class="board-list-ct col-lg-12 col-md-12 col-12">
				<div class="main-content">
					<div class="dashboard-block mt-0">
						{{-- <h3 class="block-title">My Ads</h3> --}}
						{{-- <nav class="list-nav">
							<ul>
								<li class="active"><a href="javascript:void(0)">All Ads <span>42</span></a></li>
								<li><a href="javascript:void(0)">Published <span>88</span></a></li>
								<li><a href="javascript:void(0)">Featured <span>12</span></a></li>
								<li><a href="javascript:void(0)">Sold <span>02</span></a></li>
								<li><a href="javascript:void(0)">Active <span>45</span></a></li>
								<li><a href="javascript:void(0)">Expired <span>55</span></a></li>
							</ul>
						</nav> --}}
						<!-- Start Items Area -->
						<div class="board-list-items my-items"> {{-- my-items --}}
							<!-- Start Item List Title -->
							<div class="item-list-title">
								<div class="row align-items-center">
									<div class="col-lg-1 col-md-1 col-12">
										<p>No</p>
									</div>
									<div class="col-lg-5 col-md-5 col-12">
										<p>제목</p>
									</div>
									<div class="col-lg-3 col-md-3 col-12">
										<p>작성자</p>
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
							
							<!-- Start Single List -->
							@forelse($data as $item)
							<div class="single-item-list boardline">
								<div class="row align-items-center">
									<div class="col-lg-1 col-md-1 col-12">
											{{$item->board_id}}
									</div>
									<div class="col-lg-5 col-md-5 col-12">
										<div class="content">
											<p class="title"><a href="{{route('board.show', ['board' => $item->board_id])}}">{{$item->board_title}}</a></p>
										</div>
									</div>
									<div class="col-lg-3 col-md-3 col-12">
										<p>{{$item->user_nickname}}</p>
									</div>
									<div class="col-lg-2 col-md-2 col-12">
										<p>{{$item->created_at}}</p>
									</div>
									<div class="col-lg-1 col-md-1 col-12">
										<p>{{$item->board_hit}}</p>
									</div>
								</div>
							</div>
							<!-- End Single List -->
							@empty
							<tr>
								<td></td>
								<td>게시글 없음</td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							@endforelse

							<!-- Pagination -->
							<div class="pagination left">
								<ul class="pagination-list">
									<li><a href="javascript:void(0)">1</a></li>
									<li class="active"><a href="javascript:void(0)">2</a></li>
									<li><a href="javascript:void(0)">3</a></li>
									<li><a href="javascript:void(0)">4</a></li>
									<li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li>
								</ul>
								{!! $data->links('vendor.pagination.custom') !!}
							</div>
							<!--/ End Pagination -->
						</div>
						<!-- End Items Area -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


{{-- // 자유게시판제목(배경넣고 위치 잡아주기)
{{-- <h2 class="mt-0 mb-0 talktalktopimg">축제 톡톡</h2> --}}
{{-- <div class="bg-success p-2 text-white bg-opacity-10 talktalktopimg">축제 톡톡</div> --}}

{{-- <div class="mx-5 my-3">
	{{-- // navbar(검색,정렬) --}}
	<nav class="navbar navbar-expand-lg">
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

				{{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end" href="{{route("board.create")}}"> --}}
					{{-- <a href=""></a> --}}
				{{-- </div> --}}
				<a href="{{route("board.create")}}"><button class="btn btn-primary" type="button">글쓰기</button></a>
			</div>
		</div>
	</nav>
	{{-- // Tables --}}
		<table class="table">
			<caption></caption>
			<colgroup>
				<col width="5%"/>
				<col width="70%"/>
				<col width="10%"/>
				<col width="10%"/>
				<col width="5%"/>
			</colgroup>
			<thead>
				<tr>
					<th scope="col">No</th>
					<th scope="col">제목</th>
					<th scope="col">작성자</th>
					<th scope="col">작성일</th>
					<th scope="col">조회수</th>
				</tr>
			</thead>
			<tbody class="table-group-divider">
			@forelse($data as $item)
				<tr>
					{{-- <th scope="row">{{$key+1 + (($item->currentPage()-1) * 10)}}</th> --}}
					<td>{{$item->board_id}}</td>
					<td><a href="{{route('board.show', ['board' => $item->board_id])}}">{{$item->board_title}}</a></td>
					<td>{{$item->user_nickname}}</td>
					<td>{{$item->created_at}}</td>
					<td>{{$item->board_hit}}</td>
				</tr>
			@empty
				<tr>
					<td></td>
					<td>게시글 없음</td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			@endforelse
			</tbody>
		</table>
	{{-- // Pagination --}}
		{{-- 라라벨 기본 지원 페이지네이션 --}}
		{{-- {!! $data->links('vendor.pagination.custom') !!} --}}
{{-- </div> --}}
@endsection