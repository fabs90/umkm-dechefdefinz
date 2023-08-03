<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserReviewRequest;
use App\Models\ReviewRating;

class ReviewController extends Controller
{
    //
    public function reviewController(UserReviewRequest $request)
    {
        // $validated = $request->validated();
        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:30'],
            'email' => ['required', 'email'],
            'comments' => ['required'],
            'star_rating' => ['required', 'numeric'],
        ]);

        $insertData = ReviewRating::create($validated);
        // $insertData = DB::table('review_ratings')->insert($validated);
        if ($insertData) {
            // Data insert successful
            return redirect()->back()->with('flash_msg_success', 'Your review has been submitted Successfully,');

        } else {
            return redirect()->back()->with('flash_msg_error', 'Your review has been submitted Unsuccessfully,');
        }

    }

    public function showReview()
    {
        $datas = ReviewRating::all();

        return view('uji', compact('datas'));
    }
}
