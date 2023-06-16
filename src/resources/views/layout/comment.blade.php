<div class="card mb-2">
    <div class="card-header bg-light">
        <i class="fa fa-comment fa"></i> 댓글
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush" id="replyList">
            <li class="list-group-item">
                <div class="form-inline mb-2">
                    <label for="replyId"><i class="fa fa-user-circle-o fa-2x"></i></label>
                    <input type="text" class="form-control ml-2" placeholder="로그인 후 소중한 댓글을 남겨주세요" id="replyId">
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
}

function deleteReply(reply) {
    var listItem = reply.parentNode;
    var replyList = listItem.parentNode;
    replyList.removeChild(listItem);
}
</script>