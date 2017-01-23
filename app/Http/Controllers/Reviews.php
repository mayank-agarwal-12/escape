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
use Symfony\Component\HttpFoundation\Response;

class Reviews extends Controller
{
    public function index()
    {
        $reviewModel = new ReviewsModel();
        $reviewObj = $reviewModel->inRandomOrder()->paginate(10);
        $popularReview = $this->getPopularReviews();
        return view('pages.reviews.reviews',compact('reviewObj'),['popularReview'=>$popularReview]);
    }

    public function create()
    {
        $categoryArr = CategoryModel::all();
        $catLists = [];

        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }

        return view('pages.reviews.create',['catLists'=>$catLists]);
    }

    public function store(Request $request)
    {
        if(empty(Auth::user()->id))
        {
            return back()->with('status', trans('You need to logged in'));
        }
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
            'content' => 'required|max:800|min:10',
            'category_id'=>'required|not_in:0',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }

    public function show($id)
    {
        $popularReview = $this->getPopularReviews();
        $reviewObj = ReviewsModel::where('id',$id)->get();
        if(empty($reviewObj->first()))
        {
            return back()->with('status', trans('No Reviews found'));
        }
        foreach($reviewObj as $reviewRow)
        {
            $review = $reviewRow;
        }
       /* if(empty(Auth::user()->id))
        {
            return view('pages.reviews.details',compact('popularReview'),['review'=>$review]);
        }*/
       // $reviewObj = ReviewsModel::paginate(10);
        $comments = CommentsModel::where('review_id',$review->id)->orderBy('created_at','desc')->get();


        return view('pages.reviews.details',compact('popularReview'),['review'=>$review,'comments'=>$comments]);
    }

    protected function getPopularReviews()
    {
        $reviewModel = new ReviewsModel();
        return $reviewModel->orderBy('created_at','asc')->take(5)->get();
    }

    public function softDelete(Request $request)
    {
        $input = $request->all();
        if (empty(Auth::user()->id)) {
            return response()->json([
                    'status'=>'failed',
                    'msg'=>'You need to logged in',
                    'id'=>$input['id']
                ]
            );
        }
        $reviewObj = ReviewsModel::where('id',$input['id'])->where('user_id',Auth::user()->id)->get();
        if(empty($reviewObj->first()))
        {
            return
                response()->json([
                        'status'=>'failed',
                        'msg'=>'This Review not attached to the user',
                        'id'=>$input['id']
                    ]
                );
        }
        $review = ReviewsModel::findorFail($input['id']);
        $review->delete();
        return response()->json([
            'status'=>'success',
            'msg'=>'Successfully marked hidden',
            'id'=>$input['id']]);
    }

    public function removeSoftDelete(Request $request)
    {
        $input = $request->all();
        if (empty(Auth::user()->id)) {
            return response()->json([
                    'status'=>'failed',
                    'msg'=>'You need to logged in',
                    'id'=>$input['id']
                ]
            );
        }
        $reviewObj = ReviewsModel::onlyTrashed()->where('id',$input['id'])->get();
        if(empty($reviewObj->first()) && $reviewObj->first()->user_id !=Auth::user()->id )
        {
            return
                response()->json([
                        'status'=>'failed',
                        'msg'=>'This Review not attached to the user',
                        'id'=>$input['id']
                    ]
                );
        }
        $review = ReviewsModel::onlyTrashed()->findorFail($input['id']);
        $review->restore();
        return response()->json([
            'status'=>'success',
            'msg'=>'Successfully made visible',
            'id'=>$input['id']]);
    }
}
