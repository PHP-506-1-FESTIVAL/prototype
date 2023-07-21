@extends('layout.adminlayout')

@section('title','공지수정')

@section('content')
<style>
    .content-box{
        display: grid;
        grid-gap: 10px;
        grid-template-rows: 50vh 5vh;
        grid-template-columns: 5vw 5vw 1fr;
    }
    .notic-content{
        grid-area: 1/1/2/4;
        /* display: grid;
        grid-template-rows: 5vh 5vh 1fr;
        grid-template-columns: 5vh 1fr; */
    }
    /* .ql-toolbar ql-snow{
        grid-area: 2/1/4/3;
    } */
    #editor{
        height: 80%;
        border-radius: 0 0 5px 5px
    }
    .title-box label{
        text-align: center
    }
    .cancle-btn{
        width: 100%;
        height: 5vh;
    }
</style>

    <main id="main" class="main">
        <div class="pagetitle">
            <h1>공지 관리</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.main')}}">메인</a></li>
                    <li class="breadcrumb-item">공지</li>
                    <li class="breadcrumb-item active">수정</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>공지 수정</strong></h5>
                <!-- Quill Editor Full -->
                <div class="content-box">
                    <form action="{{route('admNotice.store')}}" method="post" id="notice" class="notic-content">
                        @csrf
                        {{-- <label for="title">제목 : </label>
                        <input type="text" name="title" placeholder="제목" id="title"> --}}
                        <div class="row mb-3 title-box">
                            <label for="inputText" class="col-sm-1 col-form-label">제 목:</label>
                            <div class="col-sm-11">
                                <input type="text" class="form-control" name="title" value="{{$data->notice_title}}">
                            </div>
                        </div>
                        <div id="editor">{{-- ----- 230720 add Quill추가 신유진 ----- --}}
                            {{$data->notice_content}}
                        </div>
                        <!-- End Quill Editor Full -->
                        <input type="hidden" name="content" id="content">
                    </form>
                    <button class="btn btn-primary btn-sm" onclick="submit()">수정</button>
                    <form action="{{route('admin.notice')}}" method="get">
                        <button type="submit" class="btn btn-outline-secondary btn-sm cancle-btn">취소</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="{{asset('js/editor.js')}}"></script>
@endsection
