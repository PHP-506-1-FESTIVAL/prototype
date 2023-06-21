@extends('layout.layout')

@section('title','공지사항')

@section('content')
{{$notices}}

{{-- // 공지사항(배경넣고 위치 잡아주기) --}}
<h2 class="mt-0 mb-0">공지사항</h2>
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
		</div>
	</div>
</nav>
{{-- // Tables --}}
<table class="table" >
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
    <tbody class="table-group-divider">
        {{-- @if($notices->isEmpty()) --}}
        @if(!isset($notices))
            <tr>
                <td></td>
                <td>공지사항이 없습니다.</td>
                <td></td>
            </tr>
        @else
            @forelse($notices as $notice)
            <tr>
                <td>{{$notice->notice_id}}</td>
                {{-- <td><a href="{{route('notice.show', ['board' => $item->board_id])}}">{{$item->board_title}}</a></td> --}}
                <td>{{ $notice->notice_title }}</td>
                <td>{{ $notice->created_at }}</td>
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
</table>
@endsection