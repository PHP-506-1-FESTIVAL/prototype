@extends('layout.layout')

@section('title','로그인')

@section('content')



    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">회원가입</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{route('main')}}">메인</a></li>
                        <li>회원가입</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- start login section -->
    <section class="login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
                    <div class="form-head">
                        <h4 class="title">계정 만들기</h4>
                        <form action="{{route('mail.send')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label>이메일</label>
                                <input name="email" type="email" id="email">
                            </div>
                            <div class="form-group">
                                <label>이메일 확인</label>
                                <input name="emailChk" type="email" id="emailChk" >
                            </div>
                            @include('layout.errormsg')
                            <div class="button">
                                <button type="submit" class="btn">메일 발송</button>
                            </div>
                            <p class="outer-link">계정이 이미 존재한가요? <a href="{{route('user.login')}}">로그인</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end login section -->

@endsection
<script>
    function() {
        const email = document.getElementById('email');
        const emailval = document.getElementById('emailval');
        const url = "/api/emailchk/" + email.value;
        var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
        let apiData = null;

        // API
        fetch(url)
        .then(res => {
            if(res.status !== 200) {
                throw new Error(res.status + ' : API Response Error' );
            }
            return res.json();})
        .then(apiData => {
            if(email.value.match(regExp) === null) {
                email.classList.remove('is-valid');
                email.classList.add('is-invalid');
                emailval.innerHTML = "이메일을 형식에 맞춰 입력해 주세요."
            } else {
                if(apiData["emailflg"] === "1") {
                    email.classList.remove('is-valid');
                    email.classList.add('is-invalid');
                    emailval.innerHTML = "이미 등록된 이메일 입니다."
                } else {
                    email.classList.remove('is-invalid');
                    email.classList.add('is-valid');
                    email.setAttribute('readonly', true);
                }
            }
        })
        // 에러는 alert로 처리
        .catch(error => alert(error.message));
    }

</script>
