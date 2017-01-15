<?php

namespace App\Http\Controllers;

use App\Models\CommentsModel;
use App\Models\QuestionsModel;
use App\Models\ReviewsModel;
use App\User;
use Illuminate\Support\Facades\Validator;
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
        $reviewObj = ReviewsModel::withTrashed()->where('user_id',Auth::user()->id)->get();
        $commentObj = CommentsModel::withTrashed()->where('user_id',Auth::user()->id)->get();
        /*$review = [];
        foreach($reviewObj as $reviewRow)
        {
            $review = $reviewRow;
        }*/
        return view('pages.profile.reviews',compact('reviewObj'),['commentObj'=>$commentObj]);
    }

    public function showQuestions(Request $request)
    {
        if (empty(Auth::user()->id)) {
            return back()->with('status', trans('You need to be logged in'));
        }
        $questionObj = QuestionsModel::withTrashed()->where('user_id',Auth::user()->id)->get();
        /*$review = [];
        foreach($reviewObj as $reviewRow)
        {
            $review = $reviewRow;
        }*/
        return view('pages.profile.questions',compact('questionObj'));
    }

    public function update(Request $request)
    {
        $input = $request->all();
        if (empty(Auth::user()->id)) {
            return  redirect('/login');
        }
        if(!empty($input['email']))
        {
            unset($input['email']);
        }
        $userObj = User::findorFail(Auth::user()->id);
        $userObj->update($input);
        return  back()->with('status', trans('Successfully Updated'));

    }

    public function updatePassword(Request $request)
    {
        $input = $request->all();
        if(strlen($input['password'])<6)
        {
            return response()->json([
                'status'=>'failed',
                    'msg'=>'Password should be minimum 6 characters'
            ]);
        }
        if($input['password'] != $input['password_confirmation'])
        {
            return response()->json([
                'status'=>'failed',
                'msg'=>'New Password do not match'
            ]);
        }
        if (empty(Auth::user()->id)) {
            return  redirect('/login');
        }
        /*$userObj = User::where('password',bcrypt($input['old_password']));
        if(empty($userObj->first()))
        {
            return  response()->json([
            'status'=>'failed',
            'msg'=>'Please input correct old password'
        ]);
        }*/

        $bind['password'] = bcrypt($input['password']);
        $userObj = User::findorFail(Auth::user()->id);
        $userObj->update($bind);
        return  response()->json([
          'status'=>'success',
            'msg'=>'Successfully Updated'
    ]);
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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
}
