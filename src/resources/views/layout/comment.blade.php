                            <!-- Comments -->
                            <div class="post-comments">
                                <p class="comment-title"><span>3개의 댓글이 있습니다.</span></p>
                                <ul class="comments-list">
                                    <li>
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" class="rounded-circle" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Arista Williamson</h6>
                                                <span class="date">19th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Donec aliquam ex ut odio dictum, ut consequat leo interdum. Aenean nunc
                                                ipsum, blandit eu enim sed, facilisis convallis orci. Etiam commodo
                                                lectus
                                                quis vulputate tincidunt. Mauris tristique velit eu magna maximus
                                                condimentum.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="children">
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" class="rounded-circle" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Rosalina Kelian <span class="saved"><i
                                                            class="lni lni-bookmark"></i></span></h6>
                                                <span class="date">15th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim.
                                            </p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="comment-img">
                                            <img src="https://via.placeholder.com/150x150" class="rounded-circle" alt="img">
                                        </div>
                                        <div class="comment-desc">
                                            <div class="desc-top">
                                                <h6>Alex Jemmi</h6>
                                                <span class="date">12th May 2023</span>
                                                <a href="javascript:void(0)" class="reply-link"><i class="lni lni-reply"></i>Reply</a>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                                                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim
                                                veniam.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="comment-form">
                                <h3 class="comment-reply-title"><span>Leave a comment</span></h3>
                                <form action="#" method="POST">
                                    <div class="row">
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="text" name="name" class="form-control form-control-custom"
                                                    placeholder="Your Name" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-12">
                                            <div class="form-box form-group">
                                                <input type="email" name="email"
                                                    class="form-control form-control-custom" placeholder="Your Email" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <textarea name="#" class="form-control form-control-custom"
                                                    placeholder="Your Comments"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="submit" class="btn">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
    {{-- 댓글 --}}
    <img src='{{asset('img/comment.jpg')}}' style="width:1160px; object-fit:cover; text-align:center;">

{{-- --------------------add 신유진-------------------- --}}
{{-- 참고 : https://may9noy.tistory.com/category/%E2%AD%90%20SpringBoot/%F0%9D%84%9C%20%EA%B2%8C%EC%8B%9C%ED%8C%90%20with%20SpringBoot    https://sung-jun.tistory.com/92 --}}
{{-- <div id="comments-list"> --}}
    {{-- {{#commentDtos}} --}}
        {{-- <div class="card m-2" id="comments-{{$comment->comment_id}}"> --}}
            {{-- <div class="card-header"> --}}
                {{-- {{nickname}} --}}
                <!-- 모달 트리거 버튼 -->
                {{-- <button type="button"
                        class="btn btn-sm btn-outline-primary"
                        data-bs-toggle="modal"
                        data-bs-target="#comment-edit-modal"
                        data-bs-id="{{id}}"
                        data-bs-nickname="{{nickname}}"
                        data-bs-body="{{body}}"
                        data-bs-article-id="{{articleId}}">수정
                </button> --}}
                <!-- 댓글 삭제 버튼 -->
                {{-- <button type="button"
                        class="btn btn-sm btn-outline-danger comment-delete-btn"
                        data-comment-id="{{id}}">삭제
                </button>
            </div>
            <div class="card-body">
                {{body}}
            </div>
        </div> --}}
    {{-- {{/commentDtos}} --}}
{{-- </div> --}}


<!-- Modal -->
{{-- <div class="modal fade" id="comment-edit-modal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">댓글 수정</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"> --}}
                <!-- 댓글 작성 폼 -->
                {{-- <form> --}}
                    <!-- 닉네임 입력-->
                    {{-- @if(auth()->guest()) --}}
                        {{-- <div class="bm-3">
                            <label class="form-label">닉네임</label>
                            <input class="form-control form-control-sm" id="edit-comment-nickname">
                        </div> --}}
                        {{-- return redirect()->route('users.login'); --}}
                    {{-- @else --}}

                    {{-- @endif --}}

                    <!-- 댓글 본문 입력 -->
                    {{-- <div class="mb-3">
                        <label class="form-label">댓글 내용</label>
                        <textarea class="form-control form-control-sm" rows="3" id="edit-comment-body"></textarea>
                    </div>

                    <!-- 히든 인풋 -->
                    <input type="hidden" id="edit-comment-id">
                    <input type="hidden" id="edit-comment-article-id">

                    <!-- 전송 버튼 -->
                    <button type="button" class="btn btn-outline-primary btn-sm" id="comment-update-btn">수정 완료</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

<!-- 모달 이벤트 처리 -->
{{-- <script>
{
    // 모달 요소 선택
    const commentEditModal = document.querySelector("#comment-edit-modal");

    // 모달 이벤트 감지
    commentEditModal.addEventListener("show.bs.modal", function(event) {
        // 트리거 버튼 선택
        const triggerBtn = event.relatedTarget;

        // 데이터 가져오기
        const id = triggerBtn.getAttribute("data-bs-id");
        const nickname = triggerBtn.getAttribute("data-bs-nickname");
        const body = triggerBtn.getAttribute("data-bs-body");
        const articleId = triggerBtn.getAttribute("data-bs-article-id");

        // 데이터 반영
        document.querySelector("#edit-comment-nickname").value = nickname;
        document.querySelector("#edit-comment-body").value = body;
        document.querySelector("#edit-comment-id").value = id;
        document.querySelector("#edit-comment-article-id").value = articleId;
    });

{

}
    // 수정 완료 버튼
    const commentUpdateBtn = document.querySelector("#comment-update-btn");

    // 클릭 이벤트 감지 및 처리
    commentUpdateBtn.addEventListener("click",function() {
        // 수정 객체 댓글을 생성
        const comment = {
            id: document.querySelector("#edit-comment-id").value,
            nickname: document.querySelector("#edit-comment-nickname").value,
            body: document.querySelector("#edit-comment-body").value,
            article_id: document.querySelector("#edit-comment-article-id").value
        };

        console.log(comment);

        // 수정 REST API 호출 - fetch()
        const url = "/api/comments/"+comment.id;
        fetch(url, {
            method: "PATCH",            // PATCH 요청
            body: JSON.stringify(comment), // 수정된 댓글 객체를 JSON 으로 전달
            headers: {
                "Content-Type": "application/json"
        }
        }).then(response => {
            // http 응답 코드에 따른 메세지 출력
                const msg = (response.ok) ? "댓글 수정이 완료 되었습니다." : "댓글 수정 실패...!";
                alert(msg);
            // 현재 페이지를 새로 고침
            window.location.reload();
        });
    });
}



</script> --}}

{{-- <!-- 댓글 삭제 -->
<script>
{
    // 삭제 버튼 선택 (해당 값을 변수로 가져와야 한다.)
    const commentDeleteBtns = document.querySelectorAll(".comment-delete-btn"); // id 값이 아닌 class 값을 가져올때는 .을 찍고 값을 가져오면 된다.

    // 삭제 버튼 이벤트를 처리
    commentDeleteBtns.forEach(btn => {
        // 각 버튼의 이벤트 처리를 등록한다.
        btn.addEventListener("click", (event) => {
            // 이벤트 발생 요소를 선택
            const commentDeleteBtn = event.srcElement;

            // 삭제 댓글 id 가져오기
            const commentId = commentDeleteBtn.getAttribute("data-comment-id");
            console.log(`삭제 버튼 클릭: ${commentId}번 댓글`); // 오른쪽 코드와 같은 내용이다. "삭제 버튼 클릭: " + commentId + "번 댓글";


            // 삭제 API 호출 및 처리
            // 해당 url 값은 CommentApiController 파일의 // 댓글 삭제 내용을 실행 한다.
            const url = `/api/comments/${commentId}`; // 백틱: 숫자 1번 왼쪽 ~ ``을 사용한다.
            fetch(url, {
                method: "DELETE"
            }).then(response => {
                // 댓글 삭제 실패 처리
                if (!response.ok) {
                    alert("댓글 삭제 실패..!");
                    return;
                }

                // 삭제 성공 시, 댓글을 화면에서 지움!
                const target = document.querySelector(`#comments-${commentId}`);
                target.remove();
            });
        });
    });
}
</script> --}}


{{--  --------------------add 박진영-------------------- --}}
{{-- <div class="card mb-2">
    <div class="card-header bg-light">
        <i class="fa fa-comment fa"></i> 댓글
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush" id="replyList">
            <li class="list-group-item">
                <div class="form-inline mb-2">
                    <label for="replyId"><i class="fa fa-user-circle-o fa-2x"></i></label>
                    <input type="text" class="form-control ml-2" placeholder="댓글을 남겨주세요" id="replyId">
                </div>
                <button type="button" class="btn btn-primary mt-3" onClick="addReply()">등록</button>
            </li>
        </ul>
    </div>
</div>

<script>
function addReply() {
    var replyId = document.getElementById("replyId").value;

    var newReply = document.createElement("li");
    newReply.className = "list-group-item";
    newReply.innerHTML =
        '<div class="form-inline mb-2">' +
        '<label for="replyId"><i class="fa fa-user-circle-o fa-2x"></i></label>' +
        '<input type="text" class="form-control ml-2" value="' +
        replyId +
        '" disabled></div>' +
        '<button type="button" class="btn btn-danger btn-sm float-right" onClick="deleteReply(this)">삭제</button>';

    var replyList = document.getElementById("replyList");
    replyList.appendChild(newReply);

    document.getElementById("replyId").value = "";

    var replyId = document.getElementById("replyId").value;
}

function deleteReply(reply) {
    var listItem = reply.parentNode;
    var replyList = listItem.parentNode;
    replyList.removeChild(listItem);
}

</script> --}}

{{--  --------------------add 신유진-------------------- --}}
{{--  {{-- <div id="entry49Comment"> --}}
{{--      <span>댓글</span>
//     <br><hr><br>
//     <div class="comments"> --}}
{{-- //          댓글리스트 --}}
{{-- //         <div class="comment-list"> --}}
{{-- //             <ul>
//                 <li id="comment-item">
//                     <div class="author-meta">
//                         <img src="https://t1.daumcdn.net/tistory_admin/blog/admin/profile_default_01.png" style="width: 2%; min-width: 50px;" class="avatar" alt="" >
//                         <span class="nickname">댓글 작성자 닉네임</span>
//                         <span class="date">
//                             2023.06.16 11:04 
//                         </span>
//                         <a href="" onclick="">신고</a>
//                         <span class="control">
//                             <a href="#" onclick="deleteComment(13736003);return false">수정/삭제</a>
//                             <a href="#" onclick=" commentComment(13736003);return false">댓글쓰기</a>
//                         </span>
//                     </div>  
//                     <p>댓글의 내용 부분 입니다.</p>
//                 </li>
//             </ul>
//         </div> --}}
{{-- //          댓글 입력 --}}
{{-- //         {{-- <br><hr><br> --}}
{{-- //         <form method="post" action="/comment/add/49" onsubmit="return false" style="margin: 0">
//             <div class="comment-form">
//                 <div class="field">
//                     <input type="text" name="name" value="" placeholder="이름">
//                     <input type="password" name="password" value="[##_rp_admin_check_##]" placeholder="암호">
//                     <div class="secret">
//                         <input type="checkbox" name="secret" id="secret">
//                         <label for="secret" tabindex="0">Secret</label>
//                     </div>
//                 </div>

//                 <textarea name="comment" cols="" rows="4" placeholder="댓글을 입력해주세요."></textarea>
//                 <div class="submit" onclick="addComment(this, 49); return false;">
//                     <button type="submit" class="btn">댓글달기</button>
//                 </div>
//             </div>
//         </form>
//     </div>
// </div> --}}

{{-- // @if($sesion)
    
// {{-- @endif --}}
{{-- // <div class="content mt-4 rounded-3 border border-secondary"> --}}
{{-- //     <div class="p-3">
//         {{$data->board_content}}
//     </div>
// </div> --}}
