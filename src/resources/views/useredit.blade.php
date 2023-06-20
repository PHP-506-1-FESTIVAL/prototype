@extends('layout.layout')

@section('title','회원정보 수정')

@section('content')

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h1 class="mb-3">회원정보 수정</h1>
        </div>
        
        <div class="container" style="max-width:500px;">
            <form action="{{route('user.update')}}" method="post" class="needs-validation" enctype="multipart/form-data">
                @csrf
                
                <div class="row g-3">
                    <div class="col-sm-7">
                        <label for="email" class="form-label">이메일</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{$data->user_email}}" readonly>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">비밀번호</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="password" name="password">
                            <div class="invalid-feedback">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="pwchk" class="form-label">비밀번호 확인</label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="pwchk" name="pwchk">
                            <div class="invalid-feedback">
                                Your username is required.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="name" class="form-label">성명</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$data->user_name}}">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="gender" class="form-label">성별</label>
                        <div>
                            <input id="male" name="gender" type="radio" class="form-check-input" value="0" required {{$data->malechk}}>
                            <label class="form-check-label" for="male" style="margin-right:30px;">남성</label>
                            <input id="female" name="gender" type="radio" class="form-check-input" value="1" required {{$data->femalechk}}>
                            <label class="form-check-label" for="female">여성</label>
                        </div>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label for="birthDate" class="form-label">생년월일</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="birthyear" name="birthyear" placeholder="YYYY" value="{{$data->birthyear}}" required>
                            <label class="input-group-text" for="birthyear">년</label>
                        </div>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-3" style="display:grid">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="birthmonth" name="birthmonth" placeholder="MM" value="{{$data->birthmonth}}" required style="align-self: end;">
                            <label class="input-group-text" for="birthmonth" style="align-self: end;">월</label>
                        </div>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-3" style="display:grid">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="birthday" name="birthday" placeholder="DD" value="{{$data->birthday}}" required style="align-self: end;">
                            <label class="input-group-text" for="birthday" style="align-self: end;">일</label>
                        </div>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="nickname" class="form-label">닉네임</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" value="{{$data->user_nickname}}" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-5">
                        <label for="zipcode" class="form-label">우편번호 <span class="text-muted">(선택)</span></label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{$data->user_zipcode}}">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-7" style="display:grid">
                        <button class="btn btn-secondary" id="zipcodeBtn" type="button" style="justify-self:start; align-self:end;">우편번호 찾기</button>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">주소 <span class="text-muted">(선택)</span></label>
                        <input type="text" class="form-control" id="address" name="address" value="{{$data->user_address}}">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">상세주소 <span class="text-muted">(선택)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2" value="{{$data->user_address_detail}}">
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="marketing" name="marketing" value="1" {{$data->marketingchk}}>
                            <label class="form-check-label" for="marketing">개인정보 마케팅 활용에 동의합니다.</label>
                        </div>

                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="promotion" name="promotion" value="1" {{$data->promotionchk}}>
                            <label class="form-check-label" for="promotion">프로모션 이메일 수신에 동의합니다.</label>
                        </div>
                    </div>

                <div style="display:grid;">
                    <a href="{{route('user.withdraw')}}" style="justify-self:end;">회원 탈퇴</a>
                </div>

                <hr class="my-5">

                <div class="col-12" style="display:grid; grid-template-columns:1fr 1fr; justify-content:center;">
                    <button class="btn btn-light btn-lg me-2" type="button"onclick="location.href='{{route('user.main')}}'">취소</button>
                    <button class="btn btn-primary btn-lg ms-2" type="submit">수정하기</button>
                </div>

            </form>
        </div>
    </main>
</div>

@endsection