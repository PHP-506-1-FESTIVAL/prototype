@extends('layout.layout')

@section('title','공지사항 상세')

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
                    <li><a href="{{route('notice.show', ['id' => $notices->notice_id])}}">{{ $notices->notice_title }}</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!-- End Breadcrumbs -->

<!-- Start Blog Singel Area -->
<section class="section-board blog-single">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <div class="detail-inner">
                            <h2 class="post-title">
                                {{$notices->notice_title}}
                            </h2>
                            <!-- post meta -->
                            <ul class="custom-flex post-meta">
                                <li>
                                    {{-- <a href="javascript:void(0)"> --}}
                                        <i class="lni lni-calendar"></i>
                                        {{$notices->created_at}}
                                    {{-- </a> --}}
                                </li>
                                <li>
                                    {{-- <a href="javascript:void(0)"> --}}
                                        <i class="lni lni-eye"></i>
                                        {{$notices->notice_hit}} View
                                    {{-- </a> --}}
                                </li>
                                {{-- // 게시판 상세 BUTTON --}}
                                <a href="{{route('notice.index')}}" ><button class="btn btn-primary" type="button">목록으로</button></a>
                            </ul>
                            <p><div style="white-space:pre;">{{$notices->notice_content}}</div></p>
                        </div>
                        {{-- @include('layout.comment') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Singel Area -->

@endsection




{{-- del.0627.신유진 전반적 css수정으로 삭제 --}}
{{-- // 게시판 상세 --}}
{{-- <div class=""> --}}
    {{-- // 게시판 상세 TOP --}}
    {{-- <div class="">
        <h2 class="mt-4 mb-3">{{$notices->notice_title}}</h2>
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end"> --}}
                {{-- user_id가 아닌 user_nickname이 올수있도록 수정 --}}
            {{-- <p style="text-align: right" class="pt-2"> --}} {{-- {{$notices->user_id}} --}}{{--  관리자 | {{$notices->created_at}} | {{$notices->notice_hit}}</p> --}}
            {{-- // 게시판 상세 BUTTON --}}
            {{-- <a href="{{route('notice.index')}}"><button class="btn btn-primary" type="button">목록으로</button></a> --}}
            {{-- <a href="{{route('board.edit', ['board' => $board_detail_data->board_id])}}"><button class="btn btn-primary" type="button">수정</button></a>
            <form action="{{route('board.destroy', ['board' => $board_detail_data->board_id])}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">삭제하기</button>
            </form> --}}
        {{-- </div>
    </div> --}}

    {{-- // 게시판 상세 내용 --}}
    {{-- <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$notices->notice_content}}
        </div>
    </div>
</div> --}}