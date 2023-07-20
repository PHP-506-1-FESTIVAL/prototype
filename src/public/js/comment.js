const boardId=document.getElementById('board_id').value
const userId=document.getElementById('user_id').value
    getCommentsList(boardId)


function getCommentsList(boardId){
    axios.get('/api/comments/'+boardId)
    .then(res=>{
        consol.log(res.data);
        for (let index = 0; index < res.data.length; index++) {
            tempStr+=`
            <div id="comment-form">
                <form action="{{ route('comment.delete', ['id' => $comment->comment_id]) }}" method="POST">
                    ${userId===res.data[index].user_id?`<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#deleteModal${res.data[index].comment_id}">삭제</button>`:""}
                    <div class="modal fade" id="deleteModal${res.data[index].comment_id}" tabindex="-1" aria-labelledby="deleteModalLabel${res.data[index].comment_id}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel${res.data[index].comment_id}">삭제 확인</h5>
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
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal${res.data[index].comment_id}">수정</button>
                <div class="modal fade" id="editModal${res.data[index].comment_id}" tabindex="-1" aria-labelledby="editModalLabel${res.data[index].comment_id}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel${res.data[index].comment_id}">댓글 수정</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            <form action="{{ route('comment.update', ['id' => $comment->comment_id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <textarea name="comment_content" class="form-control" placeholder="댓글을 입력하세요" required>{{ $comment->comment_content }}</textarea>
                                <button type="submit" class="btn btn-primary">수정</button>
                            </form>
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
            <p class="comment-content">{{ $comment->comment_content }}</p>
            <p class="comment-time">{{ $comment->updated_at }}</p>
        </div>
            `

        }
    })
    .catch(err=>{
        console.log(err);
    })
}

function postCommentsList(boardId){
    axios.post('/api/comments/'+boardId)
    .then(res=>{
        console.log(res.data);
    })
    .catch(err=>{
        console.log(err);
    })
}
