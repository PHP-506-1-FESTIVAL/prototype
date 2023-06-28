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
                                    </ul>
                                </div>
                                <div class="row col-4">
                                {{-- // 게시판 상세 BUTTON --}}
                                    {{-- // 세션의 ID와 작성자가 다를시 안보임 --}}
                                    @if(session('user_id') === $boards[0]->user_id)
                                        <div class="col-3" style="padding: 0 0 0 4%;">
                                            <a href="{{route('board.edit', ['board' => $data->board_id])}}"><button class="btn btn-primary" type="button">수정</button></a>
                                        </div>
                                        <div class="col-4" style="padding:0;">
                                            <form action="{{route('board.destroy', ['board' => $data->board_id])}}" method="post" name="removefrm">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">삭제하기</a>
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
                                                            {{-- <button type="submit" onclick="history.back()" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">확인</button> --}}
                                                                <button type="submit" class="btn btn-primary">확인</button>
                                                            {{-- data-bs-toggle="modal" data-bs-dismiss="modal" --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                    {{-- // [버튼] 목록으로 --}}
                                    <div class="col-5" style="padding: 0 0 0 15%;">
                                        <a href="{{route('board.index')}}"><button class="btn btn-primary" type="button" style="width:90px;">목록으로</button></a>
                                    </div>
                                </div>
                            </div>
                            <p><div style="white-space:pre;">{{$data->board_content}}</div></p>
                        </div>
                        @include('layout.comment')
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Singel Area -->


<!-- Start Dashboard Section -->
{{-- <section class="dashboard section"> --}}
    {{-- // 게시판 상세 --}}
	{{-- <div class="container"> --}}
        {{-- // 게시판 상세 TOP --}}
        {{-- <div class="">
            <h2 class="mt-4 mb-3">{{$data->board_title}}</h2>
            <hr>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <p style="text-align: right" class="pt-2">{{$boards[0]->user_nickname}} | {{$data->created_at}}</p> --}}
                    {{-- // 게시판 상세 BUTTON --}}
                    {{-- <a href="{{route('board.index')}}"><button class="btn btn-primary" type="button">목록으로</button></a>
                    <a href="{{route('board.edit', ['board' => $data->board_id])}}"><button class="btn btn-primary" type="button">수정</button></a>
                    <form action="{{route('board.destroy', ['board' => $data->board_id])}}" method="post" name="removefrm">
                        @csrf
                        @method('delete')
                        <a class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" role="button">삭제하기</a> --}}
                        {{-- 모달창 구현 --}}
                        {{-- <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalToggleLabel"> </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        정말로 삭제 하시겠습니까?
                                    </div>
                                    <div class="modal-footer"> --}}
                                        {{-- <button type="submit" onclick="history.back()" class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal">확인</button> --}}
                                        {{-- <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">확인</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
        </div> --}}

        {{-- 리스트로 돌아간후 모달뜨고 어디든 클릭시 사라지도록 --}}
        {{-- <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalToggleLabel2"> </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        삭제가 완료되었습니다.
                    </div> --}}
                    {{-- <div class="modal-footer"> --}}
                        {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button> --}}
                    {{-- </div> --}}
                {{-- </div>
            </div>
        </div> --}}

        {{-- // 게시판 상세 내용 --}}
        {{-- <div class="content mt-4 rounded-3 border border-secondary">
            <div class="p-3">
                {{$data->board_content}}
            </div>
        </div> --}}

        {{-- // 댓글 --}}
        {{-- <hr>
        @include('layout.comment')
    </div>
</section> --}}

@endsection





