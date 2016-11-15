<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\AnswersModel;
use App\Models\ExpertsModel;
use App\Models\QuestionsModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class Answers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionObj = QuestionsModel::all();
        $answerObj = AnswersModel::all();
        $answerArr = [];
        foreach($answerObj as $answer)
        {
            $answerArr[$answer->question_id] = $answer->expert->name ." : ". $answer->content;
        }
        return view('pages.adminpanel.answers.index',compact('questionObj'),['answerArr'=>$answerArr]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $query)
    {

        $input = $query->all();
        $questionObj = QuestionsModel::findorFail($input['question']);
        if(empty($questionObj))
        {
            redirect('adminpanel/answers');
        }
        $expertPanel = $questionObj->category->experts;
        $expertList = [];
        foreach($expertPanel as $expert)
        {
            $expertList[$expert->id] = $expert->email;
        }
        return view('pages.adminpanel.answers.create',compact('questionObj'),['expertList'=>$expertList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        if($input['expert_id'] == 0)
        {
            return back()->with('status', trans('Please select expert'));
        }
        AnswersModel::create($input);
        return redirect('adminpanel/answers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
