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
                <form action="{{route('admin.notice')}}" method="get">
                    <button type="submit" class="btn btn-outline-secondary">취소</button>
                </form>
            <!-- Quill Editor Full -->
                <p>Quill editor with full toolset</p>
                <div class="quill-editor-full">
                    <p>Hello World!</p>
                    <p>This is Quill <strong>full</strong> editor</p>
                </div>
            <!-- End Quill Editor Full -->
        </div>
    </main>
@endsection
