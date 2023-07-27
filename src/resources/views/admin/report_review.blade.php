@extends('layout.report_detail')

@section('title','리뷰')

@section('content')

    <hr>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">작성자</h6>
            <br>
            <a class="mt-2" href="javascript:popup({{$review->user_id}})">
                <h6 style="font-weight:100;">{{$review->user_id}}</h6>
            </a>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">댓글 달린 글</h6>
            <br>
            <a class="mt-2" href="{{route('fes.detail', $review->festival_id)}}">
                <h6 style="font-weight:100;">{{$review->festival_id}}</h6>
            </a>
            </div>
        </div>
        <div class="col-12">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">댓글 내용</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">{{$review->review_content}}</h6>
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