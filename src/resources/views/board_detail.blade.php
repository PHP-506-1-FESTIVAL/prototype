@extends('layout.layout')

@section('title','축제톡톡상세')

@section('content')
{{-- // 게시판 상세 --}}
<div class="">
    {{-- // 게시판 상세 TOP --}}
    <div class="">
        <h2 class="mt-4 mb-3">{{$board_data->board_title}}</h2>
        <hr>
        <p style="text-align: right" class="pt-2">{{$board_data->user_id}} | {{$board_data->created_at}}</p>
    </div>
    {{-- // 게시판 상세 BUTTON --}}
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button class="btn btn-primary me-md-2" type="button">수정</button>
        {{-- <button class="btn btn-primary" type="button">삭제</button> --}}
        <form action="{{route('board.destroy', ['board' => $board_data->board_id])}}" method="post">
            @csrf
            @method('delete')
            <button class="btn btn-primary" type="submit">삭제하기</button>
        </form>
    </div>
    {{-- // 게시판 상세 내용 --}}
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$board_data->board_content}}
        </div>
    </div>
</div>

{{-- // 댓글 --}}
    @include('layout.comment')
@endsection



