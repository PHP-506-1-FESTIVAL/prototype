<?php
/************************************************
 * 프로젝트명   : festival_info
 * 디렉토리     : Controllers
 * 파일명       : NoticeController.php
 * 이력         : v002 0720 박진영 new
 ************************************************/
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('user.login');
        }

        $review = new Review();
        $review->user_id = Auth::id();
        $review->festival_id = $request->input('festival_id');
        $review->review_content = $request->input('review_content');
        $review->rate = $request->input('rate');
        $review->like_experience = $request->input('like_experience');
        $review->like_theme = $request->input('like_theme');
        $review->like_mood = $request->input('like_mood');
        $review->like_food = $request->input('like_food');
        $review->like_toilet = $request->input('like_toilet');
        $review->like_parking = $request->input('like_parking');
        $review->like_cost = $request->input('like_cost');
        $review->save();
        return redirect()->back()->with('review', $review);
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->back()->with('success', '리뷰가 삭제되었습니다.');
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        if ($review->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $review->review_content = $request->input('review_content');

        $review->save();

        return redirect()->back()->with('success', '리뷰가 수정되었습니다.');
    }
}
