@extends('layout.report_detail')

@section('title','회원')

@section('content')
    <hr>
    <br>
    <div class="row">
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">프로필 이미지</h6>
            <br>
            <img src="/img/profile/{{$user->user_profile}}" alt="" class="mt-2 img-thumbnail img-fluid" style="width:70px;height:70px;border-radius:50%;border:none;object-fit:cover;">
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">회원 ID</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">{{$user->user_id}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">이메일</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">{{$user->user_email}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">성명</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">{{$user->user_name}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">닉네임</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">{{$user->user_nickname}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">성별</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">
                @if($user->user_gender == '0')
                    남성
                @elseif($user->user_gender == '1')
                    여성
                @endif
            </h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">생년월일</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">{{$user->user_birthdate}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">가입일시</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">{{$user->created_at}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2" style="background-color:lightgray; display:inline; padding:5px; border-radius:5px;">정보수정일시</h6>
            <br>
            <h6 class="mt-2" style="font-weight:100;">{{$user->updated_at}}</h6>
            </div>
        </div>
    </div>
@endsection