@extends('layout.layout')

@section('title','List')

@section('contents')
<a href="{{route('board.create')}}">작성하기</a>
	<br>
	<br>

	<table>
		<tr>
			<th>No</th>
			<th>제목</th>
			<th>작성자</th>
			<th>등록일</th>
			<th>조회수</th>
		</tr>
		@forelse($data as $item)
			<tr>
				<td>{{$item->id}}</td>
				<td><a href="{{route('boards.show', ['board' => $item->id])}}">{{$item->title}}</a></td>
				<td>{{$item->hits}}</td>
				<td>{{$item->created_at}}</td>
				<td>{{$item->updated_at}}</td>
			</tr>
		@empty
			<tr>
				<td></td>
				<td>게시글 없음</td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		@endforelse
	</table>
@endsection