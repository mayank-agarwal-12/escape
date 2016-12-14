<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;


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
//        $userData = User::getUserRegisteredData();
        return view('pages.adminpanel.index',['userData']);
    }
}
