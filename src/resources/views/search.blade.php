@extends('layout.layout')

@section('content')

<span>"{{$search}}"의검색 결과 페이지 입니다</span>
<div class="row">
    <div class="col-9">
        <table class="table">
            <caption></caption>
            <colgroup>
                <col width="10%"/>
                <col width="80%"/>
                <col width="10%"/>
            </colgroup>
            <thead>
                <tr>
                    <th scope="col">이미지</th>
                    <th scope="col">제목</th>
                    <th scope="col">축제기간</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">
                @forelse($result as $item)
                    <tr>
                        <td><img src="{{$item->poster_img}}" alt="{{$item->festival_title}}" loading="lazy" class="img-fluid"></td>
                        <td><a href="{{route('fes.detail',['id'=>$item->festival_id])}}">{{$item->festival_title}}</a></td>
                        <td><div>
                            {{$item->festival_start_date}}
                            <br><br>
                            {{$item->festival_end_date}}
                        </div></td>
                    </tr>
                @empty
                    <tr>
                        <td></td>
                        <td>검색결과 없음</td>
                        <td></td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="row col-3">
            <ol class="list-group list-group-numbered">
                @foreach ($recommend as $item)
                <li class="list-group-item">
                    {{$item->select_cnt}}
                </li>
                @endforeach
            </ul>
            <div><a href="{{route('main.request')}}">축제 요청 페이지 이동</a></div>
    </div>
</div>

@endsection
