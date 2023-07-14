@extends('layout.layout')

@section('title','게시판 상세')

@section('content')
{{-- 메인>축제톡톡>글상세페이지 --}}
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
                    <li><a href="{{route('board.show', ['board' => $boards->board_id])}}">{{$boards->board_title}}</a></li>
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
                                {{$boards->board_title}}
                            </h2>
                            <!-- post meta -->
                            <div class='row align-items-center' >
                                <div class="col-8">
                                    <ul class="custom-flex post-meta">
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-user"></i>
                                                {{$boards->user_nickname}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-calendar"></i>
                                                {{$boards->created_at}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-comments"></i>
                                                35 Comments
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)">
                                                <i class="lni lni-eye"></i>
                                                {{$boards->board_hit}} View
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:popup()">
                                                <i class="lni lni-alarm"></i>
                                                신고하기
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row col-4 justify-content-end">
                                {{-- // 게시판 상세 BUTTON --}}
                                    {{-- // 세션의 ID와 작성자가 다를시 안보임 --}}
                                    @if(session('user_id') === $boards->user_id)
                                        <div class="col-3" style="padding: 0 0 0 7%;">
                                            <a href="{{route('board.edit', ['board' => $boards->board_id])}}"><button class="btn btn-primary" type="button">수정</button></a>
                                        </div>
                                        <div class="col-4" style="padding:0;">
                                            <form action="{{route('board.destroy', ['board' => $boards->board_id])}}" method="post" name="removefrm">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button" style="margin: 0 0 0 9%;">삭제하기</a>
                                                {{-- 모달창 구현 --}}
                                                <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalToggleLabel"> </h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                정말로 삭제 하시겠습니까?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-primary">확인</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    {{-- // [버튼] 목록으로 --}}
                                    <div class="col-5" style="padding: 0">
                                        <a href="{{route('board.index')}}"><button class="btn btn-primary" type="button" style="width:90px;">목록으로</button></a>
                                    </div>
                                </div>
                            </div>
                            <p><div style="white-space:pre-wrap; word-wrap: break-word;">{{$boards->board_content}}</div></p>
                        </div>
                        @include('layout.list_comment')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Singel Area -->

<script>
        function popup(){
            var url = "{{ route('insert.report') }}";
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }
</script>

@endsection
