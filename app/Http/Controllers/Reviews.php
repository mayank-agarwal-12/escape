<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\CommentsModel;
use App\Models\ReviewsModel;
use App\Models\UploadModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class Reviews extends Controller
{
    public function index()
    {
        $reviewObj = ReviewsModel::paginate(10);
        return view('pages.reviews.reviews',compact('reviewObj'));
    }

    public function create()
    {
        $categoryArr = CategoryModel::all();
        $catLists = [];
        $userObj = User::all();
        $userLists = [];
        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }

        foreach($userObj as $user)
        {
            $userLists[$user->id] = $user->name;
        }
        return view('pages.reviews.create',['catLists'=>$catLists,'userLists'=>$userLists]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $uploadId = 0;
        if($request->file('image'))
        {
            $path = $request->file('image')->storePublicly('review_image','public');

            $uploadArr = [
                'url'=> Storage::url($path),
                'type'=>'image',
                'storage'=>'filesystem\public',
                'path'=>$path
            ];
            $uploadId = UploadModel::firstOrCreate($uploadArr)->id;
        }

        $input = $request->all();
        $input['upload_id'] = $uploadId;
        if(empty(Auth::user()->id))
        {
            return back()->with('status', trans('You need to logged in'));
        }
        $input['user_id'] = Auth::user()->id;
        ReviewsModel::create($input);
        return back()->with('status', trans('Thanks for sharing the review'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|max:255|min:5|unique:reviews',
            'content' => 'required|max:255|min:10',
            'category_id'=>'required|not_in:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function show($title)
    {
        $reviewObj = ReviewsModel::where('title',$title)->get();
        foreach($reviewObj as $reviewRow)
        {
            $review = $reviewRow;
        }
        $reviewObj = ReviewsModel::paginate(10);
        $comments = CommentsModel::where('review_id',$review->id)->orderBy('created_at','desc')->get();
        return view('pages.reviews.details',compact('reviewObj'),['review'=>$review,'comments'=>$comments]);
    }
}
