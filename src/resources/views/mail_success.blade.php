@extends('layout.layout')

@section('title','이메일 발송')

@section('content')

    <!-- Start Error Area -->
    <div class="maill-success">
        <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
            <div class="success-content">
                <h1>축하합니다!</h1>
                <h2>메일이 성공적으로 보내졌습니다</h2>
                <div class="button">
                <a href="{{route('main')}}" class="btn">홈으로 가기</a>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
    <!-- End Error Area -->


@endsection
