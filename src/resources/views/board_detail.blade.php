@extends('layout.layout')

@section('title','게시판 상세')

@section('content')
{{-- // 게시판 상세 --}}
<div class="container">
    {{-- // 게시판 상세 TOP --}}
    <div class="">
        <h2 class="mt-4 mb-3">{{$board_detail_data->board_title}}</h2>
        <hr>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <p style="text-align: right" class="pt-2">{{$board_detail_data->user_id}} | {{$board_detail_data->created_at}}</p>
            {{-- // 게시판 상세 BUTTON --}}
            <a href="{{route('board.index')}}"><button class="btn btn-primary" type="button">목록으로</button></a>
            <a href="{{route('board.edit', ['board' => $board_detail_data->board_id])}}"><button class="btn btn-primary" type="button">수정</button></a>
            <form action="{{route('board.destroy', ['board' => $board_detail_data->board_id])}}" method="post" name="removefrm">
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
                                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">확인</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

{{-- 리스트로 돌아간후 모달뜨고 어디든 클릭시 사라지도록 --}}
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalToggleLabel2"> </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                삭제가 완료되었습니다.
            </div>
            {{-- <div class="modal-footer"> --}}
                {{-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Back to first</button> --}}
            {{-- </div> --}}
        </div>
    </div>
</div>

    {{-- // 게시판 상세 내용 --}}
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$board_detail_data->board_content}}
        </div>
    </div>
</div>

{{-- // 댓글 --}}
댓글부분입니다.
    {{-- @include('layout.comment') --}}
@endsection





