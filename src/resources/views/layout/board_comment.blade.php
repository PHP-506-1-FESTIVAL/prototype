{{-- <img src='{{asset('img/comment.jpg')}}' style="width:1160px; object-fit:cover; text-align:center;"> --}}
    <!-- Start Blog Singel Area -->
    {{-- <section class="section blog-single" style="padding-top:0;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <div class="single-inner">
                        <div class="post-details">
                            <!-- Comments -->
                            <div class="comment-form">
                                <h3 class="comment-reply-title"><span>축제 TALK</span></h3>
                                <form method="post" action=""{{route('user.comments')}}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-box form-group">
                                                <input type="hidden" name="comment_id" value="{{$comment->id}}"> 
                                                <textarea name="#" class="form-control form-control-custom"
                                                    placeholder="댓글을 남겨주세요."></textarea>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="button">
                                                <button type="submit" class="btn">댓글 등록</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- End Blog Singel Area -->
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
{{-- 현재 페이지 숫자 추출 --}}
<script>
    var initialUrl = window.location.href;
    var numericPart = initialUrl.match(/\d+/)[0];

    document.getElementById("board-id-input").value = numericPart;
</script>

