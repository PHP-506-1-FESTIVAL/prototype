@extends('layout.layout')

@section('title','공지사항 상세')

@section('content')
{{-- // 게시판 상세 --}}
<div class="">
    {{-- // 게시판 상세 TOP --}}
    <div class="">
        <h2 class="mt-4 mb-3">{{$notices->notice_title}}</h2>
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                {{-- user_id가 아닌 user_nickname이 올수있도록 수정 --}}
            <p style="text-align: right" class="pt-2">{{-- {{$notices->user_id}} --}} 관리자 | {{$notices->created_at}} | {{$notices->notice_hit}}</p>
            {{-- // 게시판 상세 BUTTON --}}
            <a href="{{route('notice.index')}}"><button class="btn btn-primary" type="button">목록으로</button></a>
            {{-- <a href="{{route('board.edit', ['board' => $board_detail_data->board_id])}}"><button class="btn btn-primary" type="button">수정</button></a>
            <form action="{{route('board.destroy', ['board' => $board_detail_data->board_id])}}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-primary" type="submit">삭제하기</button>
            </form> --}}
        </div>
    </div>

    {{-- // 게시판 상세 내용 --}}
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$notices->notice_content}}
        </div>
    </div>
</div>
@endsection