@extends('layout.adminlayout')

@section('title','축제 요청 관리')

@section('content')

<main id="main" class="main">

    <div class="pagetitle">
    <h1>축제 요청 관리</h1>
    <nav>
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('admin.main')}}">Home</a></li>
        <li class="breadcrumb-item">Tables</li>
        <li class="breadcrumb-item active">Data</li>
        </ol>
    </nav>
    </div><!-- End Page Title -->

    <section class="section">
    <div class="row">
        <div class="col-lg-12">

        {{-- <div class="card">
            <div class="card-body">
            <h5 class="card-title"><strong>신고 내역</strong></h5>
            <div class="mb-3">
                <form action="{{route('admin.report')}}" method="get">
                @csrf
                <select name="status" id="status">
                    @if($status)
                    <option value="">전체</option>
                    @else
                    <option value="" selected>전체</option>
                    @endif
                    @if($status == '0')
                    <option value="0" selected>처리예정</option>
                    @else
                    <option value="0">처리예정</option>
                    @endif
                    @if($status == '1')
                    <option value="1" selected>삭제완료</option>
                    @else
                    <option value="1">삭제완료</option>
                    @endif
                    @if($status == '2')
                    <option value="2" selected>기각처리</option>
                    @else
                    <option value="2">기각처리</option>
                    @endif
                </select>
                <button type="submit" class="btn btn-primary btn-sm rounded-pill" style="padding:1px 6px;">검색</button>
                </form>
            </div>

            <!-- Table with stripped rows -->
            <table class="table datatable table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">구분</th>
                    <th scope="col">글/댓글 ID</th>
                    <th scope="col">신고자 ID</th>
                    <th scope="col">신고 유형</th>
                    <th scope="col">신고 상세</th>
                    <th scope="col">신고 일시</th>
                    <th scope="col">처리</th>
                    <th scope="col">처리 일시</th>
                    <th scope="col">처리자</th>
                </tr>
                </thead>
                <tbody>
                @forelse($data as $key => $val)
                    <tr>
                    <th scope="row">{{$data[$key]->report_id}}</th>
                    <td>
                        @if($data[$key]->report_type == '0')
                        글
                        @else
                        댓글
                        @endif
                    </td>
                    <td>
                        @if($data[$key]->report_type == '0')
                        <a href="javascript:popup1({{$data[$key]->board_id}})">
                            {{$data[$key]->board_id}}
                        </a>
                        @else
                        <a href="javascript:popup2({{$data[$key]->comment_id}})">
                            {{$data[$key]->comment_id}}
                        </a>
                        @endif
                    </td>
                    <td>
                        <a href="javascript:popup3({{$data[$key]->user_id}})">
                        {{$data[$key]->user_id}}</td>
                        </a>
                    <td>
                        @switch($data[$key]->report_no)
                        @case('0')
                            영리/홍보
                            @break
                        @case('1')
                            음란물
                            @break
                        @case('2')
                            욕설/비하
                            @break
                        @case('3')
                            신상노출
                            @break
                        @case('4')
                            도배
                            @break
                        $@default
                            기타
                        @endswitch
                    </td>
                    <td>{{$data[$key]->report_detail}}</td>
                    <td>{{$data[$key]->created_at}}</td>
                    <td>
                        @if($data[$key]->handle_flg == '0')
                        <button type="button" class="btn btn-danger btn-sm rounded-pill" style="padding:1px 6px;">삭제완료</button>
                        @elseif($data[$key]->handle_flg == '1')
                        <button type="button" class="btn btn-secondary btn-sm rounded-pill" style="padding:1px 6px;">기각처리</button>
                        @else 
                        <form action="{{route('report.put')}}" method="post">
                            @csrf
                            @method('put')
                            <select name="flg" id="flg">
                            <option value="" selected disabled>선택</option>
                            <option value="0">삭제</option>
                            <option value="1">기각</option>
                            </select>
                            <input type="hidden" value="{{$data[$key]->report_id}}" name="id">
                            @if($data[$key]->report_type == '0')
                            <input type="hidden" value="{{$data[$key]->board_id}}" name="board_id">
                            @elseif($data[$key]->report_type == '1')
                            <input type="hidden" value="{{$data[$key]->comment_id}}" name="comment_id">
                            @endif
                            <input type="hidden" name="status" value="{{$status}}">
                            <button type="submit" class="btn btn-primary btn-sm rounded-pill" style="padding:1px 6px;">완료</button>
                        </form>
                        @endif
                    </td>
                    <td>
                        @if($data[$key]->created_at == $data[$key]->updated_at)
                        
                        @else
                        {{$data[$key]->updated_at}}
                        @endif
                    </td>
                    <td>{{$data[$key]->admin_id}}</td>
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
            <!-- End Table with stripped rows -->
            {!! $data->links('vendor.pagination.custom2') !!}
            </div>
        </div> --}}

        </div>
    </div>
    </section>

</main><!-- End #main -->

<script>
        function popup1(e){
            var url = "{!! route('report.article') !!}";
            url = url + '?id=' + e;
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }

        function popup2(e){
            var url = "{!! route('report.comment') !!}";
            url = url + '?id=' + e;
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }

        function popup3(e){
            var url = "{!! route('report.user') !!}";
            url = url + '?id=' + e;
            var name = "popup test";
            var option = "width = 500, height = 500, top = 100, left = 200, location = no"
            window.open(url, name, option);
        }
</script>

@endsection