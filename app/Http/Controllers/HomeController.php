<?php

namespace App\Http\Controllers;



use App\Models\ComparisonModel;
use App\Models\QuestionsModel;
use App\Models\ReviewsModel;

class HomeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

       // $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comparisonObj = new ComparisonModel();
        $comparisonList = $comparisonObj->orderBy('id','asc')->take(3)->get();

        $questionModel = new QuestionsModel();
        $questionList =  $questionModel->orderBy('created_at','asc')->take(3)->get();

        $reviewModel = new ReviewsModel();
        $reviewList = $reviewModel->orderBy('created_at','asc')->take(3)->get();

        return view('pages.homepage',[],['comparisonList'=>$comparisonList,'questionList'=>$questionList,'reviewList'=>$reviewList]);
    }
}
