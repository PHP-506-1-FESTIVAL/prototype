@extends('layout.layout')

@section('title','회원가입')

@section('content')

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h1 class="mb-3">회원가입</h1>
        </div>
        
        <div class="container" style="max-width:500px;">
            <form action="{{route('user.signuppost')}}" method="post" class="needs-validation" enctype="multipart/form-data">
                @csrf
                
                <div class="row g-3">
                    <div class="col-sm-7">
                        <label for="email" class="form-label">이메일</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-sm-5" style="display:grid">
                        <button class="btn btn-secondary" type="button" style="justify-self:start; align-self:end;">이메일 중복체크</button>
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
                        <input type="text" class="form-control" id="name" name="name">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="gender" class="form-label">성별</label>
                        <div>
                            <input id="male" name="gender" type="radio" class="form-check-input" value="0" required>
                            <label class="form-check-label" for="male" style="margin-right:30px;">남성</label>
                            <input id="female" name="gender" type="radio" class="form-check-input" value="1" required>
                            <label class="form-check-label" for="female">여성</label>
                        </div>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="birthDay" class="form-label">생년월일</label>
                        <input type="text" class="form-control" id="birthyear" name="birthyear" placeholder="YYYY" required>
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-3" style="display:grid">
                        <input type="text" class="form-control" id="birthmonth" name="birthmonth" placeholder="MM" required style="align-self: end;">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-3" style="display:grid">
                        <input type="text" class="form-control" id="birthdate" name="birthdate" placeholder="DD" required style="align-self: end;">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="nickname" class="form-label">닉네임</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" required>
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">프로필 이미지 <span class="text-muted">(선택)</span></label>
                        <div class="input-group mb-3">
                            <input type="file" class="form-control" id="image" name=image>
                            <label class="input-group-text" for="image">업로드</label>
                        </div>
                    </div>

                    <div class="col-5">
                        <label for="zipcode" class="form-label">우편번호 <span class="text-muted">(선택)</span></label>
                        <input type="text" class="form-control" id="zipcode" name="zipcode">
                        <div class="invalid-feedback">
                            Valid first name is required.
                        </div>
                    </div>

                    <div class="col-7" style="display:grid">
                        <button class="btn btn-secondary" id="zipcodeBtn" type="button" style="justify-self:start; align-self:end;">우편번호 찾기</button>
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">주소 <span class="text-muted">(선택)</span></label>
                        <input type="text" class="form-control" id="address" name="address">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="address2" class="form-label">상세주소 <span class="text-muted">(선택)</span></label>
                        <input type="text" class="form-control" id="address2" name="address2">
                    </div>

                <hr class="my-5">

                <button class="w-100 btn btn-primary btn-lg" type="submit">가입하기</button>
            </form>
        </div>
    </main>

</div>

<script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
<script>
    window.onload = function(){
        document.getElementById("zipcodeBtn").addEventListener("click", function(){ //주소입력칸을 클릭하면
            //카카오 지도 발생
            new daum.Postcode({
                oncomplete: function(data) { //선택시 입력값 세팅
                    document.getElementById("zipcode").value = data.zonecode;
                    document.getElementById("address").value = data.address; // 주소 넣기
                    document.querySelector("input[id=address2]").focus(); //상세입력 포커싱
                }
            }).open();
        });
    }
</script>

@endsection