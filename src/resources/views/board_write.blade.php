@extends('layout.layout')

@section('title','게시글 작성')

@section('content')
<h2 class="mt-0 mb-0">게시글 작성 페이지</h2>

{{-- <%-- 입력 폼 --%> --}}
<form action="{{route('board.store')}}" method="post">
    @csrf
	{{-- <input type="hidden" name="bdGroup" value=<%=bdGroup%>
	<input type="hidden" name="bdOrder" value=<%=bdOrder%>
	<input type="hidden" name="bdIndent" value=<%=bdIndent%> --}}
	<input type="text" name="writetitle" class="form-control mt-4 mb-2" placeholder="제목을 입력해주세요." required>
	<div class="form-group">
		<textarea class="form-control" rows="10" name="writecontent" placeholder="내용을 입력해주세요" required></textarea>
	</div>
	@include('layout.errormsg') 
	<button type="submit" class="btn btn-secondary mb-3">제출하기</button>
	<a href="{{route("board.index")}}"><button class="btn btn-primary" type="button">취소하기</button></a>
</form>
@endsection