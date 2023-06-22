@extends('layout.layout')

@section('title','회원정보 수정')

@section('content')

    @if(!(session()->has('pwchk_flg')))
        <script>window.location.href = "{{route('pwchk')}}";</script>
    @endif

    

<div class="container">
    <main>
        <div class="py-5 text-center">
            <h1 class="mb-3">회원정보 수정</h1>
        </div>
        
        <div class="container" style="max-width:500px;">
            <form action="{{route('user.update')}}" method="post" id="signupForm" class="needs-validation" enctype="multipart/form-data" onsubmit="return false">
                @csrf
                
                <div class="row g-4">
                    <div class="col-12">
                        <label for="email" class="form-label">이메일 <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                                <input type="text" class="form-control" id="email" name="email" value="{{$data->user_email}}" readonly>
                                <div class="valid-feedback">
                                    사용 가능한 이메일 입니다.
                                <div class="invalid-feedback" id="emailval"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="password" class="form-label">비밀번호 <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="invalid-feedback">
                                영문, 숫자, 특수문자를 포함해 8~20글자로 입력해 주세요.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="pwchk" class="form-label">비밀번호 확인 <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <input type="password" class="form-control" id="pwchk" name="pwchk">
                            <div class="invalid-feedback">
                                비밀번호가 일치하지 않습니다.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="name" class="form-label">이름 <span class="text-danger">*</span></label>
                        <div class="input-group has-validation">
                            <input type="text" class="form-control" id="name" name="name" value="{{$data->user_name}}">
                            <div class="invalid-feedback">
                                한글 2~5글자로 입력해 주세요.
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="gender" class="form-label">성별 <span class="text-danger">*</span></label>
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

                    <div class="col-12">
                        <label for="birthDate" class="form-label">생년월일 <span class="text-danger">*</span></label>
                            <div class="input-group has-validation">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="birthyear" name="birthyear" placeholder="YYYY" maxlength='4' required value="{{$data->birthyear}}">
                                    <input type="text" class="form-control" id="birthmonth" name="birthmonth" placeholder="MM"  maxlength='2' required value="{{$data->birthmonth}}">
                                    <input type="text" class="form-control" id="birthday" name="birthday" placeholder="DD" maxlength='2' required value="{{$data->birthday}}">
                                </div>
                            </div>
                            <input class="form-control" type="hidden" id="birthhidden">
                            <div class="invalid-feedback" id="birthval">
                            </div>
                    </div>

                    <div class="col-12">
                        <label for="nickname" class="form-label">닉네임 <span class="text-danger">*</span></label>
                        <input type="hidden" id="hiddennick" value="{{session('user_nickname')}}">
                        <div class="input-group has-validation">
                            <div class="input-group">
                                <input type="text" class="form-control" id="nickname" name="nickname" required value="{{$data->user_nickname}}">
                                <button class="btn btn-outline-secondary" type="button" id="nickChkBtn" style="border-top-right-radius:5px; border-bottom-right-radius:5px;">닉네임 중복체크</button>
                                <div class="valid-feedback" id="nickval2">
                                    사용 가능한 닉네임 입니다.
                                </div>
                                <div class="invalid-feedback" id="nickval"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <label class="form-label">프로필 이미지 변경 <span class="text-muted">(선택)</span></label>
                        <div class="input-group">
                            <input type="file" class="form-control" id="image" name=image>
                            <label class="input-group-text" for="image">업로드</label>
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
                    <button class="btn btn-light btn-lg me-2" type="button" onclick="location.href='{{route('user.main')}}'">취소</button>
                    <button class="btn btn-primary btn-lg ms-2" id="submitBtn" type="submit">수정하기</button>
                </div>
            </form>
        </div>
    </main>

</div>

{{-- <div class="container">
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
</div> --}}

<script type="text/javascript">

    var pwflg = false;

    document.getElementById('submitBtn').onclick = function() {
        var pw = document.getElementById('password');
        var pwchk = document.getElementById('pwchk');
        var name = document.getElementById('name');
        var year = document.getElementById('birthyear');
        var mon = document.getElementById('birthmonth');
        var day = document.getElementById('birthday');
        var nick = document.getElementById('nickname');
        var signupForm = document.getElementById('signupForm');

        if (pw.classList.contains('is-invalid')) {
            alert('비밀번호를 다시 한번 확인해 주세요.');
        } else if (pw.classList.contains('is-invalid') && !pwchk.classList.contains('is-valid')) {
            alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
        } else if (name.classList.contains('is-invalid')) {
            alert('이름을 다시 한번 확인해 주세요.');
        } else if (year.classList.contains('is-invalid') || mon.classList.contains('is-invalid') || day.classList.contains('is-invalid')) {
            alert('생년월일을 다시 한번 확인해 주세요.')
        } else {
            signupForm.removeAttribute('onsubmit');
        }
    }

    document.getElementById("nickChkBtn").onclick = function() {
        const nick = document.getElementById('nickname');
        const nickval = document.getElementById('nickval');
        const nickval2 = document.getElementById('nickval2');
        const url = "/api/nickchk/" + nick.value;
        var regExp = /^[\w\Wㄱ-ㅎㅏ-ㅣ가-힣]{2,10}$/;
        let apiData = null;

        // API
        fetch(url)
        .then(res => {
            if(res.status !== 200) {
                throw new Error(res.status + ' : API Response Error' );
            }
            return res.json();})
        .then(apiData => {
            if(nick.value.match(regExp) === null) {
                nick.classList.remove('is-valid');
                nick.classList.add('is-invalid');
                nickval.innerHTML = "닉네임을 2~10글자로 입력해 주세요."
            } else {
                if(apiData["nickflg"] === "1") {
                    if(document.getElementById('hiddennick').value === nick.value) {
                        nick.classList.remove('is-invalid');
                        nick.classList.add('is-valid');
                        nickval2.innerHTML = "현재 사용 중인 닉네임 입니다."
                    } else {
                        nick.classList.remove('is-valid');
                        nick.classList.add('is-invalid');
                        nickval.innerHTML = "이미 등록된 닉네임 입니다."
                    }
                } else {
                    nick.classList.remove('is-invalid');
                    nick.classList.add('is-valid');
                }
            }
        })
        // 에러는 alert로 처리
        .catch(error => alert(error.message));
    }

    document.getElementById("password").onkeyup = function() {
        var val = document.getElementById('pwchk').value;
        var pw = this.value;
        var regExp = /(?=.*\d{1,20})(?=.*[~`!@#$%\^&*()-+=]{1,20})(?=.*[a-zA-Z]{2,20}).{8,20}$/;
        if(pw.match(regExp) === null) {
            document.getElementById('password').classList.add('is-invalid');
        } else {
            document.getElementById('password').classList.replace('is-invalid', 'is-valid');
        }
        if(pwflg) {
            if( val === pw ){
                document.getElementById('pwchk').classList.remove('is-invalid');
                document.getElementById('pwchk').classList.add('is-valid');
            }else{
                document.getElementById('pwchk').classList.remove('is-valid');
                document.getElementById('pwchk').classList.add('is-invalid');
            };
        }
    }

    document.getElementById('pwchk').onkeyup = function() {
        var val1 = document.getElementById('password').value;
        var msg = '';
        var val2 = this.value;
        if( val1 === val2 ){
            document.getElementById('pwchk').classList.replace('is-invalid', 'is-valid');
            pwflg = true;
        }else{
            document.getElementById('pwchk').classList.add('is-invalid');
        };
    };

    document.getElementById("name").onkeyup = function() {
        var name = this.value;
        var regExp = /^[가-힣]{2,6}$/;
        if(name.match(regExp) === null) {
            document.getElementById('name').classList.add('is-invalid');
        } else {
            document.getElementById('name').classList.replace('is-invalid', 'is-valid');
        }
    }

    document.getElementById("birthyear").onkeyup = function() {
        var now = new Date();
        var year = this.value;
        var hidden = document.getElementById("birthhidden");
        var birthval = document.getElementById("birthval")
        var regExp = /^[0-9]+$/;
        if(year.match(regExp) === null || year < 1900 || year > now.getFullYear()) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
            hidden.classList.add('is-invalid');
            birthval.innerHTML = "태어난 연도를 4글자로 정확하게 입력해 주세요."
        } else {
            this.classList.remove('is-invalid');
            this.classList.add('is-valid');
            hidden.classList.remove('is-invalid');
            hidden.classList.add('is-valid');
        }
    }

    document.getElementById("birthmonth").onkeyup = function() {
        var month = this.value;
        var hidden = document.getElementById("birthhidden");
        var birthval = document.getElementById("birthval")
        var regExp = /^[0-9]+$/;
        this.classList.add('is-valid');
        if(month.match(regExp) === null || month.length !== 2 || month < 1 || month > 12) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
            hidden.classList.add('is-invalid');
            birthval.innerHTML = "태어난 월을 2글자로 정확하게 입력해 주세요."
        } else {
            this.classList.replace('is-invalid', 'is-valid');
            hidden.classList.replace('is-invalid', 'is-valid');
        }
    }

    document.getElementById("birthday").onkeyup = function() {
        var day = this.value;
        var hidden = document.getElementById("birthhidden");
        var birthval = document.getElementById("birthval")
        var regExp = /^[0-9]+$/;
        this.classList.add('is-valid');
        if(day.match(regExp) === null || day.length !== 2 || day < 1 || day > 31) {
            this.classList.remove('is-valid');
            this.classList.add('is-invalid');
            hidden.classList.add('is-invalid');
            birthval.innerHTML = "태어난 날을 2글자로 정확하게 입력해 주세요."
        } else {
            this.classList.replace('is-invalid', 'is-valid');
            hidden.classList.replace('is-invalid', 'is-valid');
        }
    }
</script>

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