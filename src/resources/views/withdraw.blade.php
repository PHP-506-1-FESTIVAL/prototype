@extends('layout.layout')

@section('title','회원탈퇴')

@section('content')

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h1 class="mb-3">회원탈퇴</h1>
        </div>
        
        <div class="container" style="max-width:500px;">
            <form action="{{route('user.withdrawpost')}}" method="post" class="needs-validation" enctype="multipart/form-data">
                @csrf

                <div class="col-12">
                    <h3>주의하세요!</h3>
                    <p>탈퇴 시 삭제되는 정보를 확인하세요.<br>한번 삭제된 정보는 복구가 불가능합니다.</p>
                </div>
                <div class="mb-5" style="font-weight:900">
                    <p>계정 및 프로필 정보 삭제<br>관심 축제 찜 내역 삭제<br>작성 게시글, 댓글 삭제</p>
                </div>

                <div class="col-12">
                    <h5>탈퇴하시는 이유를 알려주세요.</h5>
                    <p>향후 사이트 개선에 도움이 됩니다.</p>
                </div>

                <div class="my-3">
                    <div class="form-check">
                        <input id="wr1" name="wr" type="radio" class="form-check-input" value="1" checked required>
                        <label class="form-check-label" for="wr1">기록 삭제 목적</label>
                    </div>
                    <div class="form-check">
                        <input id="wr2" name="wr" type="radio" class="form-check-input" value="2" required>
                        <label class="form-check-label" for="wr2">이용이 불편하고 장애가 많아서</label>
                    </div>
                    <div class="form-check">
                        <input id="wr3" name="wr" type="radio" class="form-check-input" value="3" required>
                        <label class="form-check-label" for="wr3">다른 사이트가 더 좋아서</label>
                    </div>
                    <div class="form-check">
                        <input id="wr4" name="wr" type="radio" class="form-check-input" value="4" required>
                        <label class="form-check-label" for="wr4">사용빈도가 낮아서</label>
                    </div>
                    <div class="form-check">
                        <input id="wr5" name="wr" type="radio" class="form-check-input" value="5" required>
                        <label class="form-check-label" for="wr5">콘텐츠 불만</label>
                    </div>
                </div>

                <hr class="my-5">

                <div class="col-12" style="display:grid; grid-template-columns:1fr 1fr; justify-content:center;">
                    <button class="btn btn-light btn-lg me-2" type="button"onclick="location.href='{{route('user.main')}}'">취소</button>
                    <button class="btn btn-danger btn-lg ms-2" type="submit">탈퇴하기</button>
                </div>

            </form>
        </div>
    </main>

</div>

@endsection