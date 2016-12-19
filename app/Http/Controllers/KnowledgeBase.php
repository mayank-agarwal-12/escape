<?php

namespace App\Http\Controllers;

use App\Models\KnowledgeBaseModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KnowledgeBase extends Controller
{
    public function index()
    {
        $knowledgeBaseModel = new KnowledgeBaseModel();
        $knowledgeBaseObj = $knowledgeBaseModel->inRandomOrder()->paginate(10);
        $popularObj = $this->getPopularKnowledgeBase();
        return view('pages.knowledgebase.knowledgebase',compact('knowledgeBaseObj'),['popularObj'=>$popularObj]);
    }

    public function create()
    {
        if(empty(Auth::user()->id))
        {
            return back()->with('status', trans('You need to be logged in'));
        }

        if(Auth::user()->roles !== 'writer')
        {
            return back()->with('permission', trans('Permission denied for this user'));
        }
        return view('pages.knowledgebase.create',[]);
    }

    protected function getPopularKnowledgeBase()
    {
        $knowledgeBaseModel = new KnowledgeBaseModel();
        return $knowledgeBaseModel->orderBy('created_at','asc')->take(5)->get();
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();


        $input = $request->all();
        if(empty(Auth::user()->id))
        {
            return back()->with('status', trans('You need to be logged in'));
        }
        if(Auth::user()->roles !== 'writer')
        {
            return back()->with('permission', trans('Permission denied for this user'));
        }
        $input['user_id'] = Auth::user()->id;
        KnowledgeBaseModel::create($input);
        return back()->with('status', trans('Thanks for sharing the thought.'));
    }

    public function show($id)
    {
        $knowledgeBaseObj = KnowledgeBaseModel::where('id',$id)->get();
        if(empty($knowledgeBaseObj->first()))
        {
            return back()->with('status', trans('Nothing found'));
        }
        foreach($knowledgeBaseObj as $knowledgeBaseRow)
        {
            $knowledgeBase = $knowledgeBaseRow;
        }
        $knowledgeBaseObj = KnowledgeBaseModel::paginate(10);
     //   $answers = AnswersModel::where('question_id',$question->id)->orderBy('created_at','desc')->get();
        $popularObj = $this->getPopularKnowledgeBase();
        return view('pages.knowledgebase.details',compact('knowledgeBaseObj'),['knowledgeBase'=>$knowledgeBase,'popularObj'=>$popularObj]);
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
            'title' => 'required|max:255|min:5',
            'description' => 'required|max:2048|min:10',
        ]);
    }
}
