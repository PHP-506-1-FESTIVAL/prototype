@extends('layout.layout')

@section('title','게시판 수정')

@section('content')
{{-- https://ee2ee2.tistory.com/entry/JSP-%EA%B2%8C%EC%8B%9C%ED%8C%90-%EB%A7%8C%EB%93%A4%EA%B8%B0-13%EA%B0%95-%EA%B2%8C%EC%8B%9C%EA%B8%80-%EC%88%98%EC%A0%95-%EB%B0%8F-%EC%82%AD%EC%A0%9C-%EA%B8%B0%EB%8A%A5-%EA%B5%AC%ED%98%84%ED%95%98%EA%B8%B0 --}}

{{-- // 게시판 수정(상세base) --}}
<div class="container">
<form action="{{route('board.update', ['board' => $boards->board_id])}}" method="post">
    @csrf
    @method('put')
    {{-- // 게시판 수정 item (상세base) --}}
    <div>
        <input type="text" name="title" id="title" value="{{$boards->board_title}}" class="form-control mt-3 mb-0 p-0 rounded-3 form-floating fs-2" size=80>
        {{-- {{count($errors) > 0 ? old('board_title') : $boards->board_title}} --}}
        <hr>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            {{-- user_id가 아닌 user_nickname이 올수있도록 수정 --}}
        <p style="text-align: right" class="pt-2">{{$boards->user_id}} | {{$boards->created_at}}</p>
        {{-- // 게시판 상세 BUTTON --}}
        <a href=""><button class="btn btn-primary" type="submit">수정</button></a>
        <button class="btn btn-primary" type="button" onclick="history.back()">취소</button>
        </div>
    </div>

    {{-- https://webisfree.com/2015-11-03/textarea-%ED%83%9C%EA%B7%B8-%EB%86%92%EC%9D%B4-%EC%9E%90%EB%8F%99%EC%9C%BC%EB%A1%9C-%EC%A1%B0%EC%A0%88%ED%95%98%EB%8A%94-%EB%B0%A9%EB%B2%95 --}}
    {{-- // 게시판 상세 내용 --}}
    {{-- id="exampleFormControlTextarea1" --}}
    {{-- {{count($errors) > 0 ? old('board_content') : $boards->board_content}} --}}
    <textarea name="content" id="content" rows="15" class="form-control content mt-4 rounded-3 border border-secondary p-3">{{$boards->board_content}}</textarea>
    {{-- <input type="text" value="{{$boards->board_content}}" class="content mt-4 rounded-3 border border-secondary p-3 form-floating"> --}}
</form>
</div>

@endsection
