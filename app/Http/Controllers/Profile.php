<?php

namespace App\Http\Controllers;

use App\Models\ReviewsModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class Profile extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        if (empty(Auth::user()->id)) {
            return back()->with('status', trans('You need to be logged in'));
        }


        return view('pages.profile.profile');
    }

    public function showReviews(Request $request)
    {
        if (empty(Auth::user()->id)) {
            return back()->with('status', trans('You need to be logged in'));
        }
        $reviewObj = ReviewsModel::where('user_id',Auth::user()->id)->get();
        /*$review = [];
        foreach($reviewObj as $reviewRow)
        {
            $review = $reviewRow;
        }*/
        return view('pages.profile.reviews',compact('reviewObj'));
    }
}
