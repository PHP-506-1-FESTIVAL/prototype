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
<div id="entry49Comment">
    <span>댓글</span>
    <br><hr><br>
    <div class="comments">
        {{-- // 댓글리스트 --}}
        <div class="comment-list">
            <ul>
                <li id="comment-item">
                    <div class="author-meta">
                        <img src="https://t1.daumcdn.net/tistory_admin/blog/admin/profile_default_01.png" style="width: 2%; min-width: 50px;" class="avatar" alt="" >
                        <span class="nickname">댓글 작성자 닉네임</span>
                        <span class="date">
                            2023.06.16 11:04 
                        </span>
                        <a href="" onclick="">신고</a>
                        <span class="control">
                            <a href="#" onclick="deleteComment(13736003);return false">수정/삭제</a>
                            <a href="#" onclick=" commentComment(13736003);return false">댓글쓰기</a>
                        </span>
                    </div>  
                    <p>댓글의 내용 부분 입니다.</p>
                </li>
            </ul>
        </div>
        {{-- // 댓글 입력 --}}
        <br><hr><br>
        <form method="post" action="/comment/add/49" onsubmit="return false" style="margin: 0">
            <div class="comment-form">
                <div class="field">
                    <input type="text" name="name" value="" placeholder="이름">
                    <input type="password" name="password" value="[##_rp_admin_check_##]" placeholder="암호">
                    <div class="secret">
                        <input type="checkbox" name="secret" id="secret">
                        <label for="secret" tabindex="0">Secret</label>
                    </div>
                </div>

                <textarea name="comment" cols="" rows="4" placeholder="댓글을 입력해주세요."></textarea>
                <div class="submit" onclick="addComment(this, 49); return false;">
                    <button type="submit" class="btn">댓글달기</button>
                </div>
            </div>
        </form>
    </div>
</div>





    {{-- @if($sesion) --}}
        
    {{-- @endif --}}
    {{-- <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$data->board_content}}
        </div>
    </div> --}}
@endsection



