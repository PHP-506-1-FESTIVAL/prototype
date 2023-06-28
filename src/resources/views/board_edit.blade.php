@extends('layout.layout')

@section('title','게시판 수정')

@section('content')
{{-- 메인>축제톡톡>글상세페이지>수정 --}}
<!-- Start Breadcrumbs -->
<div class="breadcrumbs">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6 col-md-6 col-12">
				<div class="breadcrumbs-content">
					<h1 class="page-title"><a href="{{route('board.index')}}">수정 페이지</a></h1>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-12">
				<ul class="breadcrumb-nav">
					<li><a href="{{route('main')}}">메인</a></li>
					<li><a href="{{route('board.index')}}">축제톡톡</a></li>
                    <li><a href="{{route('board.show', ['board' => $boards->board_id])}}">{{$boards->board_title}}</a></li>
                    <li><a href="{{route('board.index')}}">수정</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

{{-- // 게시판 수정(상세base) --}}
<div class="container mt-3  mb-3">
<form action="{{route('board.update', ['board' => $boards->board_id])}}" method="post">
    @csrf
    @method('put')
    {{-- // 게시판 수정 item (상세base) --}}
    <div>
        <input type="text" name="title" id="title" value="{{$boards->board_title}}" class="form-control mb-0 p-0 rounded-3 form-floating fs-2" size=80>
        @include('layout.errormsg') 
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            {{-- user_id가 아닌 user_nickname이 올수있도록 수정 --}}
        <p style="text-align: right" class="pt-2">{{$boards->user_id}} | {{$boards->created_at}}</p>
        {{-- // 게시판 상세 BUTTON --}}
        <a href=""><button class="btn btn-primary" type="submit">수정</button></a>
        <button class="btn btn-primary" type="button" onclick="history.back()">취소</button>
        </div>
    </div>

    {{-- // 게시판 상세 내용 --}}
    <textarea name="content" id="content" rows="15" class="form-control content mt-4 rounded-3 border border-secondary p-3">{{$boards->board_content}}</textarea>
</form>
</div>

@endsection
