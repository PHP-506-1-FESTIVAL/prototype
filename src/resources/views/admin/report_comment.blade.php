@extends('layout.report_detail')

@section('title','댓글')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">작성자</h6>
            <a href="javascript:popup({{$comment->user_id}})">
                <h6 style="font-weight:100;">{{$comment->user_id}}</h6>
            </a>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">댓글 달린 글</h6>
            @if($comment->comment_type == '0')
                <a href="{{route('fes.detail', $comment->festival_id)}}">
                    <h6 style="font-weight:100;">{{$comment->festival_id}}</h6>
                </a>
            @elseif($comment->comment_type == '1')
                <a href="{{route('board.show', $comment->board_id)}}">
                    <h6 style="font-weight:100;">{{$comment->board_id}}</h6>
                </a>
            @endif
            </div>
        </div>
        <div class="col-12">
            <h6 class="mb-2">댓글 내용</h6>
            <h6 style="font-weight:100;">{{$comment->comment_content}}</h6>
        </div>
    </div>
    
    <script>
        function popup(e){
            var url = "{!! route('report.user') !!}";
            url = url + '?id=' + e;
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }
    </script>
@endsection