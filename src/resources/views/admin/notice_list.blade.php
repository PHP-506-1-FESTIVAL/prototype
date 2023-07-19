@extends('layout.adminlayout')

@section('title','공지사항')

@section('content')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>공지 관리</h1>
            <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.main')}}">메인</a></li>
                <li class="breadcrumb-item">공지</li>
                <li class="breadcrumb-item active">리스트</li>
            </ol>
            </nav>
        </div><!-- End Page Title -->
        <div>
            <button type="button" class="btn btn-outline-secondary">공지작성</button>
        </div>
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">제목</th>
            <th scope="col">작성자</th>
            <th scope="col">작성일</th>
            <th scope="col">조회수</th>
            <th scope="col">수정일</th>
            <th scope="col">상태</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Brandon Jacob</td>
            <td>Designer</td>
            <td>28</td>
            <td>2016-05-25</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Bridie Kessler</td>
            <td>Developer</td>
            <td>35</td>
            <td>2014-12-05</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td>Ashleigh Langosh</td>
            <td>Finance</td>
            <td>45</td>
            <td>2011-08-12</td>
        </tr>
        <tr>
            <th scope="row">4</th>
            <td>Angus Grady</td>
            <td>HR</td>
            <td>34</td>
            <td>2012-06-11</td>
        </tr>
        <tr>
            <th scope="row">5</th>
            <td>Raheem Lehner</td>
            <td>Dynamic Division Officer</td>
            <td>47</td>
            <td>2011-04-19</td>
        </tr>
        </tbody>
    </table>
</main>
@endsection
