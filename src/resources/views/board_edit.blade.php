@extends('layout.layout')

@section('title','게시판 수정')

@section('content')
{{-- // 게시판 수정(상세base) --}}
<div class="">
<form action="">
    {{-- // 게시판 수정 item (상세base) --}}
    <div class="">
        <input type="text" value={{$board_edit_data->board_title}}>
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <p style="text-align: right" class="pt-2">{{$board_edit_data->user_id}} | {{$board_edit_data->created_at}}</p>
        </div>
    </div>

    {{-- // 게시판 상세 내용 --}}
    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$board_edit_data->board_content}}
        </div>
    </div>
    {{-- // 게시판 수정 BUTTON --}}
</form>
</div>

@endsection
