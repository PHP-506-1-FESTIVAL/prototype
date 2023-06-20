@extends('layout.layout')

@section('title','축제톡톡')

@section('content')
{{-- // 자유게시판제목(배경넣고 위치 잡아주기) --}}
<h2 class="mt-0 mb-0 talktalktopimg">축제 톡톡</h2>
{{-- <div class="bg-success p-2 text-white bg-opacity-10 talktalktopimg">축제 톡톡</div> --}}
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
				<a href="{{route("board.create")}}"><button class="btn btn-primary" type="button">글쓰기</button></a>
			{{-- </div> --}}
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
				<td>{{$item->user_id}}</td>
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
	{!! $data->links('vendor.pagination.custom') !!}
@endsection