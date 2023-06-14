@extends('layout.layout')

@section('title','로그인')

@section('content')
    <h1>로그인</h1>
    
    <form class="row row-cols-lg-auto g-3 align-items-center">
        @csrf
        <div class="col-12">
            <label class="visually-hidden" for="inlineFormInputGroupUsername">이메일</label>
            <div class="input-group">
                <div class="input-group-text">@</div>
                <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="이메일">
            </div>
        </div>

        <div class="col-12">
            <label class="visually-hidden" for="inputPassword4">비밀번호</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="비밀번호">
        </div>

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="inlineFormCheck">
                <label class="form-check-label" for="inlineFormCheck">
                    로그인 상태 유지
                </label>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">로그인</button>
            <button type="button" class="btn btn-light" onclick="location.href='{{route('user.signup')}}'">회원가입</button>
        </div>
    </form>
@endsection