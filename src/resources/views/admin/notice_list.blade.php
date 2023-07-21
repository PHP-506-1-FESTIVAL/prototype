@extends('layout.adminlayout')

@section('title','공지사항')

@section('content')
<style>
    .btn-box{
        list-style: none;
        padding:0;
        display: flex;
        align-items: center;
        margin: 0;
    }
    li{
        margin: 5px
    }
</style>
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
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><strong>공지 사항</strong></h5>
                <div>
                    <form action="{{route('admNotice.write')}}" method="get">
                        <button type="submit" class="btn btn-outline-secondary">공지작성</button>
                    </form>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">제목</th>
                            <th scope="col">작성자</th>
                            <th scope="col">작성일</th>
                            <th scope="col">수정일</th>
                            <th scope="col">상태</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($notice as $item)
                        <tr>
                            <th scope="row">{{$item->notice_id}}</th>
                            <td>{{$item->notice_title}}</td>
                            <td>{{$item->admin_id}}</td>
                            <td>{{$item->created_at}}</td>
                            <td>{{$item->updated_at}}</td>
                            <td>
                                <ul class='btn-box'>
                                    <li>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#basicModal{{ $item->notice_id }}">삭제</button>
                                        <div class="modal fade" id="basicModal{{ $item->notice_id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">공지사항 삭제</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        해당공지를 삭제하겠습니까?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">아니요</button>
                                                        <form action="{{route('admNotice.delete',['id'=>$item->notice_id])}}" method="POST">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">네</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <form action="{{route('admNotice.show',['id'=>$item->notice_id])}}"method="get">
                                            <button type="submit" class="btn btn-primary btn-sm">수정</button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <th scope="row"></th>
                            <td>아직 신고된 내역이 없습니다.</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endforelse
                </tbody>
            </table>
        </div>
    </main>
@endsection
