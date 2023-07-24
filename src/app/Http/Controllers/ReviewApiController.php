<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ReviewApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $review_id)
    {
        $review=Review::find($review_id);
        $review->review_content=$req->content;
        $review->rate=$req->rate;
        $review->like_experience=$req->experience;
        $review->like_theme=$req->theme;
        $review->like_mood=$req->mood;
        $review->like_food=$req->food;
        $review->like_toilet=$req->toilet;
        $review->like_parking=$req->parking;
        $review->like_cost=$req->cost;
        $review->save();

        $user=User::find($review->user_id);
        $review->user_profile=$user->user_profile;
        $review->user_nickname=$user->user_nickname;

        $review_data=Review::where('festival_id',$review->festival_id)->get();

        $sum_rate=0;
        $count_rate=0;
        $star=0;
        $experienceCnt=0;
        $themeCnt=0;
        $moodCnt=0;
        $foodCnt=0;
        $toiletCnt=0;
        $parkingCnt=0;
        $costCnt=0;
        foreach ($review_data as $val) {
            $sum_rate+=$val->rate;
            $count_rate++;
            $experienceCnt+=$val->like_experience;
            $themeCnt+=$val->like_theme;
            $moodCnt+=$val->like_mood;
            $foodCnt+=$val->like_food;
            $toiletCnt+=$val->like_toilet;
            $parkingCnt+=$val->like_parking;
            $costCnt+=$val->like_cost;
        }
        if ($count_rate!==0) {
            $star_percentage=floor($sum_rate/$count_rate*20);
            $star=($sum_rate/$count_rate);
        }else{
            $star_percentage=0;
        }

        $review->count=$count_rate;
        $review->star_percentage=$star_percentage;
        $review->star=$star;
        $review->experienceCnt=$experienceCnt;
        $review->themeCnt=$themeCnt;
        $review->moodCnt=$moodCnt;
        $review->foodCnt=$foodCnt;
        $review->toiletCnt=$toiletCnt;
        $review->parkingCnt=$parkingCnt;
        $review->costCnt=$costCnt;

        return $review;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
