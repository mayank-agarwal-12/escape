<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use App\Models\ReviewsModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class Comments extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $reviewObj = ReviewsModel::findorFail($input['review_id']);
        if(empty(Auth::user()->id))
        {
            return back()->with('status', trans('You need to logged in'));
        }
        foreach($reviewObj as $reviewRow)
        {
            $review = $reviewRow;
        }
        $input['user_id'] = Auth::user()->id;
        CommentsModel::create($input);
        return Redirect::to(URL::previous())->with('status', trans('Thanks for sharing the review'));
    }
}
