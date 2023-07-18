@extends('layout.report_detail')

@section('title','글')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">작성자</h6>
            <a href="javascript:popup({{$board->user_id}})">
                <h6 style="font-weight:100;">{{$board->user_id}}</h6>
            </a>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">제목</h6>
            <h6 style="font-weight:100;">{{$board->board_title}}</h6>
            </div>
        </div>
        <div class="col-12">
            <h6 class="mb-2">내용</h6>
            <h6 style="font-weight:100;">{{$board->board_content}}</h6>
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