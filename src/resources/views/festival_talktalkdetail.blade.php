@extends('layout.layout')

@section('title','축제톡톡상세')

@section('content')
{{-- // 자유게시판제목(배경넣고 위치 잡아주기) --}}
<a class="nav-link disabled ">축제 톡톡</a>
{{-- // navbar(검색,정렬) --}}
<nav class="navbar navbar-expand-lg bg-light">
	<div class="container-fluid">
	<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					정렬
					</a>
					<ul class="dropdown-menu">
					<li><a class="dropdown-item" href="#">최신순</a></li>
					<li><a class="dropdown-item" href="#">오래된순</a></li>
					<li><a class="dropdown-item" href="#">오래된순</a></li>
					<li><a class="dropdown-item" href="#">오래된순</a></li>
					<li><a class="dropdown-item" href="#">오래된순</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="#">모든 정렬 삭제</a></li>
					</ul>
				</li>
				</ul>
			</form>
		</div>
	</div>
</nav>
{{-- // Tables --}}
	<table class="table caption-top">
		<caption></caption>
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
			<tr>
				<th scope="row">1</th>
				<td><a href="">Mark</a></td>
				<td>Otto</td>
				<td>@mdo</td>
				<td>@mdo</td>
			</tr>
			<tr>
				<th scope="row">2</th>
				<td>Jacob</td>
				<td>Thornton</td>
				<td>@fat</td>
				<td>@mdo</td>
			</tr>
			<tr>
				<th scope="row">3</th>
				<td>Larry</td>
				<td>the Bird</td>
				<td>@twitter</td>
				<td>@mdo</td>
			</tr>
		</tbody>
	</table>
{{-- // Pagination --}}
	<nav aria-label="Page navigation example">
		<ul class="pagination">
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
			<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
		</ul>
	</nav>
@endsection