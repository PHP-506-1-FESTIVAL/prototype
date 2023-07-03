@extends('layout.layout')

@section('title','게시글 작성')

@section('content')
{{-- 메인>축제톡톡>글쓰기 --}}
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="breadcrumbs-content">
					<h1 class="page-title"><a href="{{route('board.index')}}">글쓰기</a></h1>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<ul class="breadcrumb-nav">
					<li><a href="{{route('main')}}">메인</a></li>
					<li><a href="{{route('board.index')}}">축제톡톡</a></li>
                    <li><a href="{{route("board.create")}}">글쓰기</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Dashboard Section -->
<section class="dashboard section-board" style="padding-top : 10px">
	<div class="container">
		<h2 class="mt-0 mb-0">게시글 작성 페이지</h2>
		@include('layout.errormsg') 
		{{-- <%-- 입력 폼 --%> --}}
		<form action="{{route('board.store')}}" method="post" id="insertform" onsubmit="return false;">
			@csrf
			<input type="text" name="writetitle" id="title" class="form-control mt-4 mb-2" placeholder="제목을 입력해주세요." required>
			<div class="form-group">
				<textarea class="form-control" rows="10" id="content" name="writecontent" placeholder="내용을 입력해주세요" required></textarea>
			</div>
			<div style="text-align: right; margin-top:10px;">
				<button type="submit" class="btn btn-primary" onclick="submittest()">작성 하기</button>
				<a href="{{route("board.index")}}"><button class="btn btn-secondary" type="button">취소</button></a>
			</div>
		</form>
	</div>
</section>

<script>
	var submitflg = false;

    function submittest() {
		var insertform = document.getElementById('insertform');
		var title = document.getElementById('title').value;
		var content = document.getElementById('content').value;
		if(title.length < 1) {
			alert('제목을 입력해 주세요.');
		} else if (content.length < 1) {
			alert('내용을 입력해 주세요.');
		} else if (title.length > 50) {
			alert('제목을 50글자 이하로 입력해 주세요.');
		} else if (content.length > 2000) {
			alert('내용을 2000글자 이하로 입력해 주세요.')
		} else {
			if(!submitflg) {
				submitflg = true;
				insertform.removeAttribute('onsubmit');
			} else {
				alert('요청이 진행 중입니다.');
			}
		}
    }
</script>

@endsection