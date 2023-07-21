<style>
.comment-list {
    margin-top: 20px;
}

.comment {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    position: relative; /* 추가 */
}
    .comment-profile {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}

.comment-profile-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>

<section class="section blog-single" style="padding-top:0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <!-- Comments -->
                        <div class="comment-form">
                            <h3 class="comment-reply-title"><span>축제 TALK</span></h3>
                            <form action="{{ route('comment.create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type_flg" value="1">
                                <input type="hidden" name="board_id" id="board-id-input" value="">
                                <textarea name="comment_content" class="form-control" placeholder="댓글을 입력하세요" required></textarea>
                                <button type="submit" class="btn btn-primary">댓글 작성</button>
                            </form>
                        </div>
                        {{-- 댓글 목록 --}}
                        <div class="comment-form">
                            @foreach($comments as $comment)
                                <div id="comment-form">
                                    <form action="{{ route('comment.delete', ['id' => $comment->comment_id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        @if(session('user_id') == $comment->user_id)
                                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $comment->comment_id }}">삭제</button>
                                        @endif

                                        <!-- 삭제 Modal -->
                                        <div class="modal fade" id="deleteModal{{ $comment->comment_id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $comment->comment_id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $comment->comment_id }}">삭제 확인</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        정말 삭제하시겠습니까?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">취소</button>
                                                        <button type="submit" class="btn btn-danger">삭제</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- 수정 -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $comment->comment_id }}">수정</button>

                                        <!-- 수정 Modal -->
                                        <div class="modal fade" id="editModal{{ $comment->comment_id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $comment->comment_id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel{{ $comment->comment_id }}">댓글 수정</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <textarea name="comment_content" class="form-control" placeholder="댓글을 입력하세요" required id="comment-content{{ $comment->comment_id }}">{{ $comment->comment_content }}</textarea>
                                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="putCommentsList({{$comment->comment_id}})">수정</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @if(session('user_id') != $comment->user_id)
                                        <a href="javascript:popup2({{$comment->comment_id}})">
                                            <i class="lni lni-alarm"></i>
                                            신고하기
                                        </a>
                                    @endif
                                    <div class="comment-profile">
                                        <img class="comment-profile-img" src="/img/profile/{{ $comment->user_profile }}" alt="프로필 이미지">
                                    </div>
                                    <p class="comment-name">{{ $comment->user_nickname }}</p>
                                    <p class="comment-content" id="content{{$comment->comment_id}}">{{ $comment->comment_content }}</p>
                                    <p class="comment-time">{{ $comment->updated_at }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="board_id" id="board_id" value="{{$boards->board_id}}">
    <input type="hidden" name="user_id" id="board_id" value="{{session('user_id')}}">
</section>
{{-- 현재 페이지 숫자 추출 --}}
<script>
    var initialUrl = window.location.href;
    var numericPart = initialUrl.match(/\d+/)[0];

    document.getElementById("board-id-input").value = numericPart;

    function popup2(e){
        var url = "{!! route('insert.report', ['type' => '1']) !!}";
        url = url + "&no=" + e;
        var name = "popup test";
        var option = "width = 500, height = 500, top = 100, left = 200, location = no"
        window.open(url, name, option);
    }
</script>
<script src="{{asset('js/comment.js')}}"></script>
