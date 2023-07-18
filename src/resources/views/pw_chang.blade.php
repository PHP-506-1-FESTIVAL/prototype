@extends('layout.layout')

@section('title','회원가입')

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">비밀번호 변경</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">메인</a></li>
                        <li>비밀번호 변경</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- start Registration section -->
    <section class="login registration section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">비밀번호 변경</h4>
                        @include('layout.errormsg')
                        <form action="{{route('pw.chang')}}" method="post" id="signupForm" class="needs-validation" enctype="multipart/form-data" onsubmit="return false">
                            @csrf
                            <div class="row g-4">

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
                                <input type="hidden" name="email" value="{{$data[0]->send_mail}}">
                                <input type="hidden" name="email" value="{{$data[0]->mail_token}}">
                                <div class="button">
                                    <button type="submit" id="submitBtn" class="btn">비밀번호 변경</button>
                                </div>
                                <p class="outer-link">이미 계정이 있으신가요? <a href="{{route('user.login')}}"> 로그인</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Registration section -->

<script type="text/javascript">

    var pwflg = false;

    document.getElementById('submitBtn').onclick = function() {
        var pw = document.getElementById('password');
        var pwchk = document.getElementById('pwchk');
        var signupForm = document.getElementById('signupForm');

        if (!pw.classList.contains('is-valid')) {
            alert('비밀번호를 다시 한번 확인해 주세요.');
        } else if (!pwchk.classList.contains('is-valid')) {
            alert('비밀번호와 비밀번호 확인이 일치하지 않습니다.');
        } else {
            signupForm.removeAttribute('onsubmit');
        }
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

</script>

@endsection
