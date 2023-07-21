@extends('layout.adminlayout')

@section('title','공지작성.수정')

@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>공지 관리</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.main')}}">메인</a></li>
                    <li class="breadcrumb-item">공지</li>
                    <li class="breadcrumb-item active">작성.수정</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>공지 수정</strong></h5>
                {{-- <h5 class="card-title"><strong>{{$data->card_title}}</strong></h5> --}}
                <form action="{{route('admin.notice')}}" method="get">
                    <button type="submit" class="btn btn-outline-secondary">취소</button>
                </form>
                <!-- Quill Editor Full -->
                    <form action="{{route('admNotice.update',['id'=>$data->notice_id])}}" method="post" id="notice">
                        @csrf
                        @method('put')
                        <label for="title">제목 : </label>
                        <input type="text" name="title" id="title" value="{{$data->notice_title}}">
                        <div id="editor">{{-- ----- 230720 add Quill추가 신유진 ----- --}}
                            {{$data->notice_content}}
                        </div>
                        <!-- End Quill Editor Full -->
                        <input type="hidden" name="content" id="content">
                    </form>
                    <button class="btn btn-primary btn-sm" onclick="submit()">작성</button>
            </div>
        </div>
    </main>
    <script src="{{asset('js/editor.js')}}"></script>
@endsection
