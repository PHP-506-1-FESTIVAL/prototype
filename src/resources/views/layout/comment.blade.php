
{{-- --------------------add 신유진-------------------- --}}
{{-- 참고 : https://may9noy.tistory.com/category/%E2%AD%90%20SpringBoot/%F0%9D%84%9C%20%EA%B2%8C%EC%8B%9C%ED%8C%90%20with%20SpringBoot --}}
<div class="card m-2" id="comments-new">
    <div class="card-body">
        <!-- 댓글 작성 폼 -->
        <form>
            <!-- 닉네임 입력-->
            <div class="bm-3">
                <label class="form-label">닉네임</label>
                <input class="form-control form-control-sm" id="new-comment-nickname">
            </div>
            <!-- 댓글 본문 입력 -->
            <div class="mb-3">
                <label class="form-label">댓글 내용</label>
                <textarea class="form-control form-control-sm" rows="3" id="new-comment-body"></textarea>
            </div>

            <!-- 히든 인풋 -->
            {{#article}}
                <input type="hidden" id="new-comment-article-id" value="{{id}}">
            {{/article}}

            <!-- 전송 버튼 -->
            <button type="button" class="btn btn-outline-primary btn-sm" id="comment-create-btn">댓글 작성</button>
        </form>
    </div>
</div>

<script>
    {
        // 댓글 생성 버튼을 변수화 (id가 comment-create-btn인 대상을 선택해서 가져옴)
        const commentCreateBtn = document.querySelector("#comment-create-btn");

        // 버튼 클릭 이벤트를 감지!!
        commentCreateBtn.addEventListener("click", function() {
            // 새 댓글 객체 생성
            const comment = {
                nickname: document.querySelector("#new-comment-nickname").value,
                body: document.querySelector("#new-comment-body").value,
                article_id: document.querySelector("#new-comment-article-id").value,
            };

            // 댓글 객체 출력
            console.log(comment);

            // fetch() - Talend API 요청을 JavaScript로 보내준다!
            const url = "/api/articles/" + comment.article_id + "/comments";
            fetch(url, {
                method: "post",     // POST 요청을 보낸다.
                body: JSON.stringify(comment),     // comment JS 객체를 JSON으로 변경하여 보냄
                headers: {
                    "Content-Type": "application/json"
                }
            }).then(response => {
            // http 응답 코드에 따른 메세지 출력
            const msg = (response.ok) ? "댓글이 등록 되었습니다." : "댓글 등록 실패..!";
            alert(msg);
            // 현재 페이지 새로고침
            window.location.reload();
            });
        });
    }
</script>


// --------------------add 박진영--------------------
// {{-- <div class="card mb-2">
//     <div class="card-header bg-light">
//         <i class="fa fa-comment fa"></i> 댓글
//     </div>
//     <div class="card-body">
//         <ul class="list-group list-group-flush" id="replyList">
//             <li class="list-group-item">
//                 <div class="form-inline mb-2">
//                     <label for="replyId"><i class="fa fa-user-circle-o fa-2x"></i></label>
//                     <input type="text" class="form-control ml-2" placeholder="댓글을 남겨주세요" id="replyId">
//                 </div>
//                 <button type="button" class="btn btn-primary mt-3" onClick="addReply()">등록</button>
//             </li>
//         </ul>
//     </div>
// </div> --}}

// {{-- <script>
// function addReply() {
//     var replyId = document.getElementById("replyId").value;

//     var newReply = document.createElement("li");
//     newReply.className = "list-group-item";
//     newReply.innerHTML =
//         '<div class="form-inline mb-2">' +
//         '<label for="replyId"><i class="fa fa-user-circle-o fa-2x"></i></label>' +
//         '<input type="text" class="form-control ml-2" value="' +
//         replyId +
//         '" disabled></div>' +
//         '<button type="button" class="btn btn-danger btn-sm float-right" onClick="deleteReply(this)">삭제</button>';

//     var replyList = document.getElementById("replyList");
//     replyList.appendChild(newReply);

//     document.getElementById("replyId").value = "";

//     // var replyId = document.getElementById("replyId").value;
// }

// function deleteReply(reply) {
//     var listItem = reply.parentNode;
//     var replyList = listItem.parentNode;
//     replyList.removeChild(listItem);
// }

// </script> --}}


// --------------------add 신유진--------------------
// {{-- <div id="entry49Comment">
//     <span>댓글</span>
//     <br><hr><br>
//     <div class="comments"> --}}
//         {{-- // 댓글리스트 --}}
//         {{-- <div class="comment-list">
//             <ul>
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
//         {{-- // 댓글 입력 --}}
//         {{-- <br><hr><br>
//         <form method="post" action="/comment/add/49" onsubmit="return false" style="margin: 0">
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

// {{-- @if($sesion) --}}
    
// {{-- @endif --}}
// {{-- <div class="content mt-4 rounded-3 border border-secondary">
//     <div class="p-3">
//         {{$data->board_content}}
//     </div>
// </div> --}}
