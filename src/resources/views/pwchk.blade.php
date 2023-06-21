@extends('layout.layout')

@section('title','비밀번호 확인')

@section('content')

<div class="container mt-5" style="max-width:400px;">
    <div class="container text-center mb-5">
        <h1>비밀번호 확인</h1>
        <p>비밀번호를 다시 한번 입력해 주세요.</p>
    </div>
    <form action="{{route('pwchkpost')}}" method="post">
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    <label for="password">비밀번호 입력</label>
                </div>
            </div>

            <div class="col-3">
                <button type="submit" class="btn btn-primary w-100 h-100">확인</button>
            </div>
        </div>
        
        <div class="mt-4">
            @include('layout.errormsg') 
        </div>
        
    </form>
</div>
    
@endsection