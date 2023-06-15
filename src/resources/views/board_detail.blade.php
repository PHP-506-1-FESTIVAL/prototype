@extends('layout.layout')

@section('title','축제톡톡상세')

@section('content')
    <h2 class="mt-4 mb-3">Product View: {{$data->name}}</h2>
    <p style="text-align: right" class="pt-2">{{$data->created_at}}</p>

    <div class="content mt-4 rounded-3 border border-secondary">
        <div class="p-3">
            {{$data->content}}
        </div>
    </div>
@endsection



