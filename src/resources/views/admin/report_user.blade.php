@extends('layout.report_detail')

@section('title','회원')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">프로필 이미지</h6>
            <img src="/img/profile/{{$user->user_profile}}" alt="" class="img-thumbnail img-fluid" style="width:70px;height:70px;border-radius:50%;border:none;object-fit:cover;">
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">회원 ID</h6>
            <h6 style="font-weight:100;">{{$user->user_id}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">이메일</h6>
            <h6 style="font-weight:100;">{{$user->user_email}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">성명</h6>
            <h6 style="font-weight:100;">{{$user->user_name}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">닉네임</h6>
            <h6 style="font-weight:100;">{{$user->user_nickname}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">성별</h6>
            <h6 style="font-weight:100;">
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
            <h6 class="mb-2">생년월일</h6>
            <h6 style="font-weight:100;">{{$user->user_birthdate}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">가입일시</h6>
            <h6 style="font-weight:100;">{{$user->created_at}}</h6>
            </div>
        </div>
        <div class="col-12">
            <div class="search-input">
            <h6 class="mb-2">정보수정일시</h6>
            <h6 style="font-weight:100;">{{$user->updated_at}}</h6>
            </div>
        </div>
    </div>
@endsection