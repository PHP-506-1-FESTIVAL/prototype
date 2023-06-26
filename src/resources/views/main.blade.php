@extends('layout.layout')

@section('content')

{{-- 축제 배너 --}}

<div class="row">
    @foreach ($fesData as $item)
        <div class='col-3'>
            <a href="{{route('fes.detail',['id'=>$item->festival_id])}}">
                @if ($item->poster_img)
                <img src="{{$item->poster_img}}" alt="{{$item->festival_title}}" class="img-fluid">
                @else
                <img src='{{asset('img/festival.jpg')}}' alt="{{$item->festival_title}}" class="img-fluid">
                @endif
            </a>
        </div>
    @endforeach
</div>

{{-- 공지사항 후순위--}}
<div class="row alert alert-danger">
    {{-- {{$notice[0]->notice_title}} : {{$notice[0]->notice_content}} --}}
    <a href="{{route('notice.show', $notice[0])}}">📢{{ $notice[0]->notice_title }}📢</a>
</div>
{{-- 지도 --}}
<div class="row">
    <div class="col-sm-5">
        <div class="row">
            <div class="container text-center"> {{--Todo중앙정렬--}}
                <div class="btn-group align-self-center">
                    <button type="button" class="btn btn-danger" id="month" value="">전체</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($month as $item)
                            <li><a class="dropdown-item" onclick="(changText({{$item}}))">
                                @if ($item)
                                    {{$item}}
                            </a></li>
                            @else
                                전체
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="krmap">
                <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" id="Layer_1" x="0" y="0" style="enable-background:new 0 0 188 203" version="1.1" viewBox="0 0 188 203"><style>.st0{fill:#fff;stroke:#000;stroke-miterlimit:10}</style><path id="AC39" d="m168 154.4-20.6 9.7 7.2 9.7 22.6-4.2 5.3-9-14.5-6.2z" class="st0"/><path id="AC36" d="M85.2 121.6h-2.7l-8.8 11.5 2.4 6.8-4.3 4.8 2.2 8.5 5 10.3 1.4 8.3h1.8l4.9 2.8 2.7-5.3 7.6-.8 3.5 4.7 6.8 2.2 7-11.5 16.6-8.2 2.4-3.1-3.2-6.3v-2.7l-6.8-5.8 1.6-4.1-8.5 3.5-20.6-4.1-5.5-9-5.5-2.5z" class="st0"/><path id="AC38" d="m31.7 134-6.3 10.2.6 3.1-8.9 1.9.7 5.5-4.7 3.6-3.9 14.3 5.5 1.7L5.5 186l2.9 6.2 9.3-3.5.3-3.8 7.7-1.8 26.9 6.4 1.9-3.7 7.6-2.9 2.4 2.1 3.4-1.5.6-7.3 11.9-4.4-1.4-8.3-5-10.3-2.2-8.5-13.1.4-13.3-8.4-8.9 5.5-4.8-8.2z" class="st0"/><path id="AC37" d="M36 109.6v2.5l3.9 5.9-6.7 8.5-1.5 7.5 4.8 8.2 8.9-5.5 13.3 8.4 13.1-.4 4.3-4.8-2.4-6.8 8.8-11.5h2.7v-5.8l-15.9.6-3-6.8H62l-5.3 3.4-6.5-1.6-6.3 2.8-7.9-4.6z" class="st0"/><path id="AC32" d="m67 14.9 1.9 6.9L79.8 33v10.5l8 4.5-3.6 15.1 3.6 2.5 12.4-3 13.6 8.4 21.3.6 5.3-7.6L113 9.9l-2.8-1.5-2.6 3.5-6.6-.1-3.2 4.5-15 1.5L67 14.9z" class="st0"/><path id="AC33" d="m68.7 74.1 8.6-6.4 9-3.2 1.5 1.1 12.4-3 10.9 6.8L107 82l-7.3-2.7-13 9.1 1 1.5-3.2 11.6 4.6 4.7-3.9 9.6-10 .4.6-3.9-1.4-7v-6.5l-5.7-6.3-1.7-9.1 3.8-3.2-2.1-6.1z" class="st0"/><path id="AC31" d="M31.7 36.2 38 50.1l8.4 2.4-3.4 8.2 3.4 3.3v4.1l3.7 4.8 18.6 1.2 8.6-6.4 9-3.2-2.1-1.4L87.8 48l-8-4.5V33L68.9 21.8 67 14.9l-11.1 4.8-.1 2.1-7.2 4.3 1.7 6.1-4.7 2.5-7.4-4.9-6.5 6.4z" class="st0"/><path id="AC7" d="m141.3 135.1-10.4-3.6-5.6 2.2-1.6 4.1 6.8 5.8v2.7l3.2 6.3 3.5-4.9 4.1-12.6z" class="st0"/><path id="AC35" d="m141.3 78.5 3.3 6.1-4.2 32.7 4.2-1.7.8 9.1-4.1 10.4-10.4-3.6-14.1 5.7-20.6-4.1-5.5-9-5.5-2.5v-5.8l3.9-9.6-4.6-4.7 3.2-11.6-1-1.5 13-9.1L107 82l4.1-12.6 2.7 1.6 21.3.6 5.3-7.6.9 14.5z" class="st0"/><path id="AC2" d="m42 37.2 1.2 6.4 7.6-1.3.9 7.7-5.3 2.5-8.4-2.4-6.3-13.9 6.5-6.4 6 4-2.2 3.4z" class="st0"/><path id="AC34" d="M37.7 65.1s-12.7 9.5-12.8 10c-.1.4 0 8.5 0 8.5l4.9.9.1 9.5 8.8 5.4-2.9 5.2.2 5 7.9 4.6 6.3-2.8 6.6 1.6 5.2-3.4h4.3l3 6.9 6-.2.6-4-1.4-6.9v-6.6l-5.7-6.3-1.8-9.1 3.8-3.2-2-6.1-18.6-1.2-3.7-4.8-8.8-3zm-13.6 20-4.5 9.6 2.2 6.8 6.9-5.7-4.6-10.7z" class="st0"/><path id="AC8" d="M66.3 95.8 59.8 81l8 1.1-.8 1.3 1.7 9.1-2.4 3.3z" class="st0"/><path id="AC1" d="M57.9 40 51 44.5l.5 4.3 5.6 2.4 9-1.5v-3.6L57.9 40z" class="st0"/><path id="AC3" d="m68.7 92.5-5.6 7.8 5.6 5.9 5.7-.9v-6.5l-5.7-6.3z" class="st0"/><path id="AC4" d="m111.1 118-9.2 5.1.8 4.6-1.7 6.3 5.1 1.1 9.4-10.5-4.4-6.6z" class="st0"/><path id="AC6" d="m117.6 152.6-1 3.4-12.9 3.2 3.3 3.9 7.1-1.9.6 2.7 16.6-8.2 2.4-3.1-3.2-6.3-12.9 6.3z" class="st0"/><path id="AC5" d="m37.9 145.1-2.1 4.5 6.6 6.4 9.5-4.8-3.7-5-10.3-1.1z" class="st0"/></svg>
            </div>
        </div>
    </div>
    <div class="col-sm-7 row container text-end">
        {{-- 각각 맞는 축제 --}}
        @foreach ($fesData as $item)
            <div class="col-6 col-sm-6">
                <a href="{{route('fes.detail',['id'=>$item->festival_id])}}" id="Recommend">
                    @if ($item->poster_img)
                        <img src="{{$item->poster_img}}" alt="{{$item->festival_title}}" class="img-fluid">
                    @else
                        <img src='{{asset('img/festival.jpg')}}' alt="{{$item->festival_title}}" class="img-fluid">
                    @endif
                </a>
            </div>
        @endforeach
        <div id="moreFes" class="align-self-end">
            <a onclick="FesSub()">더보기>></a>
        </div>
    </div>
</div>

<form action="{{route('main.FesOrder')}}" method="post" id="fesOrderFrm">
    @csrf
    <input type="hidden" name="fesStr" id="fesOrederIp" value=",">
</form>
<script src="{{asset('js/main.js')}}"></script>
@endsection
