@extends('layout.report_detail')

@section('title','글')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">작성자</h6>
            <a href="javascript:popup({{$notice->notice_id}})">
                <h6 style="font-weight:100;">{{$notice->notice_id}}</h6>
            </a>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">제목</h6>
            <h6 style="font-weight:100;">{{$notice->notice_title}}</h6>
            </div>
        </div>
        <div class="col-12">
            <h6 class="mb-2">내용</h6>
            <h6 style="font-weight:100;">{{$notice->notice_content}}</h6>
        </div>
    </div>

@endsection
