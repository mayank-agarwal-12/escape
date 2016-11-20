<?php

namespace App\Http\Controllers;

use App\Mail\QueryToExpertMail;
use App\Models\AnswersModel;
use App\Models\CategoryModel;
use App\Models\ExpertsModel;
use App\Models\QuestionsModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Mail\Mailable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class Questions extends Controller
{
    public function index()
    {
        $questionModel = new QuestionsModel();
        $questionObj = $questionModel->latest()->paginate(10);
        $popularObj = $this->getPopularQuestions();
        return view('pages.questions.questions',compact('questionObj'),['popularObj'=>$popularObj]);
    }

    public function create()
    {
        $categoryArr = CategoryModel::all();
        $catLists = [];

        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }


        return view('pages.questions.create',['catLists'=>$catLists]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $emailList = [];

        $input = $request->all();
        if(empty(Auth::user()->id))
        {
            return back()->with('status', trans('You need to be logged in'));
        }
        $input['user_id'] = Auth::user()->id;
        QuestionsModel::create($input);
        $categoryObj = CategoryModel::where('id',$input['category_id'])->get();
        $experts = $categoryObj->first()->experts;
        foreach($experts as $expert)
        {
            Mail::to($expert->email)->send(new QueryToExpertMail($input));
        };
        return back()->with('status', trans('Thanks for sharing the question.You will shortly receive a response'));
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
            'title' => 'required|max:255|min:5|unique:questions',
            'content' => 'required|max:255|min:10',
            'category_id'=>'required|not_in:0'
        ]);
    }

    public function show($title)
    {
        $questionObj = QuestionsModel::where('title',$title)->get();
        if(empty($questionObj->first()))
        {
            return back()->with('status', trans('No Questions found'));
        }
        foreach($questionObj as $questionRow)
        {
            $question = $questionRow;
        }
        $questionObj = QuestionsModel::paginate(10);
        $answers = AnswersModel::where('question_id',$question->id)->orderBy('created_at','desc')->get();
        $popularObj = $this->getPopularQuestions();
        return view('pages.questions.details',compact('questionObj'),['question'=>$question,'answers'=>$answers,'popularObj'=>$popularObj]);
    }

    protected function getPopularQuestions()
    {
        $questionModel = new QuestionsModel();
        return $questionModel->orderBy('created_at','asc')->take(5)->get();
    }
}
