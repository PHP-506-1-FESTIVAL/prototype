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
                                    <i class="lni lni-calendar"></i>
                                    {{$notices->created_at}}
                                </li>
                                <li>
                                    <i class="lni lni-eye"></i>
                                    {{$notices->notice_hit}} View
                                </li>
                            </ul>
                            {{-- // 게시판 상세 BUTTON --}}
                            <div class="text-end"><a href="{{route('notice.index')}}"><button class="btn btn-primary" type="button">목록으로</button></a></div>
                            <p><div style="white-space:pre-wrap; word-wrap: break-word;">{{$notices->notice_content}}</div></p>
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