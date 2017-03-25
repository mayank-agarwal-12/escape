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
        $comparisonList = $comparisonObj->orderBy('id','asc')->take(7)->get();

        $questionModel = new QuestionsModel();
        $questionList =  $questionModel->orderBy('created_at','asc')->take(5)->get();

        $reviewModel = new ReviewsModel();
        $reviewList = $reviewModel->orderBy('created_at','asc')->has('image')->take(4)->get();

        $feed = $this->getRssFeeds();

        return view('pages.homepage',[],['comparisonList'=>$comparisonList,'questionList'=>$questionList,'reviewList'=>$reviewList,'feed'=>$feed]);
    }

    private function getRssFeeds()
    {
        $feed =new \SimplePie();
        $feed->set_feed_url([
            "http://www.newelectronics.co.uk/rss/Technology/2",
            "http://www.voicendata.com/rss2-2/?cat_slug=testmeasurement",
            "http://www.telecomlead.com/category/test-and-measurement/feed",
            "http://www.testandmeasurementtips.com/rss",
            "http://www.electronicsweekly.com/feed/",
            ]);
        $feed->enable_cache(true);
        $feed->enable_order_by_date(true);
        $feed->set_cache_location(storage_path().'/app/feeds');
        $feed->set_cache_duration(60*60);
        $feed->set_output_encoding('utf-8');
        $feed->init();
        return $feed;
    }
}
