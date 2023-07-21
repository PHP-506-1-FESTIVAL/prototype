const boardId=document.getElementById('board_id').value
// const userId=document.getElementById('user_id').value
    getCommentsList(boardId)


// function getCommentsList(boardId){
//     axios.get('/api/comments/'+boardId)
//     .then(res=>{
//         console.log(res.data);
//         for (let index = 0; index < res.data.length; index++) {
//             const test=document.getElementById('target-comment');
//             test.innerHTML+=res.data[index].comment_content+"<br>";
//         }
//     })
//     .catch(err=>{
//         console.log(err);
//     })
// }

// function postCommentsList(boardId){
//     axios.post('/api/comments/'+boardId)
//     .then(res=>{
//         console.log(res.data);
//     })
//     .catch(err=>{
//         console.log(err);
//     })
// }

function putCommentsList(commentId){
    let comment=document.getElementById('comment-content')
    axios.put('/api/comments/'+commentId,{
        content:comment.value
    })
    .then(res=>{
        // console.log(res.data.comment_content)
        const targetComment=document.getElementById('comment-content'+commentId)
        targetComment.innerHTML=res.data.comment_content

    })
    .catch(err=>{
        console.log(err);
    })
}
