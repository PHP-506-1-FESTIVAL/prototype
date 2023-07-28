<style>
.comment-list {
    margin-top: 20px;
}

.comment {
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    position: relative;
}

.comment-details {
    display: flex;
    flex-direction: column;
    margin-left: 10px;
    width: 100%;
}

.comment-content {
    max-width: 90%;
    word-wrap: break-word;
}

.comment-info {
    display: flex;
    align-items: baseline;
}

.comment-name {
    font-weight: bold;
    margin-right: 5px;
}

.comment-time {
    color: #777;
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

.my-comment-icon {
    position: absolute;
    top: 0;
    right: 0;
    border-radius: 5px;
    padding: 5px;
    font-size: 16px;
    color: #5830E0;
}

a[href^="javascript:popup2"] {
    position: absolute;
    top: 10px;
    right: 10px;
    text-decoration: none;
    margin-left: 10px;
}
</style>

<section class="section blog-single" style="padding-top: 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <div class="single-inner">
                    <div class="post-details">
                        <!-- Comments -->
                        <div class="comment-form" style="padding:50px;">
                            <h3 class="comment-reply-title"><span>축제 TALK</span></h3>
                            <form action="{{ route('comment.create') }}" method="POST">
                                @csrf
                                <input type="hidden" name="type_flg" value="1">
                                <input type="hidden" name="board_id" id="board-id-input" value="{{$boards->board_id}}">
                                <textarea name="comment_content" class="form-control" placeholder="댓글을 입력하세요" required></textarea>
                                <button type="submit" class="btn btn-primary" style="float:right; margin-top:5px;">작성</button>
                            </form>
                        </div>
                        {{-- 댓글 목록 --}}
                        <div class="comment-form">
                            @foreach($comments as $comment)
                                <div id="comment-form" class="comment">
                                    <div class="comment-details">
                                        @if(session('user_id') == $comment->user_id)
                                            <span class="my-comment-icon">내 댓글</span>
                                        @endif
                                        @if(session('user_id') != $comment->user_id)
                                            <a href="javascript:popup2({{$comment->comment_id}})">
                                                <i class="lni lni-alarm"></i>신고하기
                                            </a>
                                        @endif
                                        <div class="comment-info">
                                            <div class="comment-profile">
                                                <img class="comment-profile-img" src="/img/profile/{{ $comment->user_profile }}" alt="프로필 이미지">
                                            </div>
                                            <span class="comment-name">{{ $comment->user_nickname }} |</span>
                                            <span class="comment-time">{{ $comment->updated_at->format('y-m-d') }}</span>
                                        </div>
                                            <div class="groupbtn" role="group" style="display: flex; justify-content: flex-end; padding:0 10px;">
                                            <!-- 수정 -->
                                            @if(session('user_id') == $comment->user_id)
                                                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $comment->comment_id }}" style="border-top-right-radius: 0; border-bottom-right-radius: 0;">수정</button>
                                            @endif
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
                                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" style="float:right; margin-top:10px;" onclick="putCommentsList({{$comment->comment_id}})" >수정</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 삭제 -->
                                            <form action="{{ route('comment.delete', ['id' => $comment->comment_id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                @if(session('user_id') == $comment->user_id)
                                                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $comment->comment_id }}" style="border-top-left-radius: 0; border-bottom-left-radius: 0;">삭제</button>
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
                                        </div>
                                        <hr style="width:90%">
                                        <span class="comment-content" style="font-size:20px;" id="content{{$comment->comment_id}}">{{ $comment->comment_content }}</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- 현재 페이지 숫자 추출 --}}
<script>
    // var initialUrl = window.location.href;
    // var numericPart = initialUrl.match(/\d+/)[0];

    // document.getElementById("board-id-input").value = numericPart;

    function popup2(e){
        var url = "{!! route('insert.report', ['type' => '1']) !!}";
        url = url + "&no=" + e;
        var name = "popup test";
        var option = "width = 500, height = 500, top = 100, left = 200, location = no"
        window.open(url, name, option);
    }
</script>
<script src="{{asset('js/comment.js')}}"></script>
